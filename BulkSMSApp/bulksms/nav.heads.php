<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/27/18
 * Time: 6:09 PM
 */
?>
<div class="wrapper">

    <header class="grid-item grid-item-header">
        <h2 class="logo"><a href="userdashboard.php">EAST AFRICA MEDICAL CENTRE</a></h2>
        <div class="user-name-div"><?php echo $_SESSION['user-data']; ?> &nbsp; &nbsp; <span class="dropdown-arrow"> &#9660;</span>
            <div class="user-info-dropd">

                <a href="changepw.php">Manage Password</a>
                <a href="signout.php">SignOut</a>
            </div>
        </div>
    </header>
    <nav class="grid-item grid-item-nav">
        <ul class="nav-ul">
            <?php
            if($_SESSION['user'] == 'a'){

                ?>
                <li class="nav-tab">
                    <a href="user.accounts.php">User Accounts</a>
                </li>
                <?php
            }
            ?>
            <li class="nav-tab">
                <a href="userdashboard.php">SMS Dashboard</a>
            </li>
            <li class="nav-tab">
                <a href="sendsms.php">Compose Message</a>
            </li>
            <li class="nav-tab">
                <a href="contacts.php">Patients</a>
            </li>
            <li class="nav-tab">
                <a href="groups.php">Groups</a>
            </li>
            <li class="nav-tab">
                <a href="templates.php">SMS Templates</a>
            </li>
        </ul>
    </nav>
