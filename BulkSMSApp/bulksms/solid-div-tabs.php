<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/28/18
 * Time: 10:40 AM
 */
?>
<main class="grid-item-main">
    <h3 class="page-title">SMS Dashboard</h3><br>

    <a href="sentsms.php">
        <div class="stats-div  stats-div4 " style="display:inline-block">
            <span><?php echo $sent_messages; ?></span><br>
            <span>SMS Sent</span>
        </div>
    </a>
    <!--<a href="contacts.php"><div class="stats-div stats-div2" style="display:inline-block" >
            <span><?php echo $contacts; ?></span><br>
            <span>Contact Numbers</span>
            </div></a>-->
    <a href="scheduledsms.php">
        <div class="stats-div stats-div3" style="display:inline-block">
            <span><?php echo $scheduled_messages; ?></span><br>
            <span>Scheduled SMS</span>
        </div>
    </a>

    <?php
    if ($error_logs != 0) {
        ?>
        <a href="logs.php">
            <div class="stats-div stats-div1" style="display:inline-block">
                <span><?php echo $error_logs; ?></span><br>
                <span>Error Logs</span>
            </div>
        </a>

        <?php
    }
    ?>
