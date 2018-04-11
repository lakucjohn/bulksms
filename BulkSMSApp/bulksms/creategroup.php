<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/15/18
 * Time: 5:59 PM
 */
session_start();
if(isset($_POST['MakeGroup'])) {
    if (!empty($_POST['MakeGroup'])) {
        $_SESSION['GroupName'] = $_POST['GroupName'];
        require '../CONTACTS/Groups/group.add.php';
        CreateGroup($_SESSION['GroupName']);
        header('Location: GroupMembers.php');

    }else{

        header('Location: groups.php');
    }
}else{

    header('Location: groups.php');
}
?>
