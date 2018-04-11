<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/16/18
 * Time: 4:29 PM
 */
session_start();
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bulksmsdb';

$conn = new mysqli($hostname, $username, $password, $database);

if(!$conn){
    echo mysqli_error($conn);
}

#Code for adding new members
$GroupName = $_SESSION['GroupName'];
if(isset($_POST['AddNewMembers'])) {

    $people = $_POST['checkgroup'];
    $groupid = 0;

    $groupname_sql = "SELECT id FROM contactgroupnames WHERE groupname='$GroupName'";
    if ($groupname_run = mysqli_query($conn, $groupname_sql)) {
        echo $GroupName;
        while ($rs = mysqli_fetch_assoc($groupname_run)) {

            $groupid = $rs['id'];

        }
    }
    foreach ($people as $person) {

        $find_contact_number_sql = "SELECT phone FROM contacts WHERE id=$person";
        if($find_contact_number_run = mysqli_query($conn,$find_contact_number_sql)){
            while($number_rs = mysqli_fetch_assoc($find_contact_number_run)){
                $phonenumber = $number_rs['phone'];
                $insert_group_member_sql = "INSERT INTO groupmembers(groupid, phonenumber) VALUES ($groupid,$phonenumber)";

                if ($insert_group_member_run = mysqli_query($conn, $insert_group_member_sql)) {
                    header('Location: Group.Manage.php');


                }else{
                    # echo mysqli_error($conn);
                }
            }
        }


    }
}else{
    header('Location: Group.Manage.php');
}


?>


