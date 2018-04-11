<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/7/18
 * Time: 3:23 PM
 */
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bulksmsdb';

$conn = new mysqli($hostname, $username, $password, $database);

if(!$conn){
    echo mysqli_error($conn);
}

function DeleteSMSTemplate($template_db_id)
{
    global $conn;

#This is the code for deleting a contact
    #$templatetodelete = 'Thanks for supporting the SBTECH Team';
    $delete_contact_sql = "DELETE FROM smstemplates WHERE id='$template_db_id'";

    if (mysqli_query($conn, $delete_contact_sql)) {
        echo 'Successfully deleted template';
        #header('Location: ../../../bulksms/templates.php');
    } else {
        echo 'Failed to delete template<br>';
        echo mysqli_error($conn);
    }
}
?>