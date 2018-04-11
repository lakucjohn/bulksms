<?
session_start();
require_once '../Config/bulksms.config.php';

/*
 * ************************************************************************************************
 * ******************************   First dealing with SMS Templates ******************************
 * ************************************************************************************************
 */
$template_message = '';
$contact_group = '';
$get_templates_sql = "SELECT id, name, message FROM smstemplates";
if($get_templates_run = mysqli_query($conn,$get_templates_sql)){
    while($rs = mysqli_fetch_assoc($get_templates_run)){
        if(isset($_POST['usetemplate'.$rs['id']])){
            $template_message = $rs['message'];
        }

        if(isset($_POST['deletetemplate'.$rs['id']])){
            require_once '../SMS/SMSDB/SMSTemplates/smstemplate.delete.php';
            DeleteSMSTemplate($rs['id']);
            header('Location: templates.php');

        }
    }
}

/*
 * ****************************************************************************************************
 * *********************************************Sending Message to individuals ************************
 * ****************************************************************************************************
 */

#Code for sending the message
if(isset($_POST['SendMessage'])){

    if(isset($_POST['personslist']) && isset($_POST['inputmessage_i'])){
        $people = $_POST['personslist'];
        $Message = $_POST['inputmessage_i'];

        #Getting the Scheduled Date and Time
        if(isset($_POST['scheduletime_individual'])){
            $DateTimeValue = $_POST['scheduletime_individual'];

            if(!empty($DateTimeValue)){

                /*
                 * ***********************************************************************************
                 * **************************** Send the message at the input date and time **********
                 */

                $datetime = new DateTime($DateTimeValue);

                $sendable_time  = $datetime->add(new DateInterval('PT2H'));

                #Getting the date
                $date = $sendable_time->format('d-m-Y');

                #Getting the time
                $time = $sendable_time->format('H:i:s');

                if(!empty($people)) {
                    foreach ($people as $person) {
                        $find_contact_number_sql = "SELECT phone FROM contacts WHERE id=$person";
                        if($find_contact_number_run = mysqli_query($conn, $find_contact_number_sql)){
                            while($rs = mysqli_fetch_assoc($find_contact_number_run)){
                                $contact_group = $contact_group.$rs['phone'].',';
                            }
                        }
                    }
                    $contact_group = substr_replace($contact_group, "", -1);

                    require_once '../SMS/SendingSMS/schedulemessage.php';
                    SendScheduledSMS($contact_group,$Message,$date,$time);
                    #header('Location: ../../EAMedical/bulksms/userdashboard.php');

                }else{
                    echo 'Could not send message: No recipients selected';
                }

            }else{

                /*
                 * ************************************************************************************
                 * ****************************  Send the message now *********************************
                 */

                if(!empty($people)) {
                    foreach ($people as $person) {
                        #echo $person;
                        $find_contact_number_sql = "SELECT phone FROM contacts WHERE id=$person";
                        if($find_contact_number_run = mysqli_query($conn, $find_contact_number_sql)){
                            while($rs = mysqli_fetch_assoc($find_contact_number_run)){
                                $contact_group = $contact_group.$rs['phone'].',';
                            }
                        }
                    }
                    $contact_group = substr_replace($contact_group, "", -1);

                    require_once '../SMS/SendingSMS/sendmultiplesms.php';
                    SendSMSMultiple($contact_group,$Message);
                    #header('Location: ../../EAMedical/bulksms/userdashboard.php');

                }else{
                    echo 'Could not send message: No recipients selected';
                }

            }




        }


    }
}
/*
 * *****************************************************************************************************
 * ***************************************************Sending a message to a group *********************
 * *****************************************************************************************************
 */
#Code for sending group message
if(isset($_POST['SendMessageGroup'])){
    if(isset($_POST['grouplist']) && isset($_POST['inputmessage_g'])){
        $groups = $_POST['grouplist'];
        $Message = $_POST['inputmessage_g'];

        #Getting the Scheduled Date and Time
        if(isset($_POST['scheduletime_group'])){

            $DateTimeValue = $_POST['scheduletime_group'];

            if(!empty($DateTimeValue)) {

                /*
                 * **************************************************************************************
                 * ************************************  Send the message at the input date and time*****
                 */

                $datetime = new DateTime($DateTimeValue);

                $datetime->add(new DateInterval('PT2H'));

                #Getting the date
                $date = $datetime->format('d-m-Y');

                #Getting the time
                $time = $datetime->format('H:i:s');

                if(!empty($groups)) {
                    foreach ($groups as $group) {
                        #echo $group;

                        $find_contact_numbers_sql = "SELECT phonenumber FROM groupmembers WHERE groupid=$group";
                        if($find_contact_number_run = mysqli_query($conn, $find_contact_numbers_sql)){
                            while($rs = mysqli_fetch_assoc($find_contact_number_run)){
                                $contact_group = $contact_group.$rs['phonenumber'].',';
                            }
                        }
                    }

                    $contact_group = substr_replace($contact_group, "", -1);

                    require_once '../SMS/SendingSMS/schedulemessage.php';
                    #echo $contact_group;
                    SendScheduledSMS($contact_group,$Message,$date,$time);
                    #header('Location: ../../EAMedical/bulksms/userdashboard.php');

                }else{
                    echo 'Could not send message: No recipients selected';
                }

            }else{

                /*
                 * *************************************************************************************
                 * **********************************************  Send the message now ****************
                 */

                if(!empty($groups)) {
                    foreach ($groups as $group) {
                        #echo $group;

                        $find_contact_numbers_sql = "SELECT phonenumber FROM groupmembers WHERE groupid=$group";
                        if($find_contact_number_run = mysqli_query($conn, $find_contact_numbers_sql)){
                            while($rs = mysqli_fetch_assoc($find_contact_number_run)){
                                $contact_group = $contact_group.$rs['phonenumber'].',';
                            }
                        }
                    }
                    $contact_group = substr_replace($contact_group, "", -1);
                    #echo $contact_group;

                    require_once '../SMS/SendingSMS/sendmultiplesms.php';
                    SendSMSMultiple($contact_group,$Message);
                    #header('Location: ../../EAMedical/bulksms/userdashboard.php');

                }else{
                    echo 'Could not send message: No recipients selected';
                }



            }


        }

    }
}

/*******************************************************************************************************
 * *************************************  Scheduling a message to individuals  *************************
 * *****************************************************************************************************
 */

#Code for scheduling the message
if(isset($_POST['ScheduleMessage'])){
    if(isset($_POST['personslist']) && isset($_POST['inputmessage_i'])){
        $people = $_POST['personslist'];
        $Message = $_POST['inputmessage_i'];

        #Getting the Scheduled Date and Time
        if(isset($_POST['scheduletime_individual'])){

            $DateTimeValue = $_POST['scheduletime_individual'];

            if(!empty($DateTimeValue)) {

                /*
                 * ************************************************************************************
                 * ***********************  Send at the input date and time ***************************
                 */

                $datetime = new DateTime($DateTimeValue);

                $datetime->add(new DateInterval('PT2H'));

                #Getting the Date for mysql database
                $Date = $datetime->format('Y-m-d');

                #Getting the date
                $date = $datetime->format('d-m-Y');

                #Getting the time
                $time = $datetime->format('H:i:s');

                /*
                 * **************************************************************************************
                 * ***************************************  Now Sending the Message *********************
                 */

                if(!empty($people)) {
                    foreach ($people as $person) {
                        $find_contact_number_sql = "SELECT phone FROM contacts WHERE id=$person";
                        if($find_contact_number_run = mysqli_query($conn, $find_contact_number_sql)){
                            while($rs = mysqli_fetch_assoc($find_contact_number_run)){
                                $contact_group = $contact_group.$rs['phone'].',';
                            }
                        }
                    }
                    $contact_group = substr_replace($contact_group, "", -1);

                    require_once '../SMS/SendingSMS/schedulemessage.php';
                    SendScheduledSMS($contact_group,$Message, $date, $time,$Date);
                    #header('Location: ../../EAMedical/bulksms/userdashboard.php');

                }else{
                    echo 'Could not send message: No recipients selected';
                }


            }else{

                #Send now if the time has not been set

                if(!empty($people)) {
                    foreach ($people as $person) {
                        #echo $person;
                        $find_contact_number_sql = "SELECT phone FROM contacts WHERE id=$person";
                        if($find_contact_number_run = mysqli_query($conn, $find_contact_number_sql)){
                            while($rs = mysqli_fetch_assoc($find_contact_number_run)){
                                $contact_group = $contact_group.$rs['phone'].',';
                            }
                        }
                    }
                    $contact_group = substr_replace($contact_group, "", -1);

                    require_once '../SMS/SendingSMS/sendmultiplesms.php';
                    SendSMSMultiple($contact_group,$Message);
                    #header('Location: ../../EAMedical/bulksms/userdashboard.php');

                }else{
                    echo 'Could not send message: No recipients selected';
                }
            }


        }


    }
}

/*******************************************************************************************************
 * ********************************************  Scheduling a message to a group ***********************
 * *****************************************************************************************************
 */
#Code for scheduling group message
if(isset($_POST['ScheduleMessageGroup'])){
    if(isset($_POST['grouplist']) && isset($_POST['inputmessage_g'])){
        $groups = $_POST['grouplist'];
        $Message = $_POST['inputmessage_g'];

        #Getting the Scheduled Date and Time
        if(isset($_POST['scheduletime_group'])){
            $DateTimeValue = $_POST['scheduletime_group'];

            if(!empty($DateTimeValue)) {

                /*
                 * *****************************************************************************************
                 * ********************************  Send at the input date and time ***********************
                 */

                $datetime = new DateTime($DateTimeValue);

                $datetime->add(new DateInterval('PT2H'));

                #Getting the time for the database
                $Date = $datetime->format('Y-m-d');

                #Getting the date for scheduling
                $date = $datetime->format('d-m-Y');

                #Getting the time
                $time = $datetime->format('H:i:s');

                #******************************************* Now Scheduling the message ****************

                if(!empty($groups)) {
                    foreach ($groups as $group) {
                        #echo $group;

                        $find_contact_numbers_sql = "SELECT phonenumber FROM groupmembers WHERE groupid=$group";
                        if($find_contact_number_run = mysqli_query($conn, $find_contact_numbers_sql)){
                            while($rs = mysqli_fetch_assoc($find_contact_number_run)){
                                $contact_group = $contact_group.$rs['phonenumber'].',';
                            }
                        }
                    }

                    $contact_group = substr_replace($contact_group, "", -1);

                    require_once '../SMS/SendingSMS/schedulemessage.php';
                    #echo $contact_group;
                    SendScheduledSMS($contact_group,$Message,$date, $time,$Date);
                    #header('Location: ../../EAMedical/bulksms/userdashboard.php');

                }else{
                    echo 'Could not send message: No recipients selected';
                }

            }else{

                /*
                 * ****************************************************************************************
                 * ********************************  Send Now *********************************************
                 */
                if(!empty($groups)) {
                    foreach ($groups as $group) {
                        #echo $group;

                        $find_contact_numbers_sql = "SELECT phonenumber FROM groupmembers WHERE groupid=$group";
                        if($find_contact_number_run = mysqli_query($conn, $find_contact_numbers_sql)){
                            while($rs = mysqli_fetch_assoc($find_contact_number_run)){
                                $contact_group = $contact_group.$rs['phonenumber'].',';
                            }
                        }
                    }
                    $contact_group = substr_replace($contact_group, "", -1);
                    #echo $contact_group;

                    require_once '../SMS/SendingSMS/sendmultiplesms.php';
                    SendSMSMultiple($contact_group,$Message);
                    #header('Location: ../../EAMedical/bulksms/userdashboard.php');

                }else{
                    echo 'Could not send message: No recipients selected';
                }
            }


        }

    }
}
/*
 ********************************************************************************************************
 * ******************************************************************************************************
 *                      END OF PHP MANIPULATION
 * ******************************************************************************************************
 * ******************************************************************************************************
 */

if(isset($_SESSION['user'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>BulkSMS | SendSM</title>
        <link rel="stylesheet" type="text/css" href="static/css/css-main.css">
        <link rel="stylesheet" type="text/css" href="static/css/jquery.datetimepicker.min.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Nunito|Open+Sans" rel="stylesheet">
        <style>
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .container {
                margin: 2%;
                width: 96%;
                height: 400px;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.19);
                border-radius: 2%;
            }

            .middle-box {
                margin-left: 5%;

            }

            .middle-content {
                margin-left: 30%;
                margin-top: 5%;
            }

            .msg-content {
                clear: both;
            }

            .msg-left {
                float: left;
                width: 30%;
            }

            .msg-right {
                float: right;
                width: 60%;
            }

            #individual {
                max-height: 450px;
            }
        </style>
    </head>
    <body>
    <div class="popup-modal popup-modal-add-reciepients">

        <form class="contacts-selection-form slight-shadow" method="post" action="sendsms.php">
            <select id="selectMe">
                <option value="" selected>----Select another category----</option>
                <option value="individual">Individual(s)</option>
                <option value="group">Group(s)</option>
            </select>
            <div id="individual" class="group">
                <h3>Select Individual Recepients </h3>

                <ul>

                    <?php

                    $selectable_contacts_sql = "SELECT id,name, phone, address FROM contacts";
                    if ($selectable_contacts_run = mysqli_query($conn, $selectable_contacts_sql)) {
                        while ($rs = mysqli_fetch_assoc($selectable_contacts_run)) {

                            ?>

                            <li class="contact-li-item">
                                <input type="checkbox" name="personslist[]" value="<?php echo $rs['id']; ?>">
                                <label><?php echo $rs['name']; ?> - <span
                                            class="contact-grp-txt"><?php echo $rs['phone']; ?><?php echo $rs['address']; ?></span></label>
                            </li>

                            <?php
                        }
                    }
                    ?>


                </ul>
                <p>&nbsp;</p>
                <input type="hidden" name="inputmessage_i" id="inputmessage_i" value="Message Here"/>
                Schedule Time: <input type="datetime" id="datetimepicker" placeholder="Select Date and Time"
                                      name="scheduletime_individual"/>


                <p>&nbsp;</p>
                <button class="btn btn-success" name="SendMessage">Send Now</button>
                <button class="btn btn-success" name="ScheduleMessage">Send Later</button>
                <button class="btn btn-warn" onclick="cancelAddRecepient()">Cancel</button>
            </div>
            <div id="group" class="group">
                <h3>Select Group Recepients</h3>

                <ul>

                    <?php

                    $selectable_contacts_sql = "SELECT id,groupname FROM contactgroupnames";
                    if ($selectable_contacts_run = mysqli_query($conn, $selectable_contacts_sql)) {
                        while ($rs = mysqli_fetch_assoc($selectable_contacts_run)) {

                            ?>

                            <li class="contact-li-item">
                                <input type="checkbox" name="grouplist[]" value="<?php echo $rs['id']; ?>">
                                <label><?php echo $rs['groupname']; ?></label>
                            </li>

                            <?php
                        }
                    }
                    ?>


                </ul>
                <p>&nbsp;</p>
                <input type="hidden" name="inputmessage_g" id="inputmessage_g" value="<?php echo $AjaxMessage; ?>"/>
                Schedule Time: <input type="datetime" id="datetimepicker2" placeholder="Select Date and Time"
                                      name="scheduletime_group"/>

                <p>&nbsp;</p>
                <button class="btn btn-success" name="SendMessageGroup">Send Now</button>
                <button class="btn btn-success" name="ScheduleMessageGroup">Send Later</button>
                <button class="btn btn-warn" onclick="cancelAddRecepient()">Cancel</button>
            </div>
        </form>


    </div>
    <?php include_once 'nav.heads.php'; ?>
        <main class="grid-item grid-item-main main-minheight">
            <div class="container">
                <h3 class="page-title middle-content">Compose Message</h3><br>
                <div class="add-sms-sec slight-shadow middle-box">
                    <div class="msg-content">
                        <div class="msg-left"><label class="feild-label">Message: </label></div>
                        <div class="msg-right">
                            <div class="result">0 / 160</div>
                        </div>
                    </div>


                    <form class="send-sms-form" action="sendsms.php" method="post" style="text-align: right;">

                        <textarea class="sms-txt-area" name="Message" id="Message"
                                  maxlength="160"><?php echo $template_message; ?></textarea>

                        <br>


                        <button type="button" class="btn btn-success btn-send" id="MenuButton"
                                onclick="return AddRecepient(); return false;">Send Message
                        </button>
                        <br>

                    </form>
                </div>
            </div>

        </main>
        <footer class="grid-item grid-item-footer">
            <span>BulkySMS@copyright 2018</span>
        </footer>
    </div>
    <script src="static/javascript/jquery-3.3.1.min.js"></script>
    <script src="static/javascript/jquery.datetimepicker.full.min.js"></script>

    <script>
        var dropdownArrow = document.getElementsByClassName("dropdown-arrow")[0]

        dropdownArrow.addEventListener("click", function () {
            var userInfoDropd = document.getElementsByClassName("user-info-dropd")[0]
            if (userInfoDropd.style.display !== 'block') {
                userInfoDropd.style.display = 'block'
            } else {
                userInfoDropd.style.display = 'none'
            }

        })
        function AddRecepient() {
            var popupModalAddRecepient = document.getElementsByClassName("popup-modal-add-reciepients")[0]
            popupModalAddRecepient.style.display = 'block'


        }

        function cancelAddRecepient() {
            popUpModal.style.display = 'none'

        }

        $(document).ready(function () {
            $('.group').hide();
            $('#option1').show();
            $('#selectMe').change(function () {
                $('.group').hide();
                $('#' + $(this).val()).show();
            })
        });


        $('#datetimepicker').datetimepicker({
            format: 'Y-m-d H:i',
        });

        $('#datetimepicker2').datetimepicker({
            format: 'Y-m-d H:i',
        });

        $(document).ready(function () {
            $('#MenuButton').click(function () {
                var Message = $('#Message').val();
                $('#inputmessage_i').val(Message);
                $('#inputmessage_g').val(Message);
                //alert(Message)

            });
        });


    </script>

    <script src="static/javascript/js-main.js"></script>

    <script>
        $(document).ready(function () {
            $('textarea#Message').on('keyup', function () {
                var charCount = $(this).val().replace(/\s/g, '').length;
                $(".result").text(charCount + " / 160");
            });
        });
    </script>


    </body>
    </html>

<?php
}else{
    header('Location: ' . $_SERVER["REQUEST_URI"] . '?notFound=1');
    die();
}
?>
 
