<?php
if(isset($_POST['SaveButton'])){
    header('Location: current.pregnancy.php');
}else if (isset($_POST['PreviousButton'])){
    header('Location: mother.and.child.identification.php');

}
include_once 'antenatal.care.index.php';
?>
<form action="previous.pregnancies.php" method="post">
    <h2> PART 2: RECORD OF PREVIOUS PREGNANCIES</h2>
    <table class="main-table">
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td class="row-title">
                A. Past Medical and Social History
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
                        <td valign="baseline" align="left" width="20%">
                            <input type="checkbox" name="medicalproblems" value="" />ProblemSet 1<br />
                            <input type="checkbox" name="medicalproblems" value="" />ProblemSet 2<br />
                            <input type="checkbox" name="medicalproblems" value="" />ProblemSet 3<br />
                            <input type="checkbox" name="medicalproblems" value="" />ProblemSet 4<br />
                            <input type="checkbox" name="medicalproblems" value="" />ProblemSet 5<br />
                        </td>
                        <td>&nbsp;</td>
                        <td align="left" width="20%">
                            <input type="checkbox" name="medicalproblems" value="" />ProblemSet 6<br />
                            <input type="checkbox" name="medicalproblems" value="" />ProblemSet 7<br />
                            <input type="checkbox" name="medicalproblems" value="" />ProblemSet 8<br />
                            <input type="checkbox" name="medicalproblems" value="" />ProblemSet 9<br />
                            <input type="checkbox" name="medicalproblems" value="" />ProblemSet 10<br />
                        </td>

                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td class="row-title">
                B. Past Surgical Hsitory (indicate type and Date surgery performed)
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
                        <td valign="baseline" align="right" width="40%">Operations (Type): </td>
                        <td align="right" width="20%"><input type="text" name="" class="style-input-lg-long date-input" /> </td>
                        <td align="right">&nbsp;</td>
                        <td valign="top" align="right" width="20%">Year: </td>
                        <td align="left" width="20%"><input type="number" name="" class="style-input-lg-short" /></td>
                    </tr>

                    <tr align="right">
                        <td width="40%">Blood Transfusions (Why?): </td>
                        <td width="20%"><input type="text" name="" class="style-input-lg-long" </td>
                        <td>&nbsp;</td>
                        <td width="20%">Year: </td>
                        <td width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                    </tr>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr align="right">
                        <td width="40%">Fracture of Pelvis, Spine and Femur: </td>
                        <td width="20%"><input type="text" name="" class="style-input-lg-long" </td>
                        <td>&nbsp;</td>
                        <td width="20%">Year: </td>
                        <td width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="row-title">
                C. Past Obstetric and Gynaecological History
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
                        <td valign="baseline" align="right" width="40%">Number of Pregnancies: </td>
                        <td align="right" width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="1" />
                        </td>
                        <td valign="top" align="left" width="20%">Vacuum Extraction, Forceps: </td>
                    </tr>

                    <tr>
                        <td valign="baseline" align="right" width="40%">Number of Deliveries: </td>
                        <td align="right" width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="1" />
                        </td>
                        <td valign="top" align="left" width="20%">Retained Placenta: </td>
                    </tr>

                    <tr>
                        <td valign="baseline" align="right" width="40%">Number of Living Children: </td>
                        <td align="right" width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="1" />
                        </td>
                        <td valign="top" align="left" width="20%">PPH: </td>
                    </tr>

                    <tr>
                        <td valign="baseline" align="right" width="40%">Number of Miscarriages: </td>
                        <td align="right" width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="1" />
                        </td>
                        <td valign="top" align="left" width="40%">Operations on the uterus: </td>
                    </tr>
                    <tr>
                        <td valign="baseline" align="right" width="40%">Number of still births: </td>
                        <td align="right" width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="1" />
                        </td>
                        <td valign="top" align="left" width="40%">Cervical Shrodkar, Mc Donald: </td>
                    </tr>
                    <tr>
                        <td valign="baseline" align="right" width="20%">Number of Premature Births: </td>
                        <td align="right" width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                        <td align="right">&nbsp;</td>
                        <td valign="top" align="right" width="40%">Interval from last pregnancy (years): </td>
                        <td align="left" width="20%">
                            <input type="number" name="" value="" class="style-input-lg-short" />
                        </td>
                    </tr>
                    <tr>
                        <td valign="baseline" align="right" width="20%">Number of Caesarian Sections: </td>
                        <td align="right" width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="40%">Who assisted previous delivery: </td>
                        <td align="left" width="20%">
                            <input type="number" name="" value="" class="style-input-lg-short" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr align="center">
            <td>
                <button type="submit" name="PreviousButton" class="btn space-btns medium-btn warning-btn">&lt;&lt;Previous</button>

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

