<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/16/18
 * Time: 3:24 PM
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
$GroupId_sql = "SELECT id FROM groupmembers";
if($GroupId_run = mysqli_query($conn,$GroupId_sql)){
    while($rs = mysqli_fetch_assoc($GroupId_run)){
        if(isset($_POST['DeleteMember'.$rs['id']])){
            $Delete_Member_Sql = "DELETE FROM groupmembers WHERE id=".$rs['id'];


            if(mysqli_query($conn,$Delete_Member_Sql)){
                header('Location: '.$_SERVER['PHP_SELF']);
            }
        }
    }
}
if(isset($_POST['CancelRequest'])){
    header('Location: '.$_SERVER['PHP_SELF']);
}
if(isset($_POST['Groupid']) && isset($_POST['GroupName'])) {
    $_SESSION['Groupid'] = $_POST['Groupid'];
    $_SESSION['GroupName'] = $_POST['GroupName'];
}
if(isset($_SESSION['Groupid']) && isset($_SESSION['GroupName'])) {
    $Group_Members_Sql = "SELECT id,phonenumber FROM groupmembers WHERE groupid=" . $_SESSION['Groupid'];

    if (isset($_SESSION['user'])) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>BulkSMS | Customer Groups</title>
            <link rel="stylesheet" type="text/css" href="static/css/css-main.css">
            <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Nunito|Open+Sans" rel="stylesheet">

            <style>
                th {
                    background-color: #5d6d7e;
                    color: white;
                }

                tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

                .div-group-name {
                    font-size: 20px;
                    font-weight: bold;
                }
            </style>

        </head>
        <body>

        <div class="popup-modal popup-modal-add-record" id="popUpModal">

            <form class="confirm-delete-form add-contact-form slight-shadow" method="post"
                  action="Group.Member.Add.php">

                <h4>Add New Members</h4>

                <?php
                #COntacts already in group
                $already_in_group = array();

                $Load_Group_Contacts_Sql = "SELECT phonenumber FROM groupmembers WHERE groupid=" . $_SESSION['Groupid'];
                if ($Load_Group_Contacts_run = mysqli_query($conn, $Load_Group_Contacts_Sql)) {
                    $array_index = -1;
                    while ($Lrs = mysqli_fetch_assoc($Load_Group_Contacts_run)) {
                        $array_index += 1;
                        $already_in_group[$array_index] = $Lrs['phonenumber'];
                    }
                }
                $Load_New_Contacts_sql = "SELECT * FROM contacts";
                if ($Load_New_Contacts_run = mysqli_query($conn, $Load_New_Contacts_sql)) {
                    ?>
                    <ul class="ul-choose-contcts">
                        <?php
                        while ($Nrs = mysqli_fetch_assoc($Load_New_Contacts_run)) {
                            if (!in_array($Nrs['phone'], $already_in_group)) {

                                ?>


                                <li><input type="checkbox" name="checkgroup[]"
                                           value="<?php echo $Nrs['id']; ?>"/>&nbsp;<?php echo $Nrs['name']; ?>
                                    ( <?php echo $Nrs['phone']; ?> - <?php echo $Nrs['address']; ?>)
                                </li>
                                <?php

                            }
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>


                <input type="submit" name="AddNewMembers" class="btn btn-success btn-full-width" value="Save Group"/>
                <button class="btn btn-warn btn-full-width " onclick="cancelAddRecepient()">Cancel</button>
            </form>


        </div>


        <div class="popup-modal popup-modal-delete-record" id="popUpModal">

            <form class="confirm-delete-form slight-shadow" method="post" action="Group.Manage.php">

                <h4>Are you sure you want to delete this members ? </h4>


                <button type="submit" class="btn btn-danger btn-full-width" id="deleteBtn">Delete</button>
                <button type="submit" name="CancelRequest" class="btn btn-warn btn-full-width "
                        onclick="cancelAddRecepient()">Cancel
                </button>
            </form>


        </div>

        <div class="wrapper">

        <header class="grid-item grid-item-header">
            <h2 class="logo"><a href="userdashboard.php">BULKYSMS SBTECH</a></h2>
            <div class="user-name-div"><?php echo $_SESSION['user-data']; ?> &nbsp; &nbsp; <span class="dropdown-arrow"> &#9660;</span>
                <div class="user-info-dropd">

                    <a href="changepw.php">Manage Password</a>
                    <a href="signout.php">SignOut</a>
                </div>
            </div>
        </header>
        <nav class="grid-item grid-item-nav">
            <ul class="nav-ul">
                <?php
                if($_SESSION['user'] == 'a'){

                    ?>
                    <li class="nav-tab">
                        <a href="user.accounts.php">User Accounts</a>
                    </li>
                    <?php
                }
                ?>
                <li class="nav-tab">
                    <a href="userdashboard.php">DashBoard</a>
                </li>
                <li class="nav-tab">
                    <a href="sendsms.php">Compose Message</a>
                </li>
                <li class="nav-tab">
                    <a href="contacts.php">Patients</a>
                </li>
                <li class="nav-tab">
                    <a href="groups.php">Groups</a>
                </li>
                <li class="nav-tab">
                    <a href="templates.php">SMS Templates</a>
                </li>
            </ul>
        </nav>
        <main class="grid-item grid-item-main main-minheight">
        <h4 class="page-title">Customer Groups</h4>
        <section class="customer-contact-sec">
        <input type="search" autofocus="" placeholder="Search in table" onkeyup="searchContact(this)"
               class="txt-field txt-field-search">

        <div class="edit-div">
            <form action="creategroup.php">
                <button name="MakeGroup" type="button" class="btn-edit btn-edit-success"
                        onclick="CreateGroupMemberPopup();"><img src="images/icons/icons8-add-user-male-32.png"
                                                                 class="edit-icon" alt="add contact icon"></button>&nbsp;&nbsp;
                <!--                <img src="images/icons/icons8-id-not-verified-32.png" alt="Block user icon" class="edit-icon">edit-icon-->
            </form>
        </div><br><br>
        <div class="tbl-div">

        <table  class="tbl-contacts contacts-data-tr">
        <tr align="left">
            <td align="center" colspan="4">
                <div class="div-group-name"><?php echo $_SESSION['GroupName']; ?></div>
            </td>
        </tr>
        <tr align="left">
            <th width="400">Name</th>
            <th width="200">Contact</th>
            <th width="300">Address</th>
            <th width="200">&nbsp;</th>
        </tr>
        <?php
        if ($Group_Members_Run = mysqli_query($conn, $Group_Members_Sql)) {
            while ($Grs = mysqli_fetch_assoc($Group_Members_Run)) {
                $Contact_details_sql = "SELECT id,name, address FROM contacts WHERE phone=" . $Grs['phonenumber'];
                if ($Contact_details_run = mysqli_query($conn, $Contact_details_sql)) {
                    $Crs = mysqli_fetch_assoc($Contact_details_run);

                    ?>
                    <tr>
                        <td><?php echo $Crs['name']; ?></td>
                        <td><?php echo $Grs['phonenumber']; ?></td>
                        <td><?php echo $Crs['address']; ?></td>
                        <td>
                            <button type="button" id="DeleteMember" class="btn-edit btn-change"
                                    name="<?php echo $Grs['id']; ?>" onclick="DeleteMemberPopup(this.name);"><img
                                        src="images/icons/icons8-trash-32.png" alt="Delete Account" class="edit-icon">
                            </button>
                        </td>
                    </tr>


                    <?php
                }
            }
        }
    }
    ?>


    </table>
    <p>&nbsp;</p>

    </div>


    </section>
    </main>
    <footer class="grid-item grid-item-footer">
        <span>BulkySMS@copyright 2018</span>
    </footer>
</div>
    <script>
        //Function for the creation of a group
        function CreateGroupMemberPopup() {


            var popupModalCreateGroupRecord = document.getElementsByClassName("popup-modal-add-record")[0]

            //oldgroupname.setAttribute('value', rowdata)
            //group_id.setAttribute('value', groupid)
            popupModalCreateGroupRecord.style.display = "block"
        }

        //Function for the creation of a group
        function DeleteMemberPopup(record_id) {
            //alert(record_id);

            var popupModalDeleteRecord = document.getElementsByClassName("popup-modal-delete-record")[0]

            deleteBtn.setAttribute('name', 'DeleteMember' + record_id)
            //group_id.setAttribute('value', groupid)
            popupModalDeleteRecord.style.display = "block"
        }
    </script>
    <script src="static/javascript/js-main.js"></script>

    </body>
    </html>
<?php
}else{
    header('Location: ' . $_SERVER["REQUEST_URI"] . '?notFound=1');
    die();
}
?>
