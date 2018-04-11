<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/7/18
 * Time: 3:20 PM
 */
require '../../../Config/bulksms.config.php';
if(isset($_POST['savesmstemplate'])) {
    $name = $_POST['tpt-title'];
    $message = $_POST['sms-temp-message'];
    SaveSMSTemplate($name, $message);
}else{
    header('Location: ../../../bulksms/templates.php');
}
#Function for saving templates
function SaveSMSTemplate($Name,$Message)
{

    global $conn;

#This is the code for saving a new sms template
    $insert_template_sql = "INSERT INTO smstemplates(name,message,timestamp) VALUES('$Name','$Message',now())";

    if (mysqli_query($conn, $insert_template_sql)) {
        echo 'Successfully saved template';
        header('Location: ../../../bulksms/templates.php');
    } else {
        echo 'Failed to insert contact<br>';
        echo mysqli_error($conn);
    }
}
?>