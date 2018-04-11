<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/23/18
 * Time: 2:22 PM
 */
include_once 'antenatal.care.index.php';
?>
<form action="../../Record.Data/consultation.index.php" method="post">
    <h2> PREVENTIVE SERVICES</h2>
    <table class="main-table">

        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td class="row-title">
                New T.T Record
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

