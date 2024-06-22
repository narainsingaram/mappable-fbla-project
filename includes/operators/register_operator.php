<?php

// Declaring variables to prevent errors
$first_name = ""; // First name
$last_name = ""; // Last name
$email = ""; // email
$password = ""; // password
$date = ""; // Sign up Date
$error_array = array(); // Holds error messages

if (isset($_POST['register_btn'])) {
    // Registration Form Values
    $first_name = strip_tags($_POST['register_first_name']); // Remove html tags
    $first_name = str_replace(' ', '', $first_name); // Remove Spaces
    $first_name = ucfirst(strtolower($first_name)); // Uppercase first letter
    $_SESSION['register_first_name'] = $first_name; // Stores first name into session variables

    $last_name = strip_tags($_POST['register_last_name']); // Remove html tags
    $last_name = str_replace(' ', '', $last_name); // Remove Spaces
    $last_name = ucfirst(strtolower($last_name)); // Uppercase first letter
    $_SESSION['register_last_name'] = $last_name; // Stores last name into session variables

    $email = strip_tags($_POST['register_email']); // Remove html tags
    $email = str_replace(' ', '', $email); // Remove Spaces
    $email = strtolower($email); // Convert to lowercase
    $_SESSION['register_email'] = $email; // Stores email into session variables

    $date = date("Y-m-d"); // Current Date

    $password = strip_tags($_POST['register_password']);
    $_SESSION['register_password'] = $password;

    $position = strip_tags($_POST['register_position']);
    $_SESSION['register_position'] = $position;

    $date_of_birth = strip_tags($_POST['register_date_of_birth']);
    $_SESSION['register_date_of_birth'] = $date_of_birth;

    $grade = strip_tags($_POST['register_grade']);
    $_SESSION['register_grade'] = $grade;

    $gender = strip_tags($_POST['register_gender']);
    $_SESSION['register_gender'] = $gender;

    if ($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            $e_check = mysqli_query($connection, "SELECT email FROM users WHERE email='$email'");

            $num_rows = mysqli_num_rows($e_check);

            if ($num_rows > 0) {
                array_push($error_array, "Email already in use<br>");
            }
        } else {
            array_push($error_array, "Invalid Email Format<br>");
        }
    } else {
        array_push($error_array, "Emails don't match<br>");
    }

    if (strlen($first_name) > 25 || strlen($first_name) < 2) {
        array_push($error_array, "Your first name must be between 1 and 25 Characters<br>");
    }

    if (strlen($last_name) > 25 || strlen($last_name) < 2) {
        array_push($error_array, "Your last name must be between 1 and 25 Characters<br>");
    }

        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($error_array, "Your password can only contain english characters or numbers<br>");
        }

    if (empty($error_array)) {
        $password = md5($password); // Encrypt Password for database

        $username = strtolower($first_name . "_" . $last_name);
        $check_username_query = mysqli_query($connection, "SELECT username FROM users WHERE username='$username'");

        $i = 0;
        while (mysqli_num_rows($check_username_query) != 0) {
            $i++;
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($connection, "SELECT username FROM users WHERE username='$username'");
        }

        $rand = rand(1, 2);
        if ($rand == 1) {
            $profile_pic = "assets/images/profile_pics/defaults/head_deep_emerald.png";
        } else if ($rand == 2) {
            $profile_pic = "assets/images/profile_pics/defaults/head_emerald.png";
        }

        $query = mysqli_query($connection, "INSERT INTO users VALUES (NULL, '$first_name', '$last_name', '$username', '$email', '$password', '$date', '$position', '$date_of_birth', '$gender', '$grade' , '', 0, 0, 100, 1, 1, 'system_default', 'Poppins', 0, 'no')");

        if (!$query) {
            echo "Error: " . mysqli_error($connection);
        } else {
            array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");

            $_SESSION['reg_first_name'] = "";
            $_SESSION['reg_last_name'] = "";
            $_SESSION['reg_email'] = "";
            $_SESSION['reg_email2'] = "";
        }
    } else {
        print_r($error_array);
    }
}
?>