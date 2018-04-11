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

$sent_messages_sql = "SELECT * FROM sentsms ORDER BY datesent desc";
?>


<?php
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

        <title>BulkSMS | Logs</title>
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
                background-color: #e5b29c;
                color: white;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .error-log-color {
                background-color: rgba(217, 136, 128, 0.12);
                opacity: 0.8;
            }
        </style>

    </head>
    <body>
    <?php include_once 'nav.heads.php'; ?>

    <?php include_once 'solid-div-tabs.php'; ?>

            <section class="details-tab-sec slight-shadow error-log-color">
                <table class="tbl-sent-sms" style="width: 100%;">
                    <h3>Notifications</h3>
                    <?php
                    $sendstatus_sql = "SELECT * FROM message_responses WHERE cls_status = 0 AND server_response='f' ORDER BY id DESC";

                    if ($sendstatus_run = mysqli_query($conn, $sendstatus_sql)) {
                    if (mysqli_num_rows($sendstatus_run) == 0) {
                    ?>
                    <tr>
                        <td>No Notifications</td>
                    </tr>
                </table>
            </section>
        <?php

        } else {


            ?>
            <tr>
                <th style="width: 40%;">Message</th>
                <th style="width: 10%;">Type</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 40%;">Reason</th>
            </tr>
            <?php


            while ($rs = mysqli_fetch_assoc($sendstatus_run)) {

                if ($rs['server_response'] == 'f' && $rs['send_type'] == 'n') {

                    $sent_failed_sql = "SELECT message FROM failedsms WHERE id=" . $rs['message'];
                    $sent_failed_run = mysqli_query($conn, $sent_failed_sql);
                    $failed_rs = mysqli_fetch_assoc($sent_failed_run);

                    ?>

                    <tr>
                        <td class="small-rw"><?php echo $failed_rs['message']; ?></td>
                        <td class="small-rw"><?php echo 'instant'; ?></td>
                        <td class="danger-rw small-rw-2"><?php echo 'failed'; ?></td>
                        <td><?php echo $rs['reason']; ?></td>
                    </tr>


                    <?php


                } else if ($rs['server_response'] == 'f' && $rs['send_type'] == 'l') {

                    $scheduled_failed_sql = "SELECT message FROM scheduledsmsfailed WHERE id=" . $rs['message'];
                    $schedule_failed_run = mysqli_query($conn, $scheduled_failed_sql);
                    $schedule_failed_rs = mysqli_fetch_assoc($schedule_failed_run);

                    ?>

                    <tr>
                        <td class="small-rw"><?php echo $schedule_failed_rs['message']; ?></td>
                        <td class="small-rw"><?php echo 'scheduled'; ?></td>
                        <td class="danger-rw small-rw-2"><?php echo 'failed'; ?></td>
                        <td><?php echo $rs['reason']; ?></td>
                    </tr>

                    <?php


                }
            }


            ?>
            </table>
            <form action="notifications.clear.php" method="post">
                <table align="center" style="width: 80%">
                    <tr>
                        <td colspan="4">&nbsp</td>
                    </tr>
                    <tr>
                        <td style="width: 100%; text-align:center;" colspan="4">
                            <button name="clearnotifications" type="submit">clear notifications</button>
                        </td>
                    </tr>
                </table>

            </form>
            <?php
        }
        }
        ?>
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

    </script>
    </html>
<?php
}else{
    header('Location: ' . $_SERVER["REQUEST_URI"] . '?notFound=1');
    die();
}
?>