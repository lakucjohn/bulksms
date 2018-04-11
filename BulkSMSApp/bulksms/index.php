<?php
require_once '../Config/bulksms.config.php';

$error_message = '';
session_start();
if(isset($_POST['signin'])){
    if(isset($_POST['username'])&&isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $Password = base64_encode($password);

        $find_user_sql = "SELECT * FROM users WHERE username='$username' AND password = '$Password'";

        if($find_user_run = mysqli_query($conn, $find_user_sql)){
            if(mysqli_num_rows($find_user_run) == 1){
                $usr_rs = mysqli_fetch_assoc($find_user_run);
                if($usr_rs['activity'] == 0){
                    $error_message = 'Inactive User Account. Please Contact an administrator';
                }else {
                    $_SESSION['user'] = $usr_rs['usertype'];
                    $_SESSION['user-data'] = $usr_rs['nname'];
                    header('Location: userdashboard.php');
                }
            }else{
                $error_message = 'incorrect username and(or) password';
            }
        }

    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .error-msg{
            color: red;
        }
    </style>
    <title>BulkSMS | Login</title>
    <link rel="stylesheet" type="text/css" href="static/css/css-main.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Nunito|Open+Sans" rel="stylesheet">
</head>
<body>
<form class="login-form slight-shadow" method="post" action="index.php">
    <h3 class="txt-centred">BulkSMS Login</h3>
    <input type="text" name="username" placeholder="Username" class="txt-field txt-field-login line-field" required>
    <input type="password" name="password" placeholder="Password"  class="txt-field txt-field-login line-field" required>
    <div class="error-msg"><?php if($error_message){ echo $error_message.'<br><br>';} ?></div>
    <input type="submit" name="signin" value="SIGN IN" class="btn btn-success btn-login">
<!--    <button class="btn-pass-forgotten">Password Forgotten ? </button>-->
</form>


</body>
</html>
