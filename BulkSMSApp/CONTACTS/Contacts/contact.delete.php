<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/7/18
 * Time: 3:24 PM
 */

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bulksmsdb';

$conn = new mysqli($hostname, $username, $password, $database);

if(!$conn){
    echo mysqli_error($conn);
}

function DeleteFromContacts($contact_id){
    global $conn;
    $delete_contact_sql = "DELETE FROM contacts WHERE id='$contact_id'";

    if(mysqli_query($conn, $delete_contact_sql)){
        echo 'Successfully deleted contact';

    }else{
        echo 'Failed to delete contact<br>';
        echo mysqli_error($conn);
    }
}
function DeleteFromGroups($contact_phone){
    global $conn;
    $delete_contact_sql = "DELETE FROM groupmembers WHERE phonenumber='$contact_phone'";

    if(mysqli_query($conn, $delete_contact_sql)){
        echo 'Successfully deleted contact';

    }else{
        echo 'Failed to delete contact<br>';
        echo mysqli_error($conn);
    }
}




?>
