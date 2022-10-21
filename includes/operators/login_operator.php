<?php
    if(isset($_POST['login_btn'])) {
        $email = filter_var($_POST['email_login'], FILTER_SANITIZE_EMAIL);

        $_SESSION['email_login'] = $email;
        $password = md5($_POST['password_login']);

        $check_login_credentials_query = mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'");
        $check_login_query = mysqli_num_rows($check_login_credentials_query);

            if($check_login_query == 1) {
                $row = mysqli_fetch_array($check_login_credentials_query);
                $username = $row['username'];
            
        $_SESSION['username'] = $username;
        header("Location: web/index.php");
        exit();
            }
    else {
        array_push($error_array, "<span class='form_error'>Your email or password is incorrect</span>");
    }
    }


?>