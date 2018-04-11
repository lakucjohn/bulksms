<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/23/18
 * Time: 3:22 PM
 */
include_once 'antenatal.care.index.php';
?>
<form action="../../Record.Data/consultation.index.php" method="post">
    <h2> REFERRAL NOTE</h2>
    <table class="main-table">

        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td class="row-title">
                Make a new Note
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <table class="">

                    <tr>
                        <td align="right" width="17%" style="white-space: nowrap;">Date of Referral: </td>
                        <td align="left" width="17%"><input type=date name="" class="style-input-lg-short" /></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>

                        <td align="right" width="17%" style="white-space: nowrap;">Diagnosis / Reason for Referral: </td>
                        <td align="left" width="17%" colspan="4"><input type="text" name="" class="style-input-lg-long" /> </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="" />
                        </td>
                        <td valign="top" align="left" width="40%" style="white-space: nowrap;">Pre-referral treatment given </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="right">Specify: </td>
                        <td colspan="4" align="left">
                            <input type="text" name="" class="style-input-lg-long" />
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>

                        <td align="right" width="17%" style="white-space: nowrap;">Date of Referral: </td>
                        <td align="left" width="17%"><input type="datetime" name="" class="style-input-lg-short" /></td>
                        <td>&nbsp;</td>
                        <td align="right" width="17%" style="white-space: nowrap;">Health Facility: </td>
                        <td align="left" width="34%" colspan="4"><input type="text" name="" class="style-input-lg-long" /> </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>

                        <td align="right" width="17%" style="white-space: nowrap;">H /W Name and Designation: </td>
                        <td align="left" width="17%"><input type="datetime" name="" class="style-input-lg-medium" /></td>
                        <td>&nbsp;</td>
                        <td align="right" width="17%" style="white-space: nowrap;">Confirmed Diagnosis: </td>
                        <td align="left" width="34%" colspan="4"><input type="text" name="" class="style-input-lg-medium" /> </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>


                    <tr>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="" />
                        </td>
                        <td valign="top" align="left" width="40%" style="white-space: nowrap;">Treatment Given </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="right">Specify: </td>
                        <td colspan="4" align="left">
                            <input type="text" name="" class="style-input-lg-long" />
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>


                    <tr>
                        <td align="right" width="20%" valign="top">
                            <input type="checkbox" name="" value="" />
                        </td>
                        <td valign="top" align="left" width="40%" style="white-space: nowrap;">Patient Follow Up </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="right">Specify: </td>
                        <td colspan="4" align="left">
                            <input type="text" name="" class="style-input-lg-long" />
                        </td>
                    </tr>


                </table>
            </td>
        </tr>
        <tr>
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

