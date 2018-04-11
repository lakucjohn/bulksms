<?php
session_start();
require_once '../Config/bulksms.config.php';

$error_message_1 = '';
$error_message_2 = '';
$old_pass = '';
$old_user = '';
$new_user = '';
if(isset($_POST['changeuserdata'])){
    if(isset($_POST['old_username'])&&isset($_POST['old_password'])){
        $old_username = $_POST['old_username'];
        $old_password = $_POST['old_password'];

        if(!empty($old_username)&&!empty($old_password)) {
            $encryptedoldpassword = base64_encode($old_password);

            $find_user_sql = "SELECT username, password FROM users WHERE username='$old_username' AND password = '$encryptedoldpassword'";

            if ($find_user_run = mysqli_query($conn, $find_user_sql)) {
                if (mysqli_num_rows($find_user_run) == 1) {
                    $old_user = $old_username;
                    $old_pass = $old_password;
                    if (isset($_POST['new_username']) && isset($_POST['new_password_1']) && isset($_POST['new_password_2'])) {
                        $new_username = $_POST['new_username'];
                        $new_password_1 = $_POST['new_password_1'];
                        $new_password_2 = $_POST['new_password_2'];

                        if (!empty($new_username) && !empty($new_password_1) && !empty($new_password_2)) {
                            if($new_password_1 == $new_password_2) {
                                $encryptednewpassword = base64_encode($new_password_1);
                                $update_user_sql = "UPDATE users SET username='$new_username',password='$encryptednewpassword'";
                                if(mysqli_query($conn,$update_user_sql)){
                                    header('Location: userdashboard.php');
                                }
                            }else{
                                $error_message_2 = 'Your passwords do not match';
                                $new_user = $new_username;
                            }
                        } else {
                            $error_message_2 = 'All user credentials required';
                        }
                    }
                } else {
                    $error_message_1 = 'incorrect username and(or) password';
                }
            }
        }else{
            $error_message_1 = 'Invalid username or(and) password';
        }

    }

}
if(isset($_SESSION['user'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            .error-msg {
                color: red;
            }
        </style>
        <title>BulkSMS | Manage Login</title>
        <link rel="stylesheet" type="text/css" href="static/css/css-main.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Nunito|Open+Sans" rel="stylesheet">
    </head>
    <body>

    <form class="login-form slight-shadow" method="post" action="changepw.php">
        <h3 class="txt-centred">Current User Credentials</h3>
        <input type="text" name="old_username" placeholder="Current Username"
               class="txt-field txt-field-login line-field" value="<?php if ($old_user) {
            echo $old_user;
        } ?>" required>
        <input type="password" name="old_password" placeholder=" Current Password"
               class="txt-field txt-field-login line-field" value="<?php if ($old_pass) {
            echo $old_pass;
        } ?>" required>
        <div class="error-msg"><?php if ($error_message_1) {
                echo $error_message_1 . '<br><br>';
            } ?></div>
        <!--    <button class="btn-pass-forgotten">Password Forgotten ? </button>-->
        <br><br>
        <h3 class="txt-centred">New User Credentials</h3>
        <input type="text" name="new_username" placeholder="New Username" class="txt-field txt-field-login line-field"
               value="<?php if ($new_user) {
                   echo $new_user;
               } ?>" required>
        <input type="password" name="new_password_1" placeholder=" New Password"
               class="txt-field txt-field-login line-field" required>
        <input type="password" name="new_password_2" placeholder=" Confirm New Password"
               class="txt-field txt-field-login line-field" required>
        <div class="error-msg"><?php if ($error_message_2) {
                echo $error_message_2 . '<br><br>';
            } ?></div>
        <input type="submit" name="changeuserdata" value="SAVE CHANGES" class="btn btn-success btn-login">
        <!--    <button class="btn-pass-forgotten">Password Forgotten ? </button>-->
    </form>


    </body>
    </html>

<?php
}else{
    header('Location: ' . $_SERVER["REQUEST_URI"] . '?notFound=1');
    die();
}
?>