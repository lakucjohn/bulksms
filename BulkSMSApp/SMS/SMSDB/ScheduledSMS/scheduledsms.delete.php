<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/7/18
 * Time: 3:22 PM
 */
require '../../../Config/bulksms.config.php';

function DeleteScheduledMessage($Message_db_id)
{
    global $conn;

#This is the code for deleting an already scheduled sms for the system
    $delete_sms_sql = "DELETE FROM scheduledsms WHERE id='$Message_db_id'";

    if (mysqli_query($conn, $delete_sms_sql)) {
        echo 'Successfully deleted the sms';
    } else {
        echo 'Failed to insert contact<br>';
        echo mysqli_error($conn);
    }
}
?>
