<?php 
// Import the necessary libraries and classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/Exception.php';
require 'vendor/PHPMailer.php';
require 'vendor/SMTP.php';

$variables = array("first_name", "last_name", "email", "password", "confirmation_password", "date", "position", "date_of_birth", "gender", "grade", "profile_picture");

foreach ($variables as $variable) {
    ${$variable} = "";
    $_SESSION['register_'.$variable] = "";
}

$error_array = array();

// Check if the request method is a POST request
// (i.e. the form has been submitted)
if (isset($_POST['register_btn'])) {
    // code to handle form submission
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

    $grade = strip_tags($_POST['register_grade']);
    $_SESSION['register_grade'] = $grade;

    $gender = strip_tags($_POST['register_gender']);
    $_SESSION['register_gender'] = $gender;

    $position = $_POST['register_position'];
    $_SESSION['register_position'] = $position;
    
    //Seeing if user input follows register rules (ex. password and emails are matching, first name is longer than 2 letters)
    if($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        $email_inquiry = mysqli_query($connection, "SELECT email FROM users WHERE email='$email'");
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

    else if($connectionfirmation_password != $password) {
        array_push($error_array, "Your passwords do not match");
    }

    else if(strlen($password) < 8 || strlen($password) > 255) {
        array_push($error_array, "Your password must be between 8-255 characters");
    }

    //if $error_array does not have a value
    if(empty($error_array)) {

        $connectionfirmation_code = rand(10000, 99999);
        $_SESSION['confirmation_code'] = $connectionfirmation_code;

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = 'mailquarkmailer@gmail.com';
        $mail->Password = 'odylipqitbuoebnk';
        $mail->setFrom('mailquarkmailer@gmail.com', 'Mappable');
        $mail->addAddress($email);

        $mail->isHTML(true);// Set email format to HTML

        $mail->Subject = "Confirmation Code For {$first_name} ";
        $mail->Body .= "<br /><br />Below is the Confirmation Code<br /> Code:";
        $mail->Body .= $connectionfirmation_code;

        $mail->AltBody = 'You are using basic web browser ';

        $username = strtolower($first_name . "_" . $last_name);
		$check_username_query = mysqli_query($connection, "SELECT username FROM users WHERE username='$username'");

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {

            if ($connectionfirmation_code) {
                $i = 0; 
                //if username exists add number to username
                while(mysqli_num_rows($check_username_query) != 0) {
                    $i++; //Add 1 to i
                    $username = $username . "_" . $i;
                    $check_username_query = mysqli_query($connection, "SELECT username FROM users WHERE username='$username'");
                }
                $query = mysqli_query($connection, "INSERT INTO unverified_users VALUES (NULL, '$first_name', '$last_name', '$username', '$email', '$password', '$date', '$position', '$date_of_birth', '$gender', '$grade' , '', 0, 0, 100, 1, 1, 'system_default', 'Poppins', $connectionfirmation_code, 'no')");
                
                array_push($error_array, "You are set to login!");
    
                //Set Email Confirmation Session Variable
        
                //Clear session variables
                $_SESSION['register_first_name'] = " ";
                $_SESSION['register_last_name'] = " ";
                $_SESSION['register_email'] = " ";

            header("Location: auth/confirmation_password.php?email={$email}");
            }
        }
    }
}

?>
