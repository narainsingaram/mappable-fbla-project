<script src="https://cdn.tailwindcss.com"></script>
<?php
require "includes/configs/configurations.php";
require 'includes/operators/register_operator.php';
require 'includes/operators/login_operator.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Sign in for Attendance</title>
    <link rel="stylesheet" type="text/css" href="assets\css\font.css">
</head>
<body>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
<div class="px-6 py-8 w-1/3 mx-4 mt-4 text-left rounded-2xl bg-white">
<?php if(in_array("<span class='form_error'>Your email or password is incorrect</span>", $error_array)) echo '<center><div class="mb-4 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
<span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-error"></i></span>
<span class="font-semibold mr-2 text-left flex-auto">Your email or password is incorrect</span>
</div></center>'; ?>
    <div class="flex items-center justify-center mb-4">
        <img src="assets/images/mappable_logo.png" class='w-12 mr-2 mb-1' alt="">    
        <h1 class="text-4xl font-extrabold text-blue-600"> Mappable</h1>
    </div>
<form class="w-full max-w-lg" action="sign_in.php" method="POST">
<div id="myTabContent">
    <div class="mt-4">  
<label class="block text-sm font-medium text-gray-400 mx-2 my-1" for="register_first_name">Email Address</label>
    <input type="email" name="email_login" placeholder="Email Address" class="block w-full px-5 py-3 text-base text-slate-600 placeholder-gray-300 transition duration-250 ease-in transform border border-transparent rounded-xl bg-slate-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-300" value="<?php
if (isset($_SESSION['email_login'])){
echo $_SESSION['email_login'];
} ?>"
required>
    <?php if(in_array("<span class='form_error'>There must be between 2 and 30 characters in your first name</span>", $error_array)) echo "<span class='form_error'>There must be between 2 and 30 characters in your first name</span>"; ?>
    </div>

    <div class="mt-4">
   <label class="block text-sm font-medium text-gray-400 mx-2 my-1" for="register_last_name">Password</label>
    <input type="password" name="password_login" class="block w-full px-5 py-3 text-base text-slate-600 placeholder-gray-300 transition duration-250 ease-in transform border border-transparent rounded-xl bg-slate-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-300" placeholder="Password">
    </div>
</div>
    <div class="mt-4">
        <button type="submit" class="flex items-center justify-center w-full px-8 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-2xl hover:bg-blue-700" name="login_btn" >Login</button>
</div>
</form>    
    <a class="text-gray-500 text-sm text-center	" href="registration_form.php"><center>Don't have an Account? Register Now.</center></a>
</div>
</div>
</body>
</html>
