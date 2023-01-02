<?php 

$date = date("Y-m-d");

$variables = array("first_name", "last_name", "email", "password", "confirmation_password", "date", "position", "date_of_birth", "gender", "school", "grade", "profile_picture");

foreach ($variables as $variable) {
    ${$variable} = "";
    $_SESSION['register_'.$variable] = "";
}

$error_array = array();

// Check if the request method is a POST request
// (i.e. the form has been submitted)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // code to handle form submission
$fields = array("first_name", "last_name", "email", "password", "confirmation_password", "date", "position", "date_of_birth", "gender", "school", "grade");

foreach ($fields as $field) {
    $value = strip_tags($_POST['register_'.$field]);
    $value = str_replace(' ', '', $value);
    $value = ucfirst(strtolower($value));
    $_SESSION['register_'.$field] = $value;
}
    
    //Seeing if user input follows register rules (ex. password and emails are matching, first name is longer than 2 letters)
    if($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        $email_inquiry = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
        $num_rows_from_email_inquiry = mysqli_num_rows($email_inquiry);

        if($num_rows_from_email_inquiry > 0) {
            array_push($error_array, "Email already in use");
        }
    }
        else {
            array_push($error_array, "Invalid email format");
        }
    }
    else {
        array_push($error_array, "Emails don't match");
    }

    if (strlen($first_name) > 30 || strlen($first_name) < 2 || strlen($last_name) > 30 || strlen($last_name) < 2) {
        array_push($error_array, "There must be between 2-30 characters in your first & last name");
    }

    else if($confirmation_password != $password) {
        array_push($error_array, "Your passwords do not match");
    }

    else if(strlen($password) < 8 || strlen($password) > 255) {
        array_push($error_array, "Your password must be between 8-255 characters");
    }

    //if $error_array does not have a value
    if(empty($error_array)) {
        $password = md5($password);

        $username = strtolower($first_name . "_" . $last_name);
		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");


		$i = 0; 
		//if username exists add number to username
		while(mysqli_num_rows($check_username_query) != 0) {
			$i++; //Add 1 to i
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
		}
        $query = mysqli_query($con, "INSERT INTO users VALUES (NULL, '$first_name', '$last_name', '$username', '$email', '$password', '$date', '$position', '$date_of_birth', '$gender', '$school', '$grade' , '', 0, 0, 100, 1, 1, 'system_default', 'Poppins', 'no')");
        
        array_push($error_array, "You are set to login!");

        //Clear session variables
        $_SESSION['register_first_name'] = " ";
        $_SESSION['register_last_name'] = " ";
        $_SESSION['register_email'] = " ";
        //Does me changing this comment push towards GitHub?
    }
}

?>
