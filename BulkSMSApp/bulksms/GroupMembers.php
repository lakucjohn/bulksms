<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/15/18
 * Time: 6:01 PM
 */
require '../Config/bulksms.config.php';
session_start();
$Stored_Contacts_sql = "SELECT id, name, address, phone FROM contacts ORDER BY name";


$GroupName = $_SESSION['GroupName'];

#echo $GroupName;

if(isset($_POST['AddMembers'])) {

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
                    header('Location: groups.php');


                }else{
                    # echo mysqli_error($conn);
                }
            }
        }


    }
}
if(isset($_SESSION['user'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>BulkSMS | Customer Groups</title>
        <link rel="stylesheet" type="text/css" href="static/css/css-main.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Nunito|Open+Sans" rel="stylesheet">

        <style>
            .btn-success {
                width: 200px;
                height: 40px;
                margin-top: 10%;
                margin-bottom: 10%;
                margin-left: 20%;
            }
        </style>

    </head>
    <body>


    <?php include_once 'nav.heads.php'; ?>
        <main class="grid-item grid-item-main main-minheight">
            <h4 class="page-title">Group Members</h4>
            <section class="customer-contact-sec">

                <div class="tbl-div">


                    <form action="GroupMembers.php" method="post">
                        <table>
                            <tr>
                                <th colspan="4">Select Group Members</th>

                            </tr>
                            <tr>
                                <td colspan="4">&nbsp;</td>

                            </tr>
                            <?php
                            if ($Stored_Contacts_run = mysqli_query($conn, $Stored_Contacts_sql)) {
                                while ($rs = mysqli_fetch_assoc($Stored_Contacts_run)) {

                                    ?>

                                    <tr>

                                        <td><input type="checkbox" name="checkgroup[]"
                                                   value="<?php echo $rs['id']; ?>"/></td>
                                        <td width="300">&nbsp;<?php echo $rs['name']; ?></td>
                                        <td width="300"><?php echo $rs['phone']; ?></td>
                                        <td width="300"><?php echo $rs['address']; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>


                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="AddMembers" value="Save Selection" class="btn-success"/>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </form>
                </div>
            </section>
        </main>
    </div>
    </body>
    </html>
<?php
}else{
    header('Location: ' . $_SERVER["REQUEST_URI"] . '?notFound=1');
    die();
}
?>

