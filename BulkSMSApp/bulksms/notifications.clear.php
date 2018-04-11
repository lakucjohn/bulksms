<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bulksmsdb';

$conn = new mysqli($hostname, $username, $password, $database);

if(!$conn){
    echo mysqli_error($conn);
}
if(isset($_POST['clearnotifications'])){
    $clear_notifications_sql = "UPDATE message_responses SET cls_status = 1 WHERE cls_status = 0";
    if(mysqli_query($conn, $clear_notifications_sql)){
        header('Location: logs.php');
    }
}

?>