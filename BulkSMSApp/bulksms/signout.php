<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/27/18
 * Time: 2:40 PM
 */
session_start();
session_destroy();
header('Location: index.php');
?>