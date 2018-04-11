<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/27/18
 * Time: 2:58 PM
 */
session_start();
require_once '../Config/bulksms.config.php';
if(isset($_POST['SaveUser'])){
    if(isset($_POST['FName']) && isset($_POST['LName']) && isset($_POST['username']) && isset($_POST['Password']) && isset($_POST['ConfirmPassword']) && isset($_POST['UserLevel'])){
        $Name = $_POST['FName'].' '.$_POST['LName'];
        $Username = $_POST['username'];
        $Password = $_POST['Password'];
        $AgainPassword = $_POST['ConfirmPassword'];
        $UserLevel = $_POST['UserLevel'];

        if(!empty($Name) && !empty($Username) && !empty($Password) && !empty($AgainPassword) && !empty($UserLevel)) {
            if ($Password == $AgainPassword) {
                $EncryptedPassword = base64_encode($Password);
                $Insert_user_sql = "INSERT INTO users(nname, username, password, usertype) VALUES ('$Name','$Username','$EncryptedPassword','$UserLevel')";

                if (mysqli_query($conn, $Insert_user_sql)) {
                    header('Location: '.$_SERVER['PHP_SELF']);
                    die;
                    #echo 'OK';
                } else {
                    echo mysqli_error($conn);
                }
            }
        }
    }

}

#Performing operations on Users
$Get_All_Users_Sql = "SELECT id FROM users";
if($Get_All_Users_Run = mysqli_query($conn, $Get_All_Users_Sql)){
    while($usr_rs = mysqli_fetch_assoc($Get_All_Users_Run)){
        #Deleting a user
        if(isset($_POST['DeleteUser'.$usr_rs['id']])){
            $Delete_user_sql = "DELETE FROM users WHERE id=".$usr_rs['id'];
            if(mysqli_query($conn, $Delete_user_sql)){
                $_SESSION['SuccessMessage'] = 'Successfully deleted '.$usr_rs['nname\'s'].' Account';
                header('Location: ' . $_SERVER['PHP_SELF']);
                die;
            }else{
                echo mysqli_error($conn);
            }
        }

        #Updating a user
        if(isset($_POST['savechanges'.$usr_rs['id']])){
            if(isset($_POST['EditName']) && isset($_POST['EditUsername']) && isset($_POST['EditUserLevel']) && isset($_POST['changingpassword'])){
                $editname = $_POST['EditName'];
                $editusername = $_POST['EditUsername'];
                $edituserlevel = $_POST['EditUserLevel'];
                $changingpassword = $_POST['changingpassword'];
                $changestatusactive=0;
                $changestatusinactive = 0;

                if(isset($_POST['changestatusactive'])) {
                    $changestatusactive = $_POST['changestatusactive'];
                }elseif (isset($_POST['changestatusinactive'])){

                    $changestatusinactive = $_POST['changestatusinactive'];
                }

                if(!empty($editname) && !empty($editusername) && !empty($edituserlevel) && !empty($changingpassword)) {

                    if ($changestatusactive) {

                        $Update_user_with_status_sql = "UPDATE users SET nname = '$editname', username = '$editusername', password = '$changingpassword', usertype = '$edituserlevel', activity = 1 WHERE id=" . $usr_rs['id'];
                        if (mysqli_query($conn, $Update_user_with_status_sql)) {
                            $_SESSION['user-data'] = $editname;
                            header('Location: ' . $_SERVER['PHP_SELF']);
                            die;

                        }else {
                            echo mysqli_error($conn);
                        }

                    } else if ($changestatusinactive) {

                        $Update_user_with_status_sql = "UPDATE users SET nname = '$editname', username = '$editusername', password = '$changingpassword', usertype = '$edituserlevel', activity = 0 WHERE id=" . $usr_rs['id'];
                        if (mysqli_query($conn, $Update_user_with_status_sql)) {
                            $_SESSION['user-data'] = $editname;
                            header('Location: ' . $_SERVER['PHP_SELF']);
                            die;

                        }else {
                            echo mysqli_error($conn);
                        }

                    } else {
                        $Update_user_without_status_sql = "UPDATE users SET nname = '$editname', username = '$editusername', password = '$changingpassword', usertype = '$edituserlevel' WHERE id=" . $usr_rs['id'];
                        if (mysqli_query($conn, $Update_user_without_status_sql)) {
                            $_SESSION['user-data'] = $editname;
                            header('Location: ' . $_SERVER['PHP_SELF']);
                            die;

                        } else {
                            echo mysqli_error($conn);
                        }
                    }
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
        <title>BulkSMS | User Accounts</title>
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

        <form class="confirm-delete-form slight-shadow" id="Delete-This" method="post" action="user.accounts.php">

            <h4>Are you sure you want to completely delete this user ? </h4>


            <button type="submit" class="btn btn-danger btn-full-width" id="deleteBtn">Delete</button>
            <button type="button" class="btn btn-warn btn-full-width " onclick="cancelAddRecepient()">Cancel</button>
        </form>


    </div>

    <div class="popup-modal popup-modal-adduser-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="user.accounts.php">

            <table>
                <tr>
                    <th colspan="3" align="center">Create new user account</th>
                </tr>
                <tr>
                    <td colspan="3" align="center">&nbsp;</td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="FName" class="txt-f-normal"/></td>
                    <td>&nbsp;</td>
                    <td>Last Name:</td>
                    <td><input type="text" name="LName" class="txt-f-normal"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" class="txt-f-normal" maxlength="15"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="Password" class="txt-f-normal"/>

                    </td>
                    <td>&nbsp;</td>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="ConfirmPassword" class="txt-f-normal"/>

                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr>

                    <td>User Level:</td>
                    <td><select name="UserLevel" class="txt-f-normal change-height">
                            <option value="">---Select a category--</option>
                            <?php
                            $Get_Level_sql = "SELECT symbol, userlevel FROM user_levels";

                            if ($Get_Level_run = mysqli_query($conn, $Get_Level_sql)) {
                                while ($level_rs = mysqli_fetch_assoc($Get_Level_run)) {

                                    ?>
                                    <option value="<?php echo $level_rs['symbol']; ?>"><?php echo $level_rs['userlevel']; ?></option>
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


            <input type="submit" name="SaveUser" value="Save" id="AddUser" class="btn btn-success btn-full-width"/>
            <button class="btn btn-warn btn-full-width ">Cancel</button>
        </form>


    </div>

    <div class="popup-modal popup-modal-edituser-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="user.accounts.php">

            <table>
                <tr>
                    <td><h3>Edit Account Information</h3></td>
                </tr>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="EditName" id="EditName" value="" class="txt-f-normal"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="EditUsername" id="EditUsername" maxlength="15" value="" class="txt-f-normal"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="changingpassword" id="changingpassword" maxlength="15" value="" class="txt-f-normal"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>User Level:</td>
                    <td>
                        <select name="EditUserLevel" class="txt-f-normal change-height" id="EditUserLevel">
                            <option value="">---Select a category--</option>
                            <?php
                            $Get_Level_sql = "SELECT symbol, userlevel FROM user_levels";

                            if ($Get_Level_run = mysqli_query($conn, $Get_Level_sql)) {
                                while ($level_rs = mysqli_fetch_assoc($Get_Level_run)) {

                                    ?>
                                    <option value="<?php echo $level_rs['symbol']; ?>"><?php echo $level_rs['userlevel']; ?></option>
                                    <?php

                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;<input type="checkbox" name="changestatusactive" id="changestatus"/><label for="changestatus" id="changestatuslabel">Activate</label></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>


            <input type="submit" id="savechanges" value="Save Changes" class="btn btn-success btn-full-width"/>
            <button class="btn btn-warn btn-full-width " onclick="cancelAddRecepient()">Cancel</button>
        </form>


    </div>

    <div class="alert-box success"><?php if(isset($_SESSION['SuccessMessage'])){ $SuccessMessage = $_SESSION['SuccessMessage']; echo $SuccessMessage; } ?></div>
    <div class="alert-box failure">Failure Alert !!!</div>
    <div class="alert-box warning">Warning Alert !!!</div>

    <?php
    /***********************************************************************************
     *
     */
        include_once 'nav.heads.php';

    ?>
        <main class="grid-item grid-item-main main-minheight">
            <h4 class="page-title">User Authentication</h4>
            <section class="customer-contact-sec">

                <input type="search" name="" autofocus="" placeholder="Search in table" onkeyup="searchContact(this)"
                       class="txt-field txt-field-search">


                <div class="edit-div">


                    <button name="addcontact" type="button" class="btn-edit btn-edit-success"
                            onclick="AddContactPopUp()"><img src="images/icons/icons8-add-user-male-32.png"
                                                             class="edit-icon" alt="add contact icon"></button>&nbsp;&nbsp;
                    <!--                <img src="images/icons/icons8-id-not-verified-32.png" alt="Block user icon" class="edit-icon">edit-icon-->
                </div>

                <br><br>
                <div class="edit-div">
                    <!--                <img src="images/icons/icons8-trash-32.png" alt="delete icon" class="edit-icon">-->
                    <!--                <img src="images/icons/icons8-id-not-verified-32.png" alt="Block user icon" class="edit-icon">edit-icon-->
                </div>
                <br><br>
                <div class="tbl-div">
                    <table class="tble-groups contacts-data-tr tbl-contacts" width="100%">


                        <thead>

                        <!--                    <th>&nbsp;&#9745;</th>-->
                        <th style="background-color: #5d6d7e; color: white;">No</th>
                        <th style="background-color: #5d6d7e; color: white;">Name</th>
                        <th style="background-color: #5d6d7e; color: white;">Username</th>
                        <th style="background-color: #5d6d7e; color: white;">User Type</th>
                        <th style="background-color: #5d6d7e; color: white;">Status</th>
                        <th style="background-color: #5d6d7e; color: white;">&nbsp;</th>

                        </thead>
                        <tbody>
                        <?php
                        /******************************************************************************
                         * **************Reading the contacts from the database
                         */

                        $get_users_sql = "SELECT * FROM users ORDER BY nname";
                        if ($get_users_run = mysqli_query($conn, $get_users_sql)) {

                            $count = 0;

                            while ($rs = mysqli_fetch_assoc($get_users_run)) {

                                /*
                                 * **************************Now displaying the contacts******************
                                 */
                                ?>

                                <tr class="contacts-data-tr">
                                    <!--                                <td><input type="checkbox" name=""></td>-->
                                    <td><?php echo $count += 1; ?></td>
                                    <td><?php echo $rs['nname']; ?></td>
                                    <td><?php echo $rs['username']; ?></td>

                                    <td>
                                        <?php
                                        $usertype = $rs['usertype'];
                                        $get_level_sql = "SELECT userlevel FROM user_levels WHERE symbol = '$usertype'";

                                        if ($get_level_run = mysqli_query($conn, $get_level_sql)) {

                                            $level_rs = mysqli_fetch_assoc($get_level_run);

                                            echo $level_rs['userlevel'];
                                        }else{
                                            echo mysqli_error($conn);
                                        }



                                        ?>
                                    </td>
                                    <?php
                                        if($rs['activity']==0) {
                                            ?>
                                                <td class="danger-rw">
                                                    inactive
                                                </td>
                                            <?php
                                        }else{
                                        ?>
                                            <td class="success-rw">
                                                active
                                            </td>
                                        <?php
                                    }
                                    ?>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <?php

                                                    ?>
                                                    <button class="btn-edit btn-delete" id="<?php echo $rs['id']; ?>"
                                                            name="<?php echo $rs['username']; ?>"
                                                            onclick="EditUserPopUp('<?php echo $rs['id']; ?>','<?php echo $rs['nname']; ?>','<?php echo $rs['username']; ?>','<?php echo $rs['password']; ?>','<?php echo $rs['usertype']; ?>','<?php echo $rs['activity']; ?>');">
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


        //Function for confirming deletion
        function confirmDeletePopup(rowid) {

            var popupModalDeleteRecord = document.getElementsByClassName("popup-modal-delete-record")[0]

            deleteBtn.setAttribute('name', "DeleteUser" + rowid)
            popupModalDeleteRecord.style.display = "block"
        }

        //Function for adding a contact
        function AddContactPopUp() {

            var popupModalAddRecord = document.getElementsByClassName("popup-modal-adduser-record")[0]

            //deleteBtn.setAttribute('name', "DeleteContact"+rowid)
            popupModalAddRecord.style.display = "block"
        }
        //Function for editing a contact
        function EditUserPopUp(id,name,username,password,usertype,activity) {

            var popupModalEditRecord = document.getElementsByClassName("popup-modal-edituser-record")[0]

            EditName.setAttribute('value', name)
            EditUsername.setAttribute('value', username)
            changingpassword.setAttribute('value', password)
            EditUserLevel.setAttribute('value', usertype)
            savechanges.setAttribute('name','savechanges'+id)

            if(activity === '1'){

                changestatus.setAttribute('name', 'changestatusinactive')
                changestatuslabel.innerHTML = "Deactivate";
            }else{

                changestatus.setAttribute('name', 'changestatusactive')
               changestatuslabel.innerHTML = "Activate";
            }
//            if(activity === '0') {
//                $('#changestatus').prop('checked', false);
//            }else if(activity === '1'){
//                $('#changestatus').prop('checked', true);
//            }
            document.getElementById('EditUserLevel').value=usertype;
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

        $( "#deleteBtn" ).click(function() {
            $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        });

        $( "#AddUser" ).click(function() {
            $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        });

        $( "#savechanges" ).click(function() {
            $( "div.warning" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
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
