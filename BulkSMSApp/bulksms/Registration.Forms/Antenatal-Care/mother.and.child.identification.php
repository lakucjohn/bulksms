<?php
if(isset($_POST['SaveButton'])){
    header('Location: previous.pregnancies.php');
}else if (isset($_POST['CancelButton'])){
    header('Location: ../contacts.php');

}
include_once 'antenatal.care.index.php';
?>
    <form action="mother.and.child.identification.php" method="post">
        <h2> PART 1: MOTHER AND CHILD IDENTIFICATION</h2>
        <table class="main-table">
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td class="row-title">
                    A. Mother's Profile
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;<table class="middle-content">
                        <tr align="right">
                            <td valign="baseline">Mother's Name: </td>
                            <td colspan="3" align="left"><input type="text" name="mother_input" class="style-input-lg-long" /> </td>
                        </tr>
                        <tr>
                            <td valign="baseline" align="right" width="20%">Date of Birth: </td>
                            <td align="right" valign="top" width="20%"><input type="date" name="mother_name_input" class="style-input-lg-medium date-input" /> </td>
                            <td align="right">&nbsp;</td>
                            <td valign="baseline" align="right" width="20%">Education: </td>
                            <td align="left" width="20%">
                                <input type="radio" name="education_input" value="none">None<br/>
                                <input type="radio" name="education_input" value="primary">Primary<br/>
                                <input type="radio" name="education_input" value="seondary">Secondary<br/>
                                <input type="radio" name="education_input" value="postsecondary">Post Secondary<br/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">&nbsp;</td>
                        </tr>

                        <tr>
                            <td align="right" valign="top" width="20%">Occupation: </td>
                            <td align="right" width="20%"><input type="text" name="Occupation" class="style-input-lg-medium" </td>
                            <td align="right">&nbsp;</td>
                            <td align="right" valign="top" width="20%">Marital Status: </td>
                            <td align="left" width="20%">
                                <input type="radio" name="marital_status_choice" value="married" />Married <br/>
                                <input type="radio" name="marital_status_choice" value="single" />Single <br/>
                                <input type="radio" name="marital_status_choice" value="mwidow" />Widow <br/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="row-title">
                    B. Child's Profile (after birth)
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
                            <td valign="baseline" align="right" width="20%">Child's Name: </td>
                            <td align="right" width="20%"><input type="text" name="child_name_input" class="style-input-lg-medium date-input" /> </td>
                            <td align="right">&nbsp;</td>
                            <td valign="top" align="right" width="20%">Sex: </td>
                            <td align="left" width="20%">
                                <input type="radio" name="child_sex" value="m" />Male<br />
                                <input type="radio" name="child_sex" value="f" />Female
                            </td>
                        </tr>

                        <tr align="right">
                            <td width="20%">Date of Birth: </td>
                            <td width="20%"><input type="date" name="child_dob" class="style-input-lg-medium" </td>
                            <td>&nbsp;</td>
                            <td width="20%">Birth Weight(Kg): </td>
                            <td width="20%"><input type="number" name="child_weight" class="style-input-lg-medium" /> </td>
                        </tr>
                        <tr>
                            <td colspan="5">&nbsp;</td>
                        </tr>

                        <tr align="right">
                            <td width="20%">Birth Order: </td>
                            <td width="20%"><input type="text" name="child_birth_order" class="style-input-lg-medium" </td>
                            <td>&nbsp;</td>
                            <td width="20%">Birth Registration No: </td>
                            <td width="20%"><input type="number" name="child_reg_no" class="style-input-lg-medium" /> </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="row-title">
                    C. Home's Address (Where the child lives)
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
                            <td valign="baseline" width="20%">Village / LC 1: </td>
                            <td width="20%"><input type="text" name="village_input" class="style-input-lg-medium date-input" /> </td>
                            <td>&nbsp;</td>
                            <td valign="baseline" width="20%">Parish: </td>
                            <td width="20%"><input type="text" name="Parish_input" class="style-input-lg-medium" /> </td>
                        </tr>
                        <tr>
                            <td colspan="5">&nbsp;</td>
                        </tr>

                        <tr align="right">
                            <td width="20%">Sub (County): </td>
                            <td width="20%"><input type="text" name="subcounty" class="style-input-lg-medium" </td>
                            <td>&nbsp;</td>
                            <td width="20%">District: </td>
                            <td width="20%"><input type="text" name="district" class="style-input-lg-medium" /> </td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td class="row-title">
                    D. Next of kin identification
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
                            <td valign="top">Next of Kin: </td>
                            <td align="left" width="20%">
                                <input type="radio" name="next_kin" value="mother">Mother<br/>
                                <input type="radio" name="next_kin" value="father">Father<br/>
                                <input type="radio" name="next_kin" value="guardian">Guardian<br/>
                                <input type="radio" name="next_kin" value="other">Other<br/>
                            </td>
                            <td>&nbsp;</td>
                            <td valign="baseline" width="20%">Occupation: </td>
                            <td valign="top" align="right" width="20%"><input type="text" name="kin_occupation_input" class="style-input-lg-medium" /> </td>
                        </tr>
                        <tr>
                            <td colspan="5">&nbsp;</td>
                        </tr>

                        <tr align="right">
                            <td width="20%">Contact Address / Phone: </td>
                            <td width="20%"><input type="text" name="kin_contact" class="style-input-lg-medium" </td>
                            <td>&nbsp;</td>
                            <td>&nbsp; </td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr align="center">
                <td>
                    <button type="submit" name="CancelButton" class="btn space-btns medium-btn danger-btn">Cancel</button>

                    <button type="submit" name="SaveButton" style="white-space: nowrap" class="btn space-btns medium-btn primary-btn">Next &gt;&gt;</button>
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
<script src="../../static/javascript/jquery-3.3.1.min.js"></script>
<script src="../../static/javascript/js-main.js"></script>
<script>
    var dropdownArrow = document.getElementsByClassName("dropdown-arrow")[0]

    dropdownArrow.addEventListener("click", function() {
            var userInfoDropd = document.getElementsByClassName("user-info-dropd")[0]
            if (userInfoDropd.style.display !== 'block') {
                userInfoDropd.style.display = 'block'
            }else{
                userInfoDropd.style.display = 'none'
            }

        }
    )

</script>
</body>
</html>

