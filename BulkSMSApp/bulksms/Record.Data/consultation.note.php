<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/23/18
 * Time: 4:25 PM
 */
require_once 'consultation.index.php';
?>
<form action="consultation.index.php" method="post">
    <h2> CONSULTATION VISIT RECORD</h2>
    <table class="main-table">

        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td class="row-title">
                Health Worker's Consultation
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <table class=" middle-content">

                    <tr>
                        <td align="right" width="17%">Date: </td>
                        <td align="left" width="17%"><input type="date" name="" class="style-input-lg-short" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right" valign="top">Notes: </td>
                        <td><textarea name="" rows="16" cols="90%"></textarea> </td>
                    </tr>

                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><button type="submit" name="">Submit Records</button> </td>
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

