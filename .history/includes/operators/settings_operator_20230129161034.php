<?php

if(isset($_POST['alter_user_info'])) {
    $first_name = $_POST['change_first_name'];
    $last_name = $_POST['change_last_name'];
    $email = $_POST['change_email'];

    $verify_email_usage = mysqli_query($connection, "SELECT * FROM users where email='$email'");
    $verify_email_row = mysqli_fetch_array($verify_email_usage);
    $users_related = $verify_email_row['username'];

    if($users_related == '' || $users_related == $userLoggedIn) {
        $updating_user_info_alert = "Your changes have been updated. Check again later to view your changes!";
        $database_alteration = mysqli_query($connection, "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', school='$school' WHERE username = '$userLoggedIn'");
    }
    else {
        $updating_user_info_alert = 'Someone is already using the email you chose. Try to use a different email!';
    }
header("Location: user_settings.php");
}
else {
    $updating_user_info_alert = '';
}

?>