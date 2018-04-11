<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/7/18
 * Time: 3:23 PM
 */
require '../../../Config/bulksms.config.php';

function DeleteSMS($sms_db_id){

    global $conn;

    #This is the code for deleting an already scheduled sms for the system
    $smsidtodelete = 1;
    $delete_sms_sql = "DELETE FROM sentsms WHERE id='$sms_db_id'";

    if(mysqli_query($conn, $delete_sms_sql)){
        echo 'Successfully deleted the sms';
    }else{
        echo 'Failed to insert contact<br>';
        echo mysqli_error($conn);
    }
}

?>
