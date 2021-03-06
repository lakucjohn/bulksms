<?php
session_start();
require_once '../Config/bulksms.config.php';
$sent_messages = 0;
$scheduled_messages = 0;
$contacts = 0;
$groupcount = 0;

$sent_message_count_sql = "SELECT * FROM sentsms ORDER BY datesent desc";
$scheduled_message_count_sql = "SELECT * FROM scheduledsms";
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

        <title>BulkSMS | SMS Dashboard</title>
        <link rel="stylesheet" type="text/css" href="static/css/css-main.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Nunito|Open+Sans" rel="stylesheet">
        <style>

            th {
                background-color: #e5b29c;
                color: white;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

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

            select {
                width: 200px;
                height: 30px;
            }
        </style>
    </head>
    <body>

    <?php include_once 'nav.heads.php'; ?>

        <?php include_once 'solid-div-tabs.php'; ?>

            <section class="details-tab-sec slight-shadow">
                Arrange By: <select id="getorder" onchange="SelectCheck(this);">
                    <option id="ByTime" value="ByTime" selected="selected">Time</option>
                    <option id="ByRecipient" value="ByRecipient">Recipient</option>
                    <option id="ByMessage" value="ByMessage">Message</option>
                </select>
                <p>
                <div id="DivCheckTime">
                    <?php
                    $sort_by_time_sql = "SELECT * FROM sentsms ORDER BY datesent DESC";
                    ?>
                    <table class="tbl-sent-sms">
                        <tr>
                            <th style="width: 20%;">To</th>
                            <th style="width: 60%;">Message</th>
                            <th style="width: 20%;">Time</th>
                        </tr>
                        <?php
                        if ($sent_message_count_run = mysqli_query($conn, $sort_by_time_sql)) {

                            while ($sent_msg_rs = mysqli_fetch_assoc($sent_message_count_run)) {


                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        /*
                                         * Changing the contacts to the owners names
                                         */
                                        #echo $sent_msg_rs['recipient'];
                                        $initial_recipient_string = $sent_msg_rs['recipient'];
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
                                        ?>
                                    </td>
                                    <td><?php echo $sent_msg_rs['message']; ?></td>
                                    <td class="td-sentsms"><?php echo $sent_msg_rs['datesent']; ?></td>
                                </tr>

                                <?php
                            }
                        }


                        ?>
                    </table>
                </div>

                <div id="DivCheckRecipient" style="display: none;">
                    <?php
                    $sort_by_recipient_sql = "SELECT * FROM sentsms ORDER BY recipient";
                    ?>
                    <table class="tbl-sent-sms">
                        <tr>
                            <th style="width: 20%;">To</th>
                            <th style="width: 60%;">Message</th>
                            <th style="width: 20%;">Time</th>
                        </tr>
                        <?php
                        if ($sent_message_count_run = mysqli_query($conn, $sort_by_recipient_sql)) {

                            while ($sent_msg_rs = mysqli_fetch_assoc($sent_message_count_run)) {


                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        /*
                                         * Changing the contacts to the owners names
                                         */
                                        #echo $sent_msg_rs['recipient'];
                                        $initial_recipient_string = $sent_msg_rs['recipient'];
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
                                        ?>
                                    </td>
                                    <td><?php echo $sent_msg_rs['message']; ?></td>
                                    <td class="td-sentsms"><?php echo $sent_msg_rs['datesent']; ?></td>
                                </tr>

                                <?php
                            }
                        }


                        ?>
                    </table>
                </div>

                <div id="DivCheckMessage" style="display: none;">
                    <?php
                    $sort_by_message_sql = "SELECT * FROM sentsms ORDER BY message";
                    ?>
                    <table class="tbl-sent-sms">
                        <tr>
                            <th style="width: 20%;">To</th>
                            <th style="width: 60%;">Message</th>
                            <th style="width: 20%;">Time</th>
                        </tr>
                        <?php
                        if ($sent_message_count_run = mysqli_query($conn, $sort_by_message_sql)) {

                            while ($sent_msg_rs = mysqli_fetch_assoc($sent_message_count_run)) {


                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        /*
                                         * Changing the contacts to the owners names
                                         */
                                        #echo $sent_msg_rs['recipient'];
                                        $initial_recipient_string = $sent_msg_rs['recipient'];
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
                                        ?>
                                    </td>
                                    <td><?php echo $sent_msg_rs['message']; ?></td>
                                    <td class="td-sentsms"><?php echo $sent_msg_rs['datesent']; ?></td>
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
