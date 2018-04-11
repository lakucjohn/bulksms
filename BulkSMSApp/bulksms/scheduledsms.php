<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/16/18
 * Time: 12:25 PM
 */
session_start();
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bulksmsdb';

$conn = new mysqli($hostname, $username, $password, $database);

if(!$conn){
    echo mysqli_error($conn);
}

$scheduled_messages_sql = "SELECT * FROM scheduledsms ORDER BY timestamp desc";
?>


<?php
require_once '../Config/bulksms.config.php';
$sent_messages = 0;
$scheduled_messages = 0;
$contacts = 0;
$groupcount = 0;

$sent_message_count_sql = "SELECT * FROM sentsms ORDER BY datesent desc";
$scheduled_message_count_sql = "SELECT * FROM scheduledsms ORDER BY timestamp";
$contacts_count_sql = "SELECT * FROM contacts";
$group_count_sql = "SELECT * FROM contactgroupnames";

if($sent_message_count_run = mysqli_query($conn,$sent_message_count_sql)){
    $sent_messages = mysqli_num_rows($sent_message_count_run);
}
if($scheduled_message_count_run = mysqli_query($conn, $scheduled_message_count_sql)){
    $scheduled_messages = mysqli_num_rows($scheduled_message_count_run);
}
if($contacts_count_run = mysqli_query($conn, $contacts_count_sql)){
    $contacts = mysqli_num_rows($contacts_count_run);
}
if($group_count_run = mysqli_query($conn, $group_count_sql)){
    $groupcount = mysqli_num_rows($group_count_run);
}

#Getting error logs
$sendstatus_sql = "SELECT * FROM message_responses WHERE cls_status = 0 AND server_response='f' ORDER BY id desc";
$error_logs = 0;
if($sendstatus_run = mysqli_query($conn,$sendstatus_sql)) {
    if (mysqli_num_rows($sendstatus_run) != 0) {
        $error_logs = mysqli_num_rows($sendstatus_run);
    }
}

if(isset($_SESSION['user'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>

        <title>BulkSMS | User DashBoard</title>
        <link rel="stylesheet" type="text/css" href="static/css/css-main.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Nunito|Open+Sans" rel="stylesheet">

        <style>
            .details-tab-sec {
                max-height: 450px;
                width: 96%;
                margin: 1%;
                padding: 10px;
                display: inline-block;
                border-radius: 8px;
                overflow-y: scroll;
                vertical-align: top;
                background-color: #fdfefe;
            }

            th {
                background-color: #508bb0;
                color: white;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            select {
                width: 200px;
                height: 30px;
            }

            .scheduled-sms-color {
                background-color: rgba(127, 179, 213, 0.36);
            }
        </style>

    </head>
    <body>
    <?php include_once 'nav.heads.php'; ?>

    <?php include_once 'solid-div-tabs.php'; ?>

            <section class="details-tab-sec slight-shadow scheduled-sms-color">

                Arrange By: <select id="getorder" onchange="SelectCheck(this);">
                    <option id="ByTime" value="ByTime" selected="selected">Time</option>
                    <option id="ByRecipient" value="ByRecipient">Recipient</option>
                    <option id="ByMessage" value="ByMessage">Message</option>
                </select>
                <p>
                <div id="DivCheckTime">
                    <?php
                    $sort_by_time_sql = "SELECT * FROM scheduledsms ORDER BY timestamp DESC";
                    ?>
                    <table class="tbl-scheduled-sms">
                        <tr align="left">
                            <th style="width: 20%;">To</th>
                            <th style="width: 40%;">Message</th>
                            <th style="width: 18%;">Time to Send</th>
                            <th style="width: 18%;">Time scheduled</th>
                        </tr>

                        <?php
                        if ($scheduled_messages_run = mysqli_query($conn, $sort_by_time_sql)) {
                            while ($rs = mysqli_fetch_assoc($scheduled_messages_run)) {

                                ?>
                                <tr>
                                    <td><?php
                                        $initial_recipient_string = $rs['recipient'];
                                        $recipients_array = explode(',', $initial_recipient_string);
                                        $RecipientNames = '';
                                        foreach ($recipients_array as $recipient) {
                                            $Get_Name_Sql = "SELECT name FROM contacts WHERE phone='$recipient'";
                                            if ($Get_Name_Run = mysqli_query($conn, $Get_Name_Sql)) {
                                                $Name = mysqli_fetch_assoc($Get_Name_Run);
                                                if (!empty($Name)) {
                                                    $RecipientNames = $RecipientNames . $Name['name'] . ',';
                                                } else {
                                                    $RecipientNames = $RecipientNames . $recipient . ',';
                                                }
                                            }
                                        }
                                        $RecipientNames = substr_replace($RecipientNames, '', -1);
                                        echo $RecipientNames;
                                        ?></td>
                                    <td><?php echo $rs['message']; ?></td>
                                    <td><?php echo $rs['scheduledtime']; ?></td>
                                    <td><?php echo $rs['timestamp']; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>

                <div id="DivCheckRecipient" style="display: none;">
                    <?php
                    $sort_by_recipient_sql = "SELECT * FROM scheduledsms ORDER BY recipient";
                    ?>
                    <table class="tbl-scheduled-sms">
                        <tr align="left">
                            <th style="width: 20%;">To</th>
                            <th style="width: 40%;">Message</th>
                            <th style="width: 18%;">Time to Send</th>
                            <th style="width: 18%;">Time scheduled</th>
                        </tr>

                        <?php
                        if ($scheduled_messages_run = mysqli_query($conn, $sort_by_recipient_sql)) {
                            while ($rs = mysqli_fetch_assoc($scheduled_messages_run)) {

                                ?>
                                <tr>
                                    <td><?php
                                        $initial_recipient_string = $rs['recipient'];
                                        $recipients_array = explode(',', $initial_recipient_string);
                                        $RecipientNames = '';
                                        foreach ($recipients_array as $recipient) {
                                            $Get_Name_Sql = "SELECT name FROM contacts WHERE phone='$recipient'";
                                            if ($Get_Name_Run = mysqli_query($conn, $Get_Name_Sql)) {
                                                $Name = mysqli_fetch_assoc($Get_Name_Run);
                                                if (!empty($Name)) {
                                                    $RecipientNames = $RecipientNames . $Name['name'] . ',';
                                                } else {
                                                    $RecipientNames = $RecipientNames . $recipient . ',';
                                                }
                                            }
                                        }
                                        $RecipientNames = substr_replace($RecipientNames, '', -1);
                                        echo $RecipientNames;
                                        ?></td>
                                    <td><?php echo $rs['message']; ?></td>
                                    <td><?php echo $rs['scheduledtime']; ?></td>
                                    <td><?php echo $rs['timestamp']; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>

                <div id="DivCheckMessage" style="display: none;">
                    <?php
                    $sort_by_message_sql = "SELECT * FROM scheduledsms ORDER BY message";
                    ?>
                    <table class="tbl-scheduled-sms">
                        <tr align="left">
                            <th style="width: 20%;">To</th>
                            <th style="width: 40%;">Message</th>
                            <th style="width: 18%;">Time to Send</th>
                            <th style="width: 18%;">Time scheduled</th>
                        </tr>

                        <?php
                        if ($scheduled_messages_run = mysqli_query($conn, $sort_by_message_sql)) {
                            while ($rs = mysqli_fetch_assoc($scheduled_messages_run)) {

                                ?>
                                <tr>
                                    <td><?php
                                        $initial_recipient_string = $rs['recipient'];
                                        $recipients_array = explode(',', $initial_recipient_string);
                                        $RecipientNames = '';
                                        foreach ($recipients_array as $recipient) {
                                            $Get_Name_Sql = "SELECT name FROM contacts WHERE phone='$recipient'";
                                            if ($Get_Name_Run = mysqli_query($conn, $Get_Name_Sql)) {
                                                $Name = mysqli_fetch_assoc($Get_Name_Run);
                                                if (!empty($Name)) {
                                                    $RecipientNames = $RecipientNames . $Name['name'] . ',';
                                                } else {
                                                    $RecipientNames = $RecipientNames . $recipient . ',';
                                                }
                                            }
                                        }
                                        $RecipientNames = substr_replace($RecipientNames, '', -1);
                                        echo $RecipientNames;
                                        ?></td>
                                    <td><?php echo $rs['message']; ?></td>
                                    <td><?php echo $rs['scheduledtime']; ?></td>
                                    <td><?php echo $rs['timestamp']; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>

                </p>


            </section>

            <!-- <section class="stats-graph slight-shadow">

             </section> -->
        </main>
        <footer class="grid-item grid-item-footer">
            <span>BulkySMS@copyright 2018</span>
        </footer>
    </div>

    </body>
    <script>
        var dropdownArrow = document.getElementsByClassName("dropdown-arrow")[0]

        dropdownArrow.addEventListener("click", function () {
            var userInfoDropd = document.getElementsByClassName("user-info-dropd")[0]
            if (userInfoDropd.style.display !== 'block') {
                userInfoDropd.style.display = 'block'
            } else {
                userInfoDropd.style.display = 'none'
            }

        })

        function SelectCheck(nameSelect) {
            if (nameSelect) {
                OptionValue = document.getElementById("getorder").value;
                //alert(admOptionValue);
                if (OptionValue == "ByTime") {
                    document.getElementById("DivCheckTime").style.display = "block";
                    document.getElementById("DivCheckMessage").style.display = "none";
                    document.getElementById("DivCheckRecipient").style.display = "none";

                } else if (OptionValue == "ByRecipient") {
                    document.getElementById("DivCheckRecipient").style.display = "block";
                    document.getElementById("DivCheckTime").style.display = "none";
                    document.getElementById("DivCheckMessage").style.display = "none";

                } else if (OptionValue == "ByMessage") {
                    document.getElementById("DivCheckMessage").style.display = "block";
                    document.getElementById("DivCheckTime").style.display = "none";
                    document.getElementById("DivCheckRecipient").style.display = "none";
                }
                else {
                    document.getElementById("DivCheck").style.display = "none";
                }
            }
            else {
                document.getElementById("DivCheck").style.display = "none";
            }
        }

    </script>
    </html>

<?php
}else{
    header('Location: ' . $_SERVER["REQUEST_URI"] . '?notFound=1');
    die();
}
?>