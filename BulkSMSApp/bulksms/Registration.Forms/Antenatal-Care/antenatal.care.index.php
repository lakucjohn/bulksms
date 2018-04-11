<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/22/18
 * Time: 11:14 AM
 */

require_once '../../../Config/bulksms.config.php';

?>
<html>
<head>
    <title>BulkSMS | Antenatal Care</title>
    <link rel="stylesheet" type="text/css" href="../../static/css/css-main.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Nunito|Open+Sans" rel="stylesheet">

    <style>
        td{
            white-space: inherit;
        }
        .style-input-lg-long{
            width: 400px;
            height: 35px;
            border-radius: 0.4rem;
            border-color: #2c3e50;
            margin-left: 2%;
        }
        .style-input-lg-short{
            width: 180px;
            height: 35px;
            border-radius: 0.4rem;
            border-color: #2c3e50;
            margin-left: 2%;
        }
        .main-table{
            width: 85%;
        }
        .row-title{
            height: 40px;
            background-color: #5d6d7e;
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
            border-radius: 0.4rem;
        }
        .middle-content{
            margin-left: 4%;
        }
        .style-select{
            width: 300px;
            height: 35px;
            border-radius: 0.4rem;
        }
        .style-input-lg-medium{
            width: 300px;
            height: 35px;
            border-radius: 0.4rem;
            border-color: #2c3e50;
            margin-left: 2%;
        }
        .push-button{
            margin-left: 20%;
            margin-top: 5%;
        }
        .space-btns{
            margin-top: 10%;
            margin-right: 10%;
            margin-left: 20%;
        }
        .danger-btn{
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
            border-radius: 0.4rem;

        }
        .medium-btn{
            width: 150px;
            height: 40px;
        }
        .primary-btn{

            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.4rem;
        }
        .success-btn{
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 0.4rem;
        }
        .btn{
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .warning-btn{
            color: #212529;
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .page-title-2{
            height: 60px;
            width: 100%;
            background-color: #0c5460;
            text-align: center;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #4CAF50;
        }

    </style>

</head>
<body>

<div class="wrapper">
    <header class="grid-item grid-item-header">
        <h2 class="logo"><a href="../../userdashboard.php">BULKYSMS SBTECH</a></h2>
        <div class="user-name-div">SMS Admin &nbsp; &nbsp;  <span class="dropdown-arrow"> &#9660;</span>
            <div class="user-info-dropd">

                <<a href="../../changepw.php">Manage Password</a>
                <a href="../../signout.php">SignOut</a>
            </div>
        </div>
    </header>
    <nav class="grid-item grid-item-nav">
        <ul class="nav-ul">
            <?php
            if($_SESSION['user'] == 'a'){

                ?>
                <li class="nav-tab">
                    <a href="../../user.accounts.php">User Accounts</a>
                </li>
                <?php
            }
            ?>
            <li class="nav-tab">
                <a href="../../userdashboard.php">DashBoard</a>
            </li>
            <li class="nav-tab">
                <a href="../../sendsms.php">Compose Message</a>
            </li>
            <li class="nav-tab">
                <a href="../../contacts.php">Customers</a>
            </li>
            <li class="nav-tab">
                <a href="../../groups.php">Groups</a>
            </li>
            <li class="nav-tab">
                <a href="../../templates.php">SMS Templates</a>
            </li>
        </ul>
    </nav>
    <main class="grid-item grid-item-main main-minheight">
        <h4 class="page-title">Antenatal Care Service Registration Form</h4>

        <div class="temp-div">
