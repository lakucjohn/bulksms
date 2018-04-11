<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/7/18
 * Time: 3:31 PM
 */
require '../../../Config/bulksms.config.php';
$Get_All_Templates_sql = "SELECT id, message FROM smstemplates";
if($Get_All_Templates_run = mysqli_query($conn,$Get_All_Templates_sql)){
    while($rs = mysqli_fetch_assoc($Get_All_Templates_run)){
        if(isset($_POST['EditTemplate'.$rs['id']])){
            $NewMessage = $_POST['Template_Message'];
            $NewTitle = $_POST['Template_Title'];
            $oldmessage = $rs['message'];
            UpdateSMSTemplate($oldmessage,$NewTitle, $NewMessage);

        }
    }
}
if(isset($_POST['CancelRequest'])){
    header('Location: ../../../bulksms/templates.php');
}
function UpdateSMSTemplate($oldmessage,$title, $newmessage)
{
    global $conn;

#This is the code for updating a contact

    $update_template_sql = "UPDATE smstemplates SET message='$newmessage', name='$title' WHERE message='$oldmessage'";

    if (mysqli_query($conn, $update_template_sql)) {
        echo 'Successfully updated the template';
        header('Location: ../../../bulksms/templates.php');
    } else {
        echo 'Failed to insert contact<br>';
        echo mysqli_error($conn);
    }
}
?>