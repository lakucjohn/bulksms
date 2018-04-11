<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/23/18
 * Time: 2:08 PM
 */
include_once 'antenatal.care.index.php';
?>
<form action="../../Record.Data/consultation.index.php" method="post">
    <h2> RECORD A NEW EXAMINATION</h2>
    <table class="main-table">
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td class="row-title">
                 Examination
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
                        <td valign="top" align="right">Any of these present for one month: </td>
                        <td align="left" width="20%">
                            <input type="checkbox" name="" value="">Fever<br/>
                            <input type="checkbox" name="" value="">Cough<br/>
                            <input type="checkbox" name="" value="">Diarrhoea<br/>
                            <input type="checkbox" name="" value="">Weight Loss<br/>
                            <input type="checkbox" name="" value="">Headache<br/>
                        </td>
                        <td>&nbsp;</td>
                        <td align="right" width="20%">Temperature (<sup>o</sup>C): </td>
                        <td align="left" width="20%">
                            <input type="number" name="" class="style-input-lg-short" />
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td valign="baseline" align="right" width="20%">Pulse Rate (rate/minute): </td>
                        <td align="left" width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                        <td>&nbsp;</td>
                        <td align="right" width="20%">Blood Pressure (mmHg): </td>
                        <td align="left" width="20%" valign="top">
                            <input type="number" name="" class="style-input-lg-short" />
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>


                    <tr>
                        <td valign="baseline" align="right" width="40%">Haemoglobin (mg /dl): </td>
                        <td align="left" width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                        <td>&nbsp;</td>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="" />
                        </td>
                        <td valign="top" align="left" width="40%">Proteinuria: </td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td valign="baseline" align="right" width="40%">Weeks of Amenorrhea / Gestation Period: </td>
                        <td align="left" width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="20%">Fundal Height (Weeks): </td>
                        <td align="left" width="20%" valign="top">
                            <input type="number" name="" class="style-input-lg-short" />
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td valign="top">Fetal Position: </td>
                        <td align="left" width="20%">
                            <input type="radio" name="" value="cephalic">Cephalic<br/>
                            <input type="radio" name="" value="breech">Breechr<br/>
                            <input type="radio" name="" value="transverse">Transverse<br/>
                        </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="20%">Fetal Heart Beat (per minute): </td>
                        <td align="left" width="20%" valign="top">
                            <input type="number" name="" class="style-input-lg-short" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td valign="top">Choose One: </td>
                        <td align="left" width="20%">
                            <input type="checkbox" name="" value="">Respiratory<br/>
                            <input type="checkbox" name="" value="">CVS<br/>
                            <input type="checkbox" name="" value="">Abdomen<br/>
                            <input type="checkbox" name="" value="">Breasts<br/>
                            <input type="checkbox" name="" value="">LN<br/>
                            <input type="checkbox" name="" value="">Deformities<br/>
                            <input type="checkbox" name="" value="">Nails<br/>
                            <input type="checkbox" name="" value="">Palms<br/>
                            <input type="checkbox" name="" value="">Jaundice<br/>
                            <input type="checkbox" name="" value="">H .Zooster<br/>
                        </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="20%" style="white-space: nowrap">Vaginal Examination: </td>
                        <td align="left" width="20%">
                            <input type="radio" name="" value="">Bleeding<br/>
                            <input type="radio" name="" value="">Good<br/>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td valign="baseline" align="right" width="40%">If HIV+ CD4 COUNT: </td>
                        <td align="left" width="20%"><input type="number" name="" class="style-input-lg-short" /> </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="" />
                        </td>
                        <td valign="top" align="left" width="40%">Advice given on risk related to the pregnancy </td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td valign="baseline" align="right" width="20%">REFERRAL, FEEDBACK: </td>
                        <td align="left" width="40%"><input type="number" name="" class="style-input-lg-medium" /> </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="20%">Name of Health Facility, HW Initials: </td>
                        <td align="left" width="20%" valign="top">
                            <input type="text" name="" class="style-input-lg-medium" />
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td valign="baseline" align="right" width="40%">Next Appointment Date: </td>
                        <td align="left" width="20%"><input type="date" name="" class="style-input-lg-short" /> </td>
                        <td align="right">&nbsp;</td>
                        <td align="right" width="20%">&nbsp;</td>
                        <td align="left" width="20%" valign="top">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr align="center">
            <td>&nbsp;</td>
        </tr>
        <tr align="center">
            <td>
                <button type="submit" name="">Save Record</button>
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

