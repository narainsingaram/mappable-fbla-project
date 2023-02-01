<?php 

$variables = array("first_name", "last_name", "email", "password", "confirmation_password", "date", "position", "date_of_birth", "gender", "school", "grade", "profile_picture");

foreach ($variables as $variable) {
    ${$variable} = "";
    $_SESSION['register_'.$variable] = "";
}

$error_array = array();

/* When Register Button is clicked/set */
if(isset($_POST['register_btn'])) {
    $first_name = strip_tags($_POST['register_first_name']);
    $first_name = str_replace(' ', '', $first_name);
    $first_name = ucfirst(strtolower($first_name));
    $_SESSION['register_first_name'] = $first_name;

    $last_name = strip_tags($_POST['register_last_name']);
    $last_name = str_replace(' ', '', $last_name);
    $last_name = ucfirst(strtolower($last_name));
    $_SESSION['register_last_name'] = $last_name;

    $email = strip_tags($_POST['register_email']);
    $email = str_replace(' ', '', $email);
    $_SESSION['register_email'] = $email;

    $password = strip_tags($_POST['register_password']);
    $connectionfirmation_password = strip_tags($_POST['register_confirmation_password']);

    $date = date("Y-m-d");

    // $position = strip_tags($_POST['register_position']);
    // $_SESSION['register_position'] = $position;

    $position = strip_tags($_POST['register_position']);
    $_SESSION['register_position'] = $position;

    $date_of_birth = strip_tags($_POST['register_date_of_birth']);
    $_SESSION['register_date_of_birth'] = $date_of_birth;

    $school = strip_tags($_POST['register_school']);
    $_SESSION['register_school'] = $school;

    $grade = strip_tags($_POST['register_grade']);
    $_SESSION['register_grade'] = $grade;

    $gender = strip_tags($_POST['register_gender']);
    $_SESSION['register_gender'] = $gender;

    $position = $_POST['register_position'];
    $_SESSION['register_position'] = $position;
    
    //Seeing if user input follows register rules (ex. password and emails are matching, first name is longer than 2 letters)
    if($email == $email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        $email_inquiry = mysqli_query($connection, "SELECT email FROM users WHERE email='$email'");
        $num_rows_from_email_inquiry = mysqli_num_rows($email_inquiry);

        if($num_rows_from_email_inquiry > 0) {
            array_push($error_array, "<span class='form_error'>Email already in use</span>");
        }
    }
        else {
            array_push($error_array, "<span class='form_error'>Invalid email format</span>");
        }
    }
    else {
        array_push($error_array, "<span class='form_error'>Emails don't match</span>");
    }

    if (strlen($first_name) > 30 || strlen($first_name) < 2 || strlen($last_name) > 30 || strlen($last_name) < 2) {
        array_push($error_array, "<span class='form_error'>There must be between 2 and 30 characters in your first and last name</span>");
    }


    else if($connectionfirmation_password != $password) {
        array_push($error_array, "<span class='form_error'>Your passwords do not match</span>");
    }

    else if(strlen($password) < 8) {
        array_push($error_array, "<span class='form_error'>Your password needs to include more than 8 characters</span>");
    }

    else if(strlen($password) > 255) {
        array_push($error_array, "<span class='form_error'>Your password must be less than 255 characters long.</span>");
    }

    //if $error_array does not have a value
    if(empty($error_array)) {
        $password = md5($password);

        $username = strtolower($first_name . "_" . $last_name);
		$check_username_query = mysqli_query($connection, "SELECT username FROM users WHERE username='$username'");


		$i = 0; 
		//if username exists add number to username
		while(mysqli_num_rows($check_username_query) != 0) {
			$i++; //Add 1 to i
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($connection, "SELECT username FROM users WHERE username='$username'");
		}
        $query = mysqli_query($connection, "INSERT INTO users VALUES (NULL, '$first_name', '$last_name', '$username', '$email', '$password', '$date', '$position', '$date_of_birth', '$gender', '$school', '$grade' , '', 0, 0, 100, 1, 1, 'system_default', 'Poppins', 'no')");
        
        array_push($error_array, "You are set to login!");

        //Clear session variables
        $_SESSION['register_first_name'] = " ";
        $_SESSION['register_last_name'] = " ";
        $_SESSION['register_email'] = " ";
        //Does me changing this comment push towards GitHub?
    }
}

?>
