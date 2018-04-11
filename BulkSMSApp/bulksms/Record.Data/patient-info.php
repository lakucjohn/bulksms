<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/22/18
 * Time: 12:50 PM
 */

#echo $CustomerTel.' '.$CustomerID;
session_start();
if(isset($_SESSION['user'])) {
    require_once 'Data-index.php';

    ?>
    <div class="popup-modal popup-modal-child-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="patient-info.php">

            <table>
                <tr>
                    <td class="row-title">
                        A. Child's Profile (after birth)
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="middle-content">

                            <tr>
                                <td valign="baseline" align="right" width="20%">Child's Name:</td>
                                <td align="right" width="20%"><input type="text" name="child_name_input"
                                                                     class="style-input-lg-medium date-input"/></td>
                                <td align="right">&nbsp;</td>
                                <td valign="top" align="right" width="20%">Sex:</td>
                                <td align="left" width="20%">
                                    <input type="radio" name="child_sex" value="m"/>Male<br/>
                                    <input type="radio" name="child_sex" value="f"/>Female
                                </td>
                            </tr>

                            <tr>
                                <td width="20%" align="right">Date of Birth:</td>
                                <td width="20%" align="left"><input type="date" name="child_dob"
                                                                    class="style-input-lg-short"</td>
                                <td>&nbsp;</td>
                                <td width="20%" align="right">Birth Weight(Kg):</td>
                                <td width="20%" align="left"><input type="number" name="child_weight"
                                                                    class="style-input-lg-short"/></td>
                            </tr>
                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr>
                                <td width="20%" align="right">Birth Order:</td>
                                <td width="20%" align="left"><input type="text" name="child_birth_order"
                                                                    class="style-input-lg-short"</td>
                                <td>&nbsp;</td>
                                <td width="20%" align="right">Birth Registration No:</td>
                                <td width="20%" align="left"><input type="number" name="child_reg_no"
                                                                    class="style-input-lg-short"/></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="row-title">
                        B. Home's Address (Where the child lives)
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="middle-content">
                            <tr align="right">
                                <td valign="baseline" width="20%">Village / LC 1:</td>
                                <td width="20%"><input type="text" name="village_input" class="style-input-lg-short"/>
                                </td>
                                <td>&nbsp;</td>
                                <td valign="baseline" width="20%">Parish:</td>
                                <td width="20%"><input type="text" name="Parish_input" class="style-input-lg-short"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr align="right">
                                <td width="20%">Sub (County):</td>
                                <td width="20%"><input type="text" name="subcounty" class="style-input-lg-short"</td>
                                <td>&nbsp;</td>
                                <td width="20%">District:</td>
                                <td width="20%"><input type="text" name="district" class="style-input-lg-short"/></td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="row-title">
                        C. Next of kin identification
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="middle-content">
                            <tr align="right" width="20%">
                                <td valign="top">Next of Kin:</td>
                                <td align="left" width="20%">
                                    <input type="radio" name="next_kin" value="mother">Mother<br/>
                                    <input type="radio" name="next_kin" value="father">Father<br/>
                                    <input type="radio" name="next_kin" value="guardian">Guardian<br/>
                                    <input type="radio" name="next_kin" value="other">Other<br/>
                                </td>
                                <td>&nbsp;</td>
                                <td valign="baseline" width="20%">Occupation:</td>
                                <td valign="top" align="right" width="20%"><input type="text"
                                                                                  name="kin_occupation_input"
                                                                                  class="style-input-lg-medium"/></td>
                            </tr>
                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr align="right">
                                <td width="20%">Contact Address / Phone:</td>
                                <td width="20%"><input type="text" name="kin_contact" class="style-input-lg-short"</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>


            <button type="submit" class="btn success-btn medium-btn" id="saveBtn">Save</button>
            <button class="btn btn-warn medium-btn " onclick="cancelAddRecepient()">Cancel</button>
        </form>


    </div>
    <div class="popup-modal popup-modal-pregnancy-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="patient-info.php">

            <h4>Are you sure you want to start recording new pregnancy data for this person? </h4>


            <button type="submit" class="btn success-btn medium-btn" id="savePregBtn">Start New Record</button>
            <button class="btn btn-warn medium-btn " onclick="cancelAddRecepient()">Cancel</button>
        </form>


    </div>
    <div class="popup-modal popup-modal-health-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="patient-info.php">

            <h5> CONSULTATION VISIT RECORD</h5>
            <table class="main-table">

                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="">
                        Health Worker's Consultation
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table class="">

                            <tr>
                                <td align="right" width="17%">Date:</td>
                                <td align="left" width="17%"><input type="date" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="right" valign="top">Notes:</td>
                                <td><textarea name="" rows="8" cols="60%"></textarea></td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>


            <button type="submit" class="btn success-btn medium-btn" id="saveNoteBtn">Save</button>
            <button class="btn btn-warn medium-btn " onclick="self.close()">Cancel</button>
        </form>


    </div>

    <table class="main-table">
        <tr>
            <th>
                &nbsp;Customer Details
                <section class="customer-contact-sec">
                    <input type="hidden" name="" autofocus="" placeholder="Search in table"
                           onkeyup="searchContact(this)" class="txt-field txt-field-search">

                    <div class="edit-div">
                        <button type="button" class="btn-edit increase-size-medium btn-info" id="AboutCustomer"
                                name="AboutCustomer" title="Read History of Patient"><img
                                    src="../images/icons/020_book_read_history_bookmarks_education_journal_log_logbook_3-512.png"
                                    alt="delete icon" class="edit-icon" height="160" width="160"></button>
                    </div>

                    <div class="edit-div">
                        <button type="button" class="btn-edit increase-size-medium btn-info" id="" name=""
                                title="Write a new health note" onclick="AddNewHealthNotePopup(this.name);"><img
                                    src="../images/icons/add-new-note.jpeg" alt="delete icon" class="edit-icon"
                                    height="160" width="160"></button>
                    </div>

                </section>
            </th>
        </tr>

        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td class="detail-tr-title">
                Customer Info
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;<table class="customer-details">
                    <tr>
                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Customer Name: </strong></td>
                                    <td>Name</td>
                                </tr>
                            </table>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Address: </strong></td>
                                    <td>Address</td>
                                </tr>
                            </table>
                        </td>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Contact (Phone): </strong></td>
                                    <td>Phone</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Village (LC 1): </strong></td>
                                    <td>Village</td>
                                </tr>
                            </table>
                        </td>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Parish: </strong></td>
                                    <td>Parish</td>
                                </tr>
                            </table>
                        </td>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Sub (County): </strong></td>
                                    <td>Sub (County)</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>District: </strong></td>
                                    <td>District</td>
                                </tr>
                            </table>
                        </td>

                        <td class="detail">&nbsp;</td>
                        <td class="detail">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td class="detail-tr-title">
                Bio Data
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;<table class="customer-details">
                    <tr>
                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Date of birth: </strong></td>
                                    <td>Date of birth</td>
                                </tr>
                            </table>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Age: </strong></td>
                                    <td>Age</td>
                                </tr>
                            </table>
                        </td>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Education: </strong></td>
                                    <td>Education</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Occupation: </strong></td>
                                    <td>Occupation</td>
                                </tr>
                            </table>
                        </td>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Marital Status: </strong></td>
                                    <td>Marital Status</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>


        <tr>
            <td class="detail-tr-title">
                Pregnancy Records
            </td>
        </tr>
        <tr>
        <tr>
            <td>
                <p><strong>Number of Pregnancies: </strong>0</p>
                <select id="getpregnancy" onchange="SelectCheck(this);" class="tabbed-select">
                    <option id="pregnancy0" value="0" selected="selected">Pregnancy 0</option>
                    <option id="pregnancy1" value="1">Pregnancy 1</option>
                    <option id="pregnancy2" value="2">Pregnancy 2</option>
                </select>
                <!--                <select name="" id="" class="tabbed-select">-->
                <!--                    <option value="">Select a record to preview information</option>-->
                <!--                </select>-->
                <button type="button" name="" class="space-btn-patient btn medium-btn-2 primary-btn"
                        onclick="AddNewPregnancyPopup(this.name);"
                        title="Start Recording new pregnancy data for this individual">Initiate Pregnancy
                </button>
                <p>
                <div id="divpregnancy0">Display information for pregnancy 0</div>
                <div id="divpregnancy1" style="display: none;">Display information for pregnancy 1</div>
                <div id="divpregnancy2" style="display: none;">Display information for pregnancy 2</div>
                </p>
            </td>
        </tr>

        <tr>
            <td class="detail-tr-title">
                Children Info
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>Number of Children: </strong>0</p>
                <select id="getchild" onchange="SelectChild(this);" class="tabbed-select">
                    <option id="child0" value="0" selected="selected">Child 0</option>
                    <option id="child1" value="1">Child 1</option>
                    <option id="child2" value="2">Child 2</option>
                </select>
                <button type="button" name="" class="space-btn-patient btn medium-btn-2 primary-btn"
                        onclick="AddNewChildPopup(this.name);" title="Add a newly born child belonging to this person">
                    Add New Child
                </button>
                <p>
                <div id="divchild0">Display information for Child 0</div>
                <div id="divchild1" style="display: none;">Display information for Child 1</div>
                <div id="divchild2" style="display: none;">Display information for Child 2</div>
                </p>
            </td>
        </tr>
    </table>

    </div>

    </main>
    <footer class="grid-item grid-item-footer">
        <span>BulkySMS@copyright 2018</span>
    </footer>
    </div>
    <script src="../../bulksms/static/javascript/jquery-3.3.1.min.js"></script>
    <script src="../static/javascript/js-main.js"></script>
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

        //Function for confirming deletion
        function AddNewChildPopup(rowid) {

            var popupModalDeleteRecord = document.getElementsByClassName("popup-modal-child-record")[0]

            saveBtn.setAttribute('name', "SaveChild" + rowid)
            popupModalDeleteRecord.style.display = "block"
        }

        //Function for confirming deletion
        function AddNewPregnancyPopup(rowid) {

            var popupModalDeleteRecord = document.getElementsByClassName("popup-modal-pregnancy-record")[0]

            savePregBtn.setAttribute('name', "SavePregnancy" + rowid)
            popupModalDeleteRecord.style.display = "block"
        }

        //Function for confirming deletion
        function AddNewHealthNotePopup(rowid) {

            var popupModalDeleteRecord = document.getElementsByClassName("popup-modal-health-record")[0]

            saveNoteBtn.setAttribute('name', "SaveHealthNote" + rowid)
            popupModalDeleteRecord.style.display = "block"
        }

        function SelectCheck(nameSelect) {
            if (nameSelect) {
                OptionValue = document.getElementById("getpregnancy").value;
                //alert(admOptionValue);
                if (OptionValue == 0) {
                    document.getElementById("divpregnancy0").style.display = "block";
                    document.getElementById("divpregnancy1").style.display = "none";
                    document.getElementById("divpregnancy2").style.display = "none";

                } else if (OptionValue == 1) {
                    document.getElementById("divpregnancy1").style.display = "block";
                    document.getElementById("divpregnancy0").style.display = "none";
                    document.getElementById("divpregnancy2").style.display = "none";

                } else if (OptionValue == 2) {
                    document.getElementById("divpregnancy2").style.display = "block";
                    document.getElementById("divpregnancy0").style.display = "none";
                    document.getElementById("divpregnancy1").style.display = "none";
                }
                else {
                    document.getElementById("DivCheck").style.display = "none";
                }
            }
            else {
                document.getElementById("DivCheck").style.display = "none";
            }
        }

        function SelectChild(nameSelect) {
            if (nameSelect) {
                OptionValue = document.getElementById("getchild").value;
                //alert(admOptionValue);
                if (OptionValue == 0) {
                    document.getElementById("divchild0").style.display = "block";
                    document.getElementById("divchild1").style.display = "none";
                    document.getElementById("divchild2").style.display = "none";

                } else if (OptionValue == 1) {
                    document.getElementById("divchild1").style.display = "block";
                    document.getElementById("divchild0").style.display = "none";
                    document.getElementById("divchild2").style.display = "none";

                } else if (OptionValue == 2) {
                    document.getElementById("divchild2").style.display = "block";
                    document.getElementById("divchild0").style.display = "none";
                    document.getElementById("divchild1").style.display = "none";
                }
                else {
                    document.getElementById("DivCheck").style.display = "none";
                }
            }
            else {
                document.getElementById("DivCheck").style.display = "none";
            }
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