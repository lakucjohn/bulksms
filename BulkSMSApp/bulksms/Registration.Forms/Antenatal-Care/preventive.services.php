<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/23/18
 * Time: 11:38 AM
 */
if(isset($_POST['SaveButton'])){
    header('Location: ../Record.Data/patient-info.php');
}else if (isset($_POST['PreviousButton'])){
    header('Location: current.pregnancy.php');

}
include_once 'antenatal.care.index.php';
?>
<form action="preventive.services.php" method="post">
    <h2> PREVENTIVE SERVICES</h2>
    <table class="main-table">

        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td class="row-title">
                PREVENTIVE SERVICES
            </td>
        </tr>
        <tr>
            <td>
                <table class=" middle-content">

                    <tr>
                        <td align="right" width="17%">Vaccine: </td>
                        <td align="left" width="17%"><input type="text" name="" class="style-input-lg-short" value="T.T.1" /></td>
                        <td>&nbsp;</td>
                        <td align="right" width="17%">Date: </td>
                        <td align="left" width="17%"><input type="date" name="" class="style-input-lg-short" /> </td>
                        <td>&nbsp;</td>
                        <td align="right" width="15%">Next Visit: </td>
                        <td align="left" width="15%"><input type="date" name="" class="style-input-lg-short" /></td>
                    </tr>
                    <tr>
                        <td colspan="8">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right" valign="top"><strong>Tetanus Toxid Instructions: </strong></td>
                        <td colspan="6"><em>Ask about the number of T.T injections received in a mother's life to date. If none given, then <br> for <strong>T.T.1;</strong> administer at first contact or as early as possible during pregnancy</em></td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td class="row-title">
                Prevention of Malaria and Anaemia
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <table class=" ">

                    <tr>
                        <td align="right" width="17%">Intervention: </td>
                        <td align="left" width="17%"><input type="text" name="" class="style-input-lg-short" value="Intermitted Presumptive Treatment: IPT1" /></td>
                        <td>&nbsp;</td>
                        <td align="right" width="17%">Date: </td>
                        <td align="left" width="17%"><input type="date" name="" class="style-input-lg-short" /> </td>
                        <td>&nbsp;</td>
                        <td align="right" width="15%">Next Visit: </td>
                        <td align="left" width="15%"><input type="date" name="" class="style-input-lg-short" /></td>
                    </tr>
                    <tr>
                        <td colspan="6"><input type="text" class="style-input-lg-long" value="Iron Sulphate Supplementation" disabled/> </td>
                        <td colspan="2">Date: <input type="date" class="style-input-lg-short" name="" /> </td>
                    </tr>
                    <tr>
                        <td colspan="8">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right" valign="top">
                            <input type="checkbox" name="" value="" />Insecticide Treated Mosquito Net
                        </td>
                        <td colspan="6">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td class="row-title">
                C. PMTC Date
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <table class="">

                    <tr>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="" />
                        </td>
                        <td valign="top" align="left" width="20%" style="white-space: nowrap;">Infant Feeding Counseling done </td>
                        <td>&nbsp;</td>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="" />
                        </td>
                        <td valign="top" align="left" width="40%" style="white-space: nowrap;">Mother on ARV Prophylaxis </td>
                        <td>&nbsp;</td>
                        <td valign="top" align="right">Mother's Decision*: </td>
                        <td align="left" width="20%" style="white-space: nowrap;">
                            <input type="checkbox" name="" value="">Exclusive B/feeding<br/>
                            <input type="checkbox" name="" value="">Replacement feeding<br/>
                            <input type="checkbox" name="" value="">Not decided<br/>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="8">&nbsp;</td>
                    </tr>


                    <tr>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="" />
                        </td>
                        <td valign="top" align="left" width="40%" style="white-space: nowrap;">Mother on HAART (ARV) </td>
                        <td>&nbsp;</td>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="" />
                        </td>
                        <td valign="top" align="left" width="40%" style="white-space: nowrap;">Mother on ARV Prophylaxis </td>
                        <td>&nbsp;</td>
                        <td valign="top" align="right" style="white-space: nowrap;">AZT + AdNVP: </td>
                        <td align="left" width="20%">
                            <input type="radio" name="" value="">Yes<br/>
                            <input type="radio" name="" value="">No<br/>
                            <input type="radio" name="" value="">NA<br/>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="8">&nbsp;</td>
                    </tr>

                    <tr>
                        <td valign="top" align="right" style="white-space: nowrap;">SdNVP alone: </td>
                        <td align="left" width="20%">
                            <input type="radio" name="" value="">Yes<br/>
                            <input type="radio" name="" value="">No<br/>
                            <input type="radio" name="" value="">NA<br/>
                        </td>
                        <td>&nbsp;</td>
                        <td valign="top" align="right" style="white-space: nowrap;">AZT + TC + NVP: </td>
                        <td align="left" width="20%">
                            <input type="radio" name="" value="">Yes<br/>
                            <input type="radio" name="" value="">No<br/>
                            <input type="radio" name="" value="">NA<br/>
                        </td>
                        <td align="right">Others: </td>
                        <td align="left" width="20%">
                            <input type="text" name="" class="style-input-lg-short" />
                        </td>
                    </tr>

                    <tr>
                        <td colspan="8">&nbsp;</td>
                    </tr>

                    <tr>

                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="" />
                        </td>
                        <td valign="top" align="left" width="40%" style="white-space: nowrap;">Referred to Psychological group </td>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
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

