<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/7/18
 * Time: 3:24 PM
 */


#This is the code for inserting a new contact

function addcontact($Name, $Phone, $Address){
    global $conn;
        $Mobile = 0;

        if($Phone[0] == 0){
            $Mobile = preg_replace('/0/', 256, $Phone, 1);
        }

        $insert_contact_sql = "INSERT INTO contacts(name,address,phone,timestamp) VALUES('$Name','$Address','$Mobile',now())";

        if(mysqli_query($conn, $insert_contact_sql)){
        echo 'Successfully inserted contact';
        }else{
            echo 'Failed to insert contact<br>';
            echo mysqli_error($conn);
        }

            #header('Location: ../../../EAMedical/bulksms/contacts.php');


}


?>