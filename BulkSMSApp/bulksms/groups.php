<?php
session_start();
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bulksmsdb';

$conn = new mysqli($hostname, $username, $password, $database);

if(!$conn){
    echo mysqli_error($conn);
}


$newgroupname = '';
$Groupid = 0;
if(isset($_POST['SaveNewName'])){
    if(isset($_POST['NewGroupName']) && isset($_POST['Groupid'])) {
        $newgroupname = $_POST['NewGroupName'];
        $Groupid = $_POST['Groupid'];
        $update_group_sql = "UPDATE contactgroupnames SET groupname='$newgroupname' WHERE id = $Groupid";

        if (mysqli_query($conn, $update_group_sql)) {
            echo 'Successfully altered th name of the group<br>';
            header('Location: '.$_SERVER['PHP_SELF']);
            die;
        } else {
            echo 'Failed to update group information<br>';
            echo mysqli_error($conn);
        }
    }
}
$groups_sql = "SELECT id,groupname FROM contactgroupnames";
if(isset($_SESSION['user'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>BulkSMS | Customer Groups</title>
        <link rel="stylesheet" type="text/css" href="static/css/css-main.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Nunito|Open+Sans" rel="stylesheet">
        <style>
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
    <div class="popup-modal popup-modal-update-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="groups.php">
            <h4>Edit Group Name</h4>

            <input type="text" name="NewGroupName" value="" id="oldgroupname" class="txt-f-normal txt-f-full-wid"
                   required/>
            <input type="hidden" name="Groupid" value="" id="group_id"/>

            <button type="submit" name="SaveNewName" class="btn btn-success btn-full-width ">Save Changes</button>
            <button class="btn btn-warn btn-full-width " onclick="cancelAddRecepient()">Cancel</button>
        </form>


    </div>

    <div class="popup-modal popup-modal-add-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="creategroup.php">


            <h4>Create a new Group</h4>

            <label>Group Name </label><input type="text" name="GroupName" class="txt-f-normal txt-f-full-wid  "/>


            <input type="submit" class="btn btn-success btn-full-width" name="MakeGroup" value="Save Group"/>
            <button class="btn btn-warn btn-full-width " onclick="cancelAddRecepient()">Cancel</button>
        </form>


    </div>


    <div class="popup-modal popup-modal-delete-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="../CONTACTS/Groups/group.delete.php">

            <h4>Are you sure you want to delete this group and its members ? </h4>

            <input type="hidden" id="DeleteGroup"/>


            <button type="submit" class="btn btn-danger btn-full-width" id="deleteBtn">Delete</button>
            <button class="btn btn-warn btn-full-width " onclick="cancelAddRecepient()">Cancel</button>
        </form>


    </div>

    <div class="wrapper">


        <?php include_once 'nav.heads.php'; ?>
        <main class="grid-item grid-item-main main-minheight">
            <h4 class="page-title">Customer Groups</h4>
            <section class="customer-contact-sec">
                <input type="search" name="" autofocus="" placeholder="Search in table" onkeyup="searchContact(this)"
                       class="txt-field txt-field-search">

                <div class="edit-div">
                    <form action="creategroup.php">
                        <button name="MakeGroup" type="button" class="btn-edit btn-edit-success"
                                onclick="CreateGroupPopup();"><img
                                    src="images/icons/icons8-add-user-group-man-man-24.png" class="edit-icon"
                                    alt="add contact icon"></button>&nbsp;&nbsp;
                        <!--                <img src="images/icons/icons8-id-not-verified-32.png" alt="Block user icon" class="edit-icon">edit-icon-->
                    </form>
                </div>
                <br><br>
                <div class="edit-div">
                    <!--                <img src="images/icons/icons8-trash-32.png" alt="delete icon" class="edit-icon">-->
                    <!--                <img src="images/icons/icons8-id-not-verified-32.png" alt="Block user icon" class="edit-icon">edit-icon-->
                </div>
                <br><br>
                <div class="tbl-div">
                    <table class="tble-groups contacts-data-tr" width="100%" class="tbl-contacts">


                        <tr>
                            <th width="870">Group Names</th>

                        </tr>
                        <?php
                        if ($groups_run = mysqli_query($conn, $groups_sql)) {
                            while ($rs = mysqli_fetch_assoc($groups_run)) {

                                ?>
                                <tr>
                                    <td><?php echo $rs['groupname']; ?></td>
                                    <td>
                                        <button type="button" class="btn-edit btn-delete"
                                                name="<?php echo $rs['id']; ?>" id="<?php echo $rs['groupname']; ?>"
                                                onclick="confirmUpdatePopup(this.id, this.name);"><img
                                                    src="images/icons/icons8-edit-row-32.png" alt="edit Account"
                                                    class="edit-icon"></button>
                                    </td>
                                    <td>
                                        <form action="Group.Manage.php" method="post"><input type="hidden"
                                                                                             value="<?php echo $rs['id']; ?>"
                                                                                             name="Groupid"/><input
                                                    type="hidden" value="<?php echo $rs['groupname']; ?>"
                                                    name="GroupName"/>
                                            <button type="submit" class="btn-edit btn-edit btn-manage"
                                                    name="Manage<?php echo $rs['id']; ?>"><img
                                                        src="images/icons/icons8-maintenance-26.png"
                                                        alt="Manage Account" class="edit-icon"></button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn-edit btn-change"
                                                name="<?php echo $rs['id']; ?>"
                                                onclick="confirmDeletePopup(this.name);"><img
                                                    src="images/icons/icons8-trash-32.png" alt="edit Account"
                                                    class="edit-icon"></button>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>


                </div>


            </section>
        </main>
        <footer class="grid-item grid-item-footer">
            <span>BulkySMS@copyright 2018</span>
        </footer>
    </div>
    <script src="static/javascript/js-main.js"></script>
    <script>

        //Function for confirming deletion of a group
        function confirmDeletePopup(rowid) {


            var popupModalDeleteRecord = document.getElementsByClassName("popup-modal-delete-record")[0]

            deleteBtn.setAttribute('name', "GroupName" + rowid)
            popupModalDeleteRecord.style.display = "block"
        }

        //Function for confirming updating of a group
        function confirmUpdatePopup(rowdata, groupid) {


            var popupModalUpdateRecord = document.getElementsByClassName("popup-modal-update-record")[0]

            oldgroupname.setAttribute('value', rowdata)
            group_id.setAttribute('value', groupid)
            popupModalUpdateRecord.style.display = "block"
        }


        //Function for the creation of a group
        function CreateGroupPopup() {


            var popupModalCreateGroupRecord = document.getElementsByClassName("popup-modal-add-record")[0]

            //oldgroupname.setAttribute('value', rowdata)
            //group_id.setAttribute('value', groupid)
            popupModalCreateGroupRecord.style.display = "block"
        }

        function cancelAddRecepient() {
            popUpModal.style.display = 'none'
        }

    </script>
    <script src="static/javascript/js-main.js"></script>
    <script>
        var dropdownArrow = document.getElementsByClassName("dropdown-arrow")[0]

        dropdownArrow.addEventListener("click", function () {
                var userInfoDropd = document.getElementsByClassName("user-info-dropd")[0]
                if (userInfoDropd.style.display !== 'block') {
                    userInfoDropd.style.display = 'block'
                } else {
                    userInfoDropd.style.display = 'none'
                }

            }
        )
    </script>
    </body>
    </html>
<?php
}else{
    header('Location: ' . $_SERVER["REQUEST_URI"] . '?notFound=1');
    die();
}
?>
