<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/7/18
 * Time: 3:24 PM
 */


/**********************************************************************************************************************/
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bulksmsdb';

$conn = new mysqli($hostname, $username, $password, $database);

if(!$conn){
    echo mysqli_error($conn);
}
#This is the code for adding a group
function CreateGroup($groupname){
    global $conn;
    $insert_group_sql = "INSERT INTO contactgroupnames(groupname) VALUES ('$groupname')";

    if (mysqli_query($conn, $insert_group_sql)) {
        echo 'Successfully added group<br>';
    } else {
        echo 'Failed to insert group<br>';
        echo mysqli_error($conn);
    }
}
?>