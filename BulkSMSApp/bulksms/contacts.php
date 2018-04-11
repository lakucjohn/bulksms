<?php
session_start();
require_once '../Config/bulksms.config.php';
#This is the code for deleting a contact
require_once '../CONTACTS/Contacts/contact.delete.php';
$contacts_from_database_sql = "SELECT id, phone FROM contacts";
if($contacts_from_database_run = mysqli_query($conn, $contacts_from_database_sql)){
    while($rs = mysqli_fetch_assoc($contacts_from_database_run)){
        if(isset($_POST['DeleteContact'.$rs['id']])){
            DeleteFromContacts($rs['id']);
            DeleteFromGroups($rs['phone']);
            header('contacts.php');

        }
    }
}

/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/15/18
 * Time: 1:10 PM
 */
if(isset($_POST['AddContact'])){
    if(isset($_POST['Name']) && isset($_POST['Telephone']) && isset($_POST['Address'])){
        $Name = $_POST['Name'];
        $Telephone = $_POST['Telephone'];
        $Address = $_POST['Address'];

        require_once '../CONTACTS/Contacts/contact.add.php';
        addcontact($Name,$Telephone,$Address);
        header('Location: contacts.php');
    }
}

#Settings for editing a contact
$former_name = '';
$former_phone = '';
$former_address = '';
$contactdbid = 0;
$get_contact_sql = "SELECT id, name, phone, address FROM contacts";
if($get_contact_run = mysqli_query($conn,$get_contact_sql)){
    while($rs = mysqli_fetch_assoc($get_contact_run)){
        $contactid = 0;
        if(isset($_POST['editcontact'.$rs['id']])){
            $former_name = $rs['name'];
            $former_phone = $rs['phone'];
            $former_address = $rs['address'];
            $contactdbid = $rs['id'];

        }


    }
}

if(isset($_SESSION['user'])) {

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>BulkSMS | Customer Contacts</title>
        <link rel="stylesheet" type="text/css" href="static/css/css-main.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Nunito|Open+Sans" rel="stylesheet">

        <style>
            select {
                width: 200px;
                height: 30px;
            }

            .change-height {
                height: 40px;

            }

            .customer-contact-sec {
                height: 960px;
            }

            .tbl-div {
                overflow: auto;
                background-color: #f4f6f6;
                max-height: 750px;
            }

        </style>
    </head>
    <body>
    <div class="popup-modal popup-modal-delete-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="contacts.php">

            <h4>Are you sure you want to completely delete this customer ? </h4>


            <button type="submit" class="btn btn-danger btn-full-width" id="deleteBtn">Delete</button>
            <button type="button" class="btn btn-warn btn-full-width " onclick="cancelAddRecepient()">Cancel</button>
        </form>


    </div>

    <div class="popup-modal popup-modal-addcontact-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="addcontacts.php">

            <table>
                <tr>
                    <th colspan="3" align="center">Add new Patient</th>
                </tr>
                <tr>
                    <td colspan="3" align="center">&nbsp;</td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="Name" class="txt-f-normal"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Telephone:</td>
                    <td><input type="text" name="Telephone" id="Telephone" class="txt-f-normal" maxlength="15"
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <input type="text" name="Address" list="address" class="txt-f-normal"/>
                        <datalist id="address">
                            <option value="Kampala">Kampala</option>
                            <option value="Kabalagala">Kabalagaka</option>
                            <option value="Matugga">Matugga</option>
                            <option value="Ntinda">Ntinda</option>
                            <option value="Kibowa">Kibowa</option>
                            <option value="Entebbe">Entebbe</option>
                            <option value="Seeta">Seeta</option>
                        </datalist>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr>

                    <td>Purpose of visit:</td>
                    <td><select name="Purpose" class="txt-f-normal change-height">
                            <option value="">---Select a category--</option>
                            <?php
                            $Get_Purposes_sql = "SELECT id, purpose FROM selectable_purpose";

                            if ($Get_Purposes_run = mysqli_query($conn, $Get_Purposes_sql)) {
                                while ($purpose_rs = mysqli_fetch_assoc($Get_Purposes_run)) {

                                    ?>
                                    <option value="<?php echo $purpose_rs['id']; ?>"><?php echo $purpose_rs['purpose']; ?></option>
                                    <?php

                                }
                            }
                            ?>
                        </select></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
            </table>


            <input type="submit" name="AddContact" value="Save" class="btn btn-success btn-full-width"/>
            <button class="btn btn-warn btn-full-width ">Cancel</button>
        </form>


    </div>

    <div class="popup-modal popup-modal-editcontact-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="../CONTACTS/Contacts/contact.update.php">

            <table>
                <tr>
                    <th>Edit contact</th>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="Name" id="EditName" value="" class="txt-f-normal"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>

                    <td>Telephone:</td>
                    <td><input type="text" name="Telephone" id="EditTelephone" maxlength="15" value="" class="txt-f-normal"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <input type="text" name="Address" id="EditAddress" list="address" class="txt-f-normal"/>
                        <datalist id="address">
                            <option value="Kampala">Kampala</option>
                            <option value="Kabalagala">Kabalagaka</option>
                            <option value="Matugga">Matugga</option>
                            <option value="Ntinda">Ntinda</option>
                            <option value="Kibowa">Kibowa</option>
                            <option value="Entebbe">Entebbe</option>
                            <option value="Seeta">Seeta</option>
                        </datalist>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;<input type="hidden" name="contactid" id="contactid" value=""/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>


            <input type="submit" name="savechanges" value="Save Changes" class="btn btn-success btn-full-width"/>
            <button class="btn btn-warn btn-full-width " onclick="cancelAddRecepient()">Cancel</button>
        </form>


    </div>

    <?php include_once 'nav.heads.php'; ?>

        <main class="grid-item grid-item-main main-minheight">
            <h4 class="page-title">Customer Contacts</h4>
            <section class="customer-contact-sec">
                <input type="search" name="" autofocus="" placeholder="Search in table" onkeyup="searchContact(this)"
                       class="txt-field txt-field-search">

                <div class="edit-div">

                    <button name="addcontact" type="button" class="btn-edit btn-edit-success"
                            onclick="AddContactPopUp()"><img src="images/icons/icons8-add-user-male-32.png"
                                                             class="edit-icon" alt="add contact icon" title="Add New Patient"></button>&nbsp;&nbsp;
                    <!--                <img src="images/icons/icons8-id-not-verified-32.png" alt="Block user icon" class="edit-icon">edit-icon-->
                </div>

                <br><br>
                <div class="edit-div">
                    <!--                <img src="images/icons/icons8-trash-32.png" alt="delete icon" class="edit-icon">-->
                    <!--                <img src="images/icons/icons8-id-not-verified-32.png" alt="Block user icon" class="edit-icon">edit-icon-->
                </div>
                <br><br>
                Arrange By: <select id="getorder" onchange="SelectCheck(this);">
                    <option id="byaddress" value="byaddress" selected="selected">Address</option>
                    <option id="byname" value="byname">Name</option>
                </select><br><br>


                <div id="DivCheckAddress" class="tbl-div">
                    <table class="tble-groups contacts-data-tr tbl-contacts" width="100%">


                        <thead>

                        <!--                    <th>&nbsp;&#9745;</th>-->
                        <th style="background-color: #5d6d7e; color: white;">No</th>
                        <th style="background-color: #5d6d7e; color: white;">FileNo</th>
                        <th style="background-color: #5d6d7e; color: white;">Name</th>
                        <th style="background-color: #5d6d7e; color: white;">Contact Number</th>
                        <th style="background-color: #5d6d7e; color: white;">Address</th>
                        <th style="background-color: #5d6d7e; color: white;">Group</th>
                        <th style="background-color: #5d6d7e; color: white;">&nbsp;</th>

                        </thead>
                        <tbody>
                        <?php
                        /******************************************************************************
                         * **************Reading the contacts from the database
                         */

                        $get_contacts_sql = "SELECT * FROM contacts ORDER BY address";
                        if ($get_contacts_run = mysqli_query($conn, $get_contacts_sql)) {

                            $count = 0;

                            while ($rs = mysqli_fetch_assoc($get_contacts_run)) {

                                /*
                                 * **************************Now displaying the contacts******************
                                 */
                                ?>

                                <tr class="contacts-data-tr">
                                    <!--                                <td><input type="checkbox" name=""></td>-->
                                    <td><?php echo $count += 1; ?></td>
                                    <td>0001</td>
                                    <td><?php echo $rs['name']; ?></td>
                                    <td><?php echo $rs['phone']; ?></td>
                                    <td><?php echo $rs['address']; ?></td>

                                    <td>
                                        <?php
                                        $get_groups_sql = "SELECT groupid FROM groupmembers WHERE phonenumber = " . $rs['phone'];
                                        $Groups = '';
                                        if ($get_groups_run = mysqli_query($conn, $get_groups_sql)) {
                                            while ($group_rs = mysqli_fetch_assoc($get_groups_run)) {
                                                $get_groupname_sql = "SELECT groupname FROM contactgroupnames WHERE id=" . $group_rs['groupid'];

                                                if ($get_groupname_run = mysqli_query($conn, $get_groupname_sql)) {
                                                    $groupname = mysqli_fetch_assoc($get_groupname_run);
                                                    if ($groupname['groupname'])
                                                        $Groups = $Groups . $groupname['groupname'] . ',';
                                                }
                                            }
                                        }
                                        $Groups = substr_replace($Groups, '', -1);

                                        echo $Groups;
                                        ?>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <button class="btn-edit btn-delete" id="<?php echo $rs['name']; ?>"
                                                            value="<?php echo $rs['phone']; ?>"
                                                            name="<?php echo $rs['address']; ?>" title="Edit contact information for <?php echo $rs['name']; ?>"
                                                            onclick="EditContactPopUp(this.id,this.value,this.name);">
                                                        <img src="images/icons/icons8-edit-row-32.png" alt="Edit icon"
                                                             class="edit-icon"></button>
                                                </td>
                                                <td>
                                                    <button class="btn-edit btn-change" id="ConfirmDelete"
                                                            name="<?php echo $rs['id']; ?>" title="Delete <?php echo $rs['name']; ?> from the database"
                                                            onclick="confirmDeletePopup(this.name);"><img
                                                                src="images/icons/icons8-trash-32.png" alt="delete icon"
                                                                class="edit-icon"></button>

                                                </td>
                                                <td>
                                                    <form action="customer-finder.php" method="post">
                                                        <input type="hidden" name="CustomerPhone"
                                                               value="<?php echo $rs['phone']; ?>"/>
                                                        <input type="hidden" name="CustomerId"
                                                               value="<?php echo $rs['id']; ?>"/>
                                                        <input type="hidden" name="CustomerName"
                                                               value="<?php echo $rs['name']; ?>"/>
                                                        <button type="submit" class="btn-edit btn-info"
                                                                id="AboutCustomer" name="AboutCustomer" title="Read more about <?php echo $rs['name']; ?>"><img
                                                                    src="images/icons/Personal-information.ico"
                                                                    alt="delete icon" class="edit-icon"></button>
                                                    </form>

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php
                            }
                        }

                        ?>


                        </tbody>


                    </table>
                </div>
                <div id="DivCheckName" style="display: none;" class="tbl-div">
                    <table class="tble-groups contacts-data-tr tbl-contacts" width="100%">


                        <thead>

                        <!--                    <th>&nbsp;&#9745;</th>-->
                        <th style="background-color: #5d6d7e; color: white;">No</th>
                        <th style="background-color: #5d6d7e; color: white;">FileNo</th>
                        <th style="background-color: #5d6d7e; color: white;">Name</th>
                        <th style="background-color: #5d6d7e; color: white;">Contact Number</th>
                        <th style="background-color: #5d6d7e; color: white;">Address</th>
                        <th style="background-color: #5d6d7e; color: white;">Group</th>
                        <th style="background-color: #5d6d7e; color: white;">&nbsp;</th>

                        </thead>
                        <tbody>
                        <?php
                        /******************************************************************************
                         * **************Reading the contacts from the database
                         */

                        $get_contacts_sql = "SELECT * FROM contacts ORDER BY name";
                        if ($get_contacts_run = mysqli_query($conn, $get_contacts_sql)) {

                            $count = 0;

                            while ($rs = mysqli_fetch_assoc($get_contacts_run)) {

                                /*
                                 * **************************Now displaying the contacts******************
                                 */
                                ?>

                                <tr class="contacts-data-tr">
                                    <!--                                <td><input type="checkbox" name=""></td>-->
                                    <td><?php echo $count += 1; ?></td>
                                    <td>0001</td>
                                    <td><?php echo $rs['name']; ?></td>
                                    <td><?php echo $rs['phone']; ?></td>
                                    <td><?php echo $rs['address']; ?></td>

                                    <td>
                                        <?php
                                        $get_groups_sql = "SELECT groupid FROM groupmembers WHERE phonenumber = " . $rs['phone'];
                                        $Groups = '';
                                        if ($get_groups_run = mysqli_query($conn, $get_groups_sql)) {
                                            while ($group_rs = mysqli_fetch_assoc($get_groups_run)) {
                                                $get_groupname_sql = "SELECT groupname FROM contactgroupnames WHERE id=" . $group_rs['groupid'];

                                                if ($get_groupname_run = mysqli_query($conn, $get_groupname_sql)) {
                                                    $groupname = mysqli_fetch_assoc($get_groupname_run);
                                                    if ($groupname['groupname'])
                                                        $Groups = $Groups . $groupname['groupname'] . ',';
                                                }
                                            }
                                        }
                                        $Groups = substr_replace($Groups, '', -1);

                                        echo $Groups;
                                        ?>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <button class="btn-edit btn-delete" id="<?php echo $rs['name']; ?>"
                                                            value="<?php echo $rs['phone']; ?>"
                                                            name="<?php echo $rs['address']; ?>"
                                                            onclick="EditContactPopUp(this.id,this.value,this.name);">
                                                        <img src="images/icons/icons8-edit-row-32.png" alt="Edit icon"
                                                             class="edit-icon"></button>
                                                </td>
                                                <td>
                                                    <button class="btn-edit btn-change" id="ConfirmDelete"
                                                            name="<?php echo $rs['id']; ?>"
                                                            onclick="confirmDeletePopup(this.name);"><img
                                                                src="images/icons/icons8-trash-32.png" alt="delete icon"
                                                                class="edit-icon"></button>

                                                </td>
                                                <td>
                                                    <form action="customer-finder.php" method="post">
                                                        <input type="hidden" name="CustomerPhone"
                                                               value="<?php echo $rs['phone']; ?>"/>
                                                        <input type="hidden" name="CustomerId"
                                                               value="<?php echo $rs['id']; ?>"/>
                                                        <input type="hidden" name="CustomerName"
                                                               value="<?php echo $rs['name']; ?>"/>
                                                        <button type="submit" class="btn-edit btn-info"
                                                                id="AboutCustomer" name="AboutCustomer"><img
                                                                    src="images/icons/Personal-information.ico"
                                                                    alt="delete icon" class="edit-icon"></button>
                                                    </form>

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php
                            }
                        }

                        ?>


                        </tbody>


                    </table>
                </div>
                <div class="tbl-div" style="display: none;">


                    <!--                <div id="byname" class="sort">-->
                    <!--                    Sort By Name-->
                    <!--                </div>-->
                    <!--                <div id="byaddress" class="sort">-->
                    <!--                    Sort By Address-->
                    <!--                </div>-->


                </div>


            </section>
        </main>
        <footer class="grid-item grid-item-footer">
            <span>BulkySMS@copyright 2018</span>
        </footer>
    </div>

    <script src="static/javascript/jquery-3.3.1.min.js"></script>
    </body>
    <script>

        function SelectCheck(nameSelect) {
            if (nameSelect) {
                OptionValue = document.getElementById("getorder").value;
                //alert(admOptionValue);
                if (OptionValue == "byaddress") {
                    document.getElementById("DivCheckAddress").style.display = "block";
                    document.getElementById("DivCheckName").style.display = "none";

                } else if (OptionValue == "byname") {
                    document.getElementById("DivCheckName").style.display = "block";
                    document.getElementById("DivCheckAddress").style.display = "none";
                }
                else {
                    document.getElementById("DivCheckAddress").style.display = "none";
                }
            }
            else {
                document.getElementById("DivCheckAddress").style.display = "none";
            }
        }

        //Function for confirming deletion
        function confirmDeletePopup(rowid) {

            var popupModalDeleteRecord = document.getElementsByClassName("popup-modal-delete-record")[0]

            deleteBtn.setAttribute('name', "DeleteContact" + rowid)
            popupModalDeleteRecord.style.display = "block"
        }

        //Function for adding a contact
        function AddContactPopUp() {

            var popupModalAddRecord = document.getElementsByClassName("popup-modal-addcontact-record")[0]

            //deleteBtn.setAttribute('name', "DeleteContact"+rowid)
            popupModalAddRecord.style.display = "block"
        }
        //Function for editing a contact
        function EditContactPopUp(name, phone, address) {

            var popupModalEditRecord = document.getElementsByClassName("popup-modal-editcontact-record")[0]

            contactid.setAttribute('value', phone)
            EditName.setAttribute('value', name)
            EditTelephone.setAttribute('value', phone)
            EditAddress.setAttribute('value', address)
            popupModalEditRecord.style.display = "block"
        }

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
        $('#Telephone').keypress(function(e) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
                a.push(i);

            if (!(a.indexOf(k)>=0))
                e.preventDefault();

        });
        $('#EditTelephone').keypress(function(e) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
                a.push(i);

            if (!(a.indexOf(k)>=0))
                e.preventDefault();


        });
    </script>
    <script src="static/javascript/js-main.js"></script>

    </html>
<?php
}else{
    header('Location: ' . $_SERVER["REQUEST_URI"] . '?notFound=1');
    die();
}
?>
