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

#This is the code for updating a contact


if(isset($_POST['savechanges'])){
    $Name = $_POST['Name'];
    $Telephone = $_POST['Telephone'];
    $Address = $_POST['Address'];
    $contactid = $_POST['contactid'];
    if(!empty($Name) && !empty($Telephone) && !empty($Address)) {
        #header('Location: contacts.php');
        $update_contact_sql = "UPDATE contacts SET name='$Name', phone='$Telephone', address='$Address' WHERE phone=$contactid";

        if (mysqli_query($conn, $update_contact_sql)) {
            echo 'Successfully updated contact';
            header('Location: ../../../EAMedical/bulksms/contacts.php');
        } else {
            echo 'Failed to update contact<br>';
            echo mysqli_error($conn);
        }
    }else{
        header('Location: ../../bulksms/contacts.php');
    }



}else{
    header('Location: ../../bulksms/contacts.php');
}




?>