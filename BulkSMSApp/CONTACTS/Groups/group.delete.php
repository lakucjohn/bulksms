<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/7/18
 * Time: 3:25 PM
 */

require '../../Config/bulksms.config.php';

$grouptodelete = '';
/**********************************************************************************************************************/
$Group_Names_Sql = "SELECT id, groupname FROM contactgroupnames";
if($Group_Names_Run = mysqli_query($conn, $Group_Names_Sql)){
    while($Grs = mysqli_fetch_assoc($Group_Names_Run)){
        if(isset($_POST['GroupName'.$Grs['id']])){
            $grouptodelete = $Grs['groupname'];
        }
    }
}

#This is the code for deleting a group
$groupid = 0;

#Getting the id of the group to delete
$groupid_sql = "SELECT id FROM contactgroupnames WHERE groupname='$grouptodelete'";
if($results = @mysqli_query($conn,$groupid_sql)){
    while($rs = mysqli_fetch_assoc($results)){
        $groupid =  $rs['id'];
    }
}

#Finding the contacts affected by deleting the group
$groupmemberscheck_sql = "SELECT * FROM groupmembers WHERE groupid='$groupid'";
$number_of_contacts = 0;
if($checkerquery = @mysqli_query($conn, $groupmemberscheck_sql)){

    if(mysqli_num_rows($checkerquery)!=0){
        $number_of_contacts = mysqli_num_rows($checkerquery);
    }
}

if($number_of_contacts == 0){
    $delete_group_sql = "DELETE FROM contactgroupnames WHERE groupname='$grouptodelete'";

    if(mysqli_query($conn, $delete_group_sql)){
        echo 'Successfully deleted the group<br>';
        header('Location: ../../EAMedical/index.php#groups');
    }else{
        echo 'Failed to delete group<br>';
        echo mysqli_error($conn);
    }
}else{
    $delete_group_sql = "DELETE FROM contactgroupnames WHERE groupname='$grouptodelete'";
    $delete_members_sql = "DELETE FROM groupmembers WHERE groupid='$groupid'";

    if(mysqli_query($conn, $delete_members_sql)){
        echo 'Successfully deleted group contacts';

        if(mysqli_query($conn, $delete_group_sql)){
            echo 'Successfully deleted the group';
            header('Location: ../../EAMedical/index.php#groups');
        }else{
            echo 'Failed to delete group<br>';
            echo mysqli_error($conn);
        }

    }else{
        echo 'Failed to delete group<br>';
        echo mysqli_error($conn);
    }
}

?>