<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/22/18
 * Time: 12:27 PM
 */
session_start();
if(isset($_SESSION['user'])) {
    include "consultation.index.php";
    ?>

    <div class="popup-modal popup-modal-health-record" id="popUpModal">

        <form class="confirm-delete-form slight-shadow" method="post" action="consultation.php">

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
            <button class="btn btn-warn medium-btn " onclick="cancelAddRecepient()">Cancel</button>
        </form>


    </div>
    <h2> REPORT OF CONSULTATION</h2>
    <section class="customer-contact-sec">
        <input type="hidden" name="" autofocus="" placeholder="Search in table" onkeyup="searchContact(this)"
               class="txt-field txt-field-search">

        <div class="edit-div">
            <button type="button" class="btn-edit increase-size-medium btn-info" id="" name="" title="Write a new note"
                    onclick="AddNewHealthNotePopup(this.name);"><img src="../images/icons/add-new-note.jpeg"
                                                                     alt="delete icon" class="edit-icon" height="160"
                                                                     width="160"></button>
        </div>
    </section>

    <table class="main-table">
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td class="row-title">
                A. Customer Information
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
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
                                    <td class="inner-data"><strong>Age: </strong></td>
                                    <td>Age</td>
                                </tr>
                            </table>
                        </td>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Address: </strong></td>
                                    <td>Address</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>

                        <td class="detail">
                            <table>
                                <tr>
                                    <td class="inner-data"><strong>Sex: </strong></td>
                                    <td>Sex</td>
                                </tr>
                            </table>
                        </td>

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
                </table>
            </td>
        </tr>
        <tr>
            <td class="row-title">
                B. Reports
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="10%" valign="top">Date</td>
                        <td width="80%">Distributed computing is a field of computer science that studies distributed
                            systems. A distributed system is a model in which components located on networked computers
                            communicate and coordinate their actions by passing messages.[1] The components interact
                            with each other in order to achieve a common goal. Three significant characteristics of
                            distributed systems are: concurrency of components, lack of a global clock, and independent
                            failure of components.[1] Examples of distributed systems vary from SOA-based systems to
                            massively multiplayer online games to peer-to-peer applications.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="10%" valign="top">Date</td>
                        <td width="80%">Distributed computing is a field of computer science that studies distributed
                            systems. A distributed system is a model in which components located on networked computers
                            communicate and coordinate their actions by passing messages.[1] The components interact
                            with each other in order to achieve a common goal. Three significant characteristics of
                            distributed systems are: concurrency of components, lack of a global clock, and independent
                            failure of components.[1] Examples of distributed systems vary from SOA-based systems to
                            massively multiplayer online games to peer-to-peer applications.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </form>

    </div>

    </main>
    <footer class="grid-item grid-item-footer">
        <span>BulkySMS@copyright 2018</span>
    </footer>
    </div>
    <script src="../static/javascript/jquery-3.3.1.min.js"></script>
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
        function AddNewHealthNotePopup(rowid) {

            var popupModalDeleteRecord = document.getElementsByClassName("popup-modal-health-record")[0]

            saveNoteBtn.setAttribute('name', "SaveHealthNote" + rowid)
            popupModalDeleteRecord.style.display = "block"
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


