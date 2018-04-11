<?php
session_start();
require_once '../Config/bulksms.config.php';
$saved_templates_sql = "SELECT id,message, name FROM smstemplates ORDER BY name";

if($saved_templates_run = mysqli_query($conn,$saved_templates_sql)){
    while($rs = mysqli_fetch_assoc($saved_templates_run)){
        if(isset($_POST['usetemplate'.$rs['id']])){
            $template_message = $rs['message'];
        }elseif (isset($_POST['deletetemplate'.$rs['id']])){
            require_once '../SMS/SMSDB/SMSTemplates/smstemplate.delete.php';
            DeleteSMSTemplate($rs['id']);

        }
    }
}
if(isset($_SESSION['user'])) {
    ?>
    <html>
    <head>
        <title>BulkSMS | SMS Templates</title>
        <link rel="stylesheet" type="text/css" href="static/css/css-main.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Nunito|Open+Sans" rel="stylesheet">


    </head>
    <body>
    <div class="popup-modal popup-modal-delete-record" id="popUpModalConfirmDelete">
        <form class="confirm-delete-form slight-shadow" action="templates.php" method="post">
            <h4>Are you sure you want to delete this template ? </h4>

            <input type="submit" value="Delete" id="deleteBtn" class="btn btn-danger btn-full-width ">
            <button class="btn btn-warn btn-full-width ">Cancel</button>
        </form>
    </div>

    <div class="popup-modal popup-modal-edit-temp" id="popUpModalEditTemplate">
        <form class="confirm-delete-form slight-shadow" action="../SMS/SMSDB/SMSTemplates/smstemplate.update.php"
              method="post">
            <h4>Edit Template </h4>

            <label>Template Title</label>
            <input type="text" name="Template_Title" id="Template_Title" class="txt-field txt-f-normal txt-f-tmp-txt">

            <label>Template Text</label>
            <textarea class="temp-txt" id="Template_Message" name="Template_Message"></textarea>
            <br><br>
            <input type="submit" value="Save" name="" id="SaveEditedTemp" class="btn btn-success btn-full-width ">
            <button class="btn btn-warn btn-full-width " name="CancelRequest" onclick="cancelAddRecepient()">Cancel
            </button>
        </form>
    </div>


    <div class="popup-modal popup-modal-Add-temp" id="popUpModalAddTemp">
        <form class="add-form slight-shadow" method="post" action="../SMS/SMSDB/SMSTemplates/smstemplate.save.php">
            <h4>Create a new SMS Template </h4>

            <label>Template Title</label>
            <input type="text" name="tpt-title" class="txt-field txt-f-normal txt-f-tmp-txt">

            <label>Template Text</label>
            <textarea class="temp-txt" name="sms-temp-message"></textarea>

            <input type="submit" value="Add Template" name="savesmstemplate" class="btn btn-success btn-full-width  ">
            <button class="btn btn-warn btn-full-width " onclick="cancelAddRecepient()" name="canceltemplate">Cancel
            </button>
        </form>
    </div>


    <?php include_once 'nav.heads.php'; ?>
        <main class="grid-item grid-item-main main-minheight">
            <h4 class="page-title">SMS Templates</h4>

            <div class="temp-div">
                <button class="btn btn-success btn-add-template" onclick="addTemplate()">ADD TEMPLATE</button>

                <?php
                if ($saved_templates_run = mysqli_query($conn, $saved_templates_sql)) {
                    while ($rs = mysqli_fetch_assoc($saved_templates_run)) {


                        ?>
                        <button class="accordion"><?php echo $rs['name']; ?></button>
                        <div class="panel">

                            <form action="sendsms.php" method="post">

                                <article class="template-article  ">
                                    <button type="submit" class="btn btn-success btn-use-template"
                                            name="usetemplate<?php echo $rs['id']; ?>">Use Template
                                    </button>

                                    <div class="edit-div">

                                        <button type="button" class="btn-edit btn-delete" id="<?php echo $rs['id']; ?>"
                                                name="<?php echo $rs['message']; ?>" value="<?php echo $rs['name']; ?>"
                                                onclick="editTemplate(this.id, this.name,this.value)"><img
                                                    src="images/icons/icons8-edit-row-32.png" alt="edit Account"
                                                    class="edit-icon"></button>
                                        <button type="button" class="btn-edit btn-change" id="<?php echo $rs['id']; ?>"
                                                name="deletetemplate<?php echo $rs['id']; ?>"
                                                onclick="confirmDeletePopup(this.id);"><img
                                                    src="images/icons/icons8-trash-32.png" alt="delete icon"
                                                    class="edit-icon"></button>

                                    </div>

                                    <div><br>
                                        <p class="template-txt"><?php echo $rs['message']; ?></p>
                                    </div>
                                </article>
                            </form>
                        </div>
                        <?php
                    }
                }

                ?>


            </div>


            <!--        <div class="pagination">-->
            <!--            <!-- <a href="#">&laquo;</a> -->
            <!--            <a href="#">1</a>-->
            <!--            <a href="#" class="active">2</a>-->
            <!--            <a href="#">3</a>-->
            <!--            <a href="#">4</a>-->
            <!--            <a href="#">5</a>-->
            <!--            <a href="#">6</a>-->
            <!--            <!-- <a href="#">&raquo;</a> -->
            <!--        </div>-->


        </main>
        <footer class="grid-item grid-item-footer">
            <span>BulkySMS@copyright 2018</span>
        </footer>
    </div>
    <script src="../bulksms/static/javascript/jquery-3.3.1.min.js"></script>
    <script>
        function confirmDeletePopup(template_id) {

            var id = template_id;

            //$('#deleteBtn').name('DeleteContact'+rowid);
            //alert(Message)


            var popupModalDeleteRecord = document.getElementsByClassName("popup-modal-delete-record")[0]

            deleteBtn.setAttribute('name', "deletetemplate" + id)
            popupModalDeleteRecord.style.display = "block"
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
        function cancelAddRecepient() {
            popUpModaConfirmDelete.style.display = 'none'
        }
        function addTemplate() {
            popUpModalAddTemp.style.display = "block"
        }
        function editTemplate(template_id, message, title) {
            popUpModalEditTemplate.style.display = "block"
            $('#Template_Message').val(message);
            Template_Title.setAttribute('value', title)
            SaveEditedTemp.setAttribute('name', 'EditTemplate' + template_id)
        }

        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                /* Toggle between adding and removing the "active" class,
                 to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }

    </script>
    </body>
    </html>
<?php
}else{
    header('Location: ' . $_SERVER["REQUEST_URI"] . '?notFound=1');
    die();
}
?>
