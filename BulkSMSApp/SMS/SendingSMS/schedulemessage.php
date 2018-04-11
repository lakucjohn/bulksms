<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/6/18
 * Time: 1:15 PM
 */
$_SESSION['Fail_send_reason'] = "";

function SendScheduledSMS($phone, $Message, $Date, $Time,$date)
{
    $username = "256706291191";///Your Username
    $password = "3619";///Your Password
    $mobile = $phone;///Recepient Mobile Number
    $sender = "SBTECH";
    $message = $Message;

////sending sms

    $post = "sender=" . urlencode($sender) . "&mobile=" . urlencode($mobile) . "&message=" . urlencode($message) . "";
    $url = "http://sendpk.com/api/sms.php?username=".$username."&password=".$password."&sender=".$sender."&mobile=".$mobile."&date=".$Date."&time=".$Time."&message=".urlencode($message);
    $ch = curl_init();
    $timeout = 30; // set to zero for no timeout
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $result = curl_exec($ch);
    /*Print Responce*/
    echo $result;

    if(substr($result,0,2) == 'OK'){
        $response = 's';
        echo 'Message Scheduled Successfully';
        SaveScheduledMessage('m',$mobile,$Message,$date.' '.$Time);

        echo 'Message Sent Successfully';

    }else{
        if(substr($result,0,1) == '5') {
            $_SESSION['Fail_send_reason'] = 'Recepient Is Empty';
        }else if(substr($result,0,1) == '6') {
            $_SESSION['Fail_send_reason'] = 'Message Is Empty';
        }else if(substr($result,0,1) == '7') {
            $_SESSION['Fail_send_reason'] = 'Invalid Recpient';
        }else if(substr($result,0,1) == '8') {
            $_SESSION['Fail_send_reason'] = 'Insuficient SMS Credit';
        }else if(substr($result,0,1) == '9') {
            $_SESSION['Fail_send_reason'] = 'SMS Rejected';
        }


        SaveFailedSchedule('m', $mobile, $Message,  $date. ' ' . $Time);

    }



}

function SaveScheduledMessage($Recipient_Type, $Recipient, $Message, $Scheduled_Time)
{
    #global $conn;
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'bulksmsdb';
    $response = 's';
    $sendtype = 'l';

    $conn = new mysqli($hostname, $username, $password, $database);

    if(!$conn){
        echo mysqli_error($conn);
    }

#This is the code for inserting a new scheduled sms

    $insert_sms_sql = "INSERT INTO scheduledsms(recipient_type,recipient,message,scheduledtime,timestamp) VALUES('$Recipient_Type','$Recipient','$Message','$Scheduled_Time',now())";

    if (mysqli_query($conn, $insert_sms_sql)) {
        $sms_id_sql = "SELECT id FROM scheduledsms WHERE recipient_type='$Recipient_Type' AND recipient='$Recipient' AND message='$Message' AND scheduledtime='$Scheduled_Time'";
        if($sms_id_run = mysqli_query($conn,$sms_id_sql)){
            $results = mysqli_fetch_assoc($sms_id_run);
            $smsid =$results['id'];
            $savescheduleresponse_sms_sql = "INSERT INTO message_responses(message,server_response,send_type) VALUES ($smsid,'$response','$sendtype')";

            if(mysqli_query($conn,$savescheduleresponse_sms_sql)){
                echo 'Successfully scheduled message';
            }

        }

        echo 'Successfully saved sms';
        #header('Location: ../../bulksms/userdashboard.php');
    } else {
        echo 'Failed to insert contact<br>';
        echo mysqli_error($conn);
    }
}

function SaveFailedSchedule($Recipient_Type, $Recipient, $Message, $Scheduled_Time)
{
    #global $conn;
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'bulksmsdb';
    $response = 'f';
    $sendtype = 'l';

    $conn = new mysqli($hostname, $username, $password, $database);

    if(!$conn){
        echo mysqli_error($conn);
    }

#This is the code for inserting a new scheduled sms

    $insert_sms_sql = "INSERT INTO scheduledsmsfailed(recipient_type,recipient,message,scheduledtime,timestamp) VALUES('$Recipient_Type','$Recipient','$Message','$Scheduled_Time',now())";

    if (mysqli_query($conn, $insert_sms_sql)) {
        $sms_id_sql = "SELECT id FROM scheduledsmsfailed WHERE recipient_type='$Recipient_Type' AND recipient='$Recipient' AND message='$Message' AND scheduledtime='$Scheduled_Time'";
        if($sms_id_run = mysqli_query($conn,$sms_id_sql)){
            $results = mysqli_fetch_assoc($sms_id_run);
            $smsid =$results['id'];
            if(is_connected() == True) {
                if(isset($_SESSION['Fail_send_reason'])){
                    $reason = $_SESSION['Fail_send_reason'];
                    $savefailedresponse_sms_sql = "INSERT INTO message_responses(message,server_response,send_type, reason) VALUES ($smsid,'$response','$sendtype','$reason')";
                    if(mysqli_query($conn,$savefailedresponse_sms_sql)){
                        echo 'Successfully saved failed message';
                    }
                }

            }else{

                $reason = 'Connection to network failed';
                $savefailedresponse_sms_sql = "INSERT INTO message_responses(message,server_response,send_type, reason) VALUES ($smsid,'$response','$sendtype','$reason')";
                if(mysqli_query($conn,$savefailedresponse_sms_sql)){
                    echo 'Successfully saved failed message';
                }
            }

        }
        echo 'Successfully saved sms';
        #header('Location: ../../bulksms/userdashboard.php');
    } else {
        echo 'Failed to insert contact<br>';
        echo mysqli_error($conn);
    }
}
function is_connected()
{
$connected = @fsockopen("bulksms.com.pk", 80);
    //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}
?>
