<?php
    if(isset($_POST['personalization_submit'])) {
        $user_theme = $_POST['theme_mode'];

        $add_new_theme = mysqli_query($con, "UPDATE users SET theme='$user_theme' WHERE username='$userLoggedIn'");

        header("Location: user_personalization.php");
    }
?>