
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
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
    <title>Login or Register for Attendance</title>
    <link rel="stylesheet" type="text/css" href="assets\css\font.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script type="text/javascript" src='assets/js/password_visibility.js'></script>
</head>
<body>


<div class="flex items-center justify-center min-h-screen bg-gray-100">
<div class="px-6 py-8 mx-4 mt-4 text-left rounded-2xl bg-white">
<!-- Errors -->
<?php if(in_array("<span class='form_error'>There must be between 2 and 30 characters in your first name</span>", $error_array)) echo '<center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
<span class="font-semibold ml-2 text-left flex-auto">There must be between 2-30 characters in your first name!</span> <span id="profile-tab" data-tabs-target="#profile" class="rounded-2xl bg-slate-200 px-2 py-1.5 text-lg font-normal ml-2 cursor-pointer"><i class="uil uil-edit"></i></span>
</div></center>'; ?>

<?php if(in_array("<span class='form_error'>There must be between 2 and 30 characters in your last name</span>", $error_array)) echo '<div class="p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
<span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-party bx-tada"></i></span>
<span class="font-semibold mr-2 text-left flex-auto">There must be between 2-30 characters in your first name!</span>
</div>'; ?>
<?php 
    if(in_array("<span class='form_error'>Email already in use</span>", $error_array)) echo '<center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
<span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-envelope"></i></span>
<span class="font-semibold mr-2 text-left flex-auto">Someone is already using this email!</span>
</div></center>'; 
    if(in_array("<span class='form_error'>Invalid email format</span>", $error_array)) echo '<center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-envelope"></i></span>
    <span class="font-semibold mr-2 text-left flex-auto">Wrong Email Format! Please try again.</span>
    </div></center>';
    if(in_array("<span class='form_error'>Emails don't match</span>", $error_array)) echo '<center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-envelope"></i></span>
    <span class="font-semibold mr-2 text-left flex-auto">Your emails are not the same! Make sure they are!</span>
    </div></center>';
?>
<?php 
    if(in_array("<span class='form_error'>Your passwords do not match</span>", $error_array)) echo '<center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-lock-alt"></i></span>
    <span class="font-semibold mr-2 text-left flex-auto">Make sure your passwords match together!</span>
    </div></center>'; 
    if(in_array("<span class='form_error'>Your password needs to include more than 8 characters</span>", $error_array)) echo '<center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-lock-alt"></i></span>
    <span class="font-semibold mr-2 text-left flex-auto">Your password must have at least 8 characters</span>
    </div></center>';
    if(in_array("<span class='form_error'>Your password must be less than 255 characters long.</span>", $error_array)) echo '<center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-lock-alt"></i></span>
    <span class="font-semibold mr-2 text-left flex-auto">Your password cant be bigger than 255 characters!</span>
    </div></center>';
?>
<?php if(in_array('You are set to login!', $error_array)) echo '
<div class="p-2 bg-green-300 items-center text-green-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
<span class="flex rounded-full bg-green-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-party bx-tada"></i></span>
<span class="font-semibold mr-2 text-left flex-auto">The Most Amazing Person in the Planet Has Created An Account!</span>
</div>'; ?>


<div class="flex items-center justify-center mb-4">
<img src="assets/images/mappable_logo.png" class='w-12 mr-2 mb-1' alt="">    
<h1 class="text-4xl font-extrabold text-blue-600"> Mappable</h1>
</div>

<div class="mb-4">
    <ul class="flex mb-2 text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="mr-2" role="presentation">
            <button class="bg-slate-100 px-4 py-1 my-2 rounded-xl text-slate-600 text-base" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true"> <img class='mb-1 w-7 inline' src='assets/images/user_reg.png'> Full Name</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="bg-slate-100 px-4 py-1 my-2 rounded-xl text-slate-600 text-base" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false"><img class='mb-1 w-7 inline' src='assets/images/user_info.png'> User Info</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="bg-slate-100 px-4 py-1 my-2 rounded-xl text-slate-600 text-base" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false"><img class='mb-1 w-7 inline' src='assets/images/lock.png'> Credentials</button>
        </li>
        <li role="presentation">
            <button class="bg-slate-100 px-4 py-1 my-2 rounded-xl text-slate-600 text-base" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false"><img class='mb-1 w-7 inline' src='assets/images/submit.png'> Submit</button>
        </li>
    </ul>
</div>
<form class="w-full" action="registration_form.php" method="POST">
<div id="myTabContent">
    <div id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="mt-4">  
<label class="block text-sm font-medium text-gray-400 mx-2 my-1" for="register_first_name">First Name</label>
<label class="block">
    <input type="text" name="register_first_name" placeholder="First Name" class="block w-full px-5 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" value="<?php 
    if(isset($_SESSION['register_first_name'])) {
        echo $_SESSION['register_first_name'];
    } 
    ?>" required>
    </div>

    <div class="mt-4">
   <label class="block text-sm font-medium text-gray-400 mx-2 my-1" for="register_last_name">Last Name</label>
   <label class="block">
    <input type="text" name="register_last_name" placeholder="Last Name" class="block w-full px-5 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" value="<?php 
    if(isset($_SESSION['register_last_name'])) {
        echo $_SESSION['register_last_name'];
    } 
    ?>" required>
    </div>
    </div>
    <div id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="mt-4">
    <label class="block text-sm font-medium text-gray-400 mx-2 my-1" for="cars">School:</label>
    <label class="block">
<select name="register_school" id="cars" placeholder="School" class="block w-full px-5 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" value="<?php 
    if(isset($_SESSION['register_school'])) {
        echo $_SESSION['register_school'];
    } 
    ?>" >
    <option value="">School</option>
     <option value="West Forsyth Highschool">West Forsyth Highschool</option>
    <option value="Lambert Highschool">Lambert Highschool</option>
    <option value="North Gwinnet Highschool">North Gwinnet Highschool</option>
    <option value="Other">Other</option>
  </select>
    </div>
    <div class="mt-4">
    <label class="block text-sm font-medium text-gray-400 mx-2 my-1" for="cars">Grade:</label>
    <label class="block">
<select name="register_grade" id="cars" placeholder="Grade" class="block w-full px-5 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" value="<?php 
    if(isset($_SESSION['register_grade'])) {
        echo $_SESSION['register_grade'];
    } 
    ?>" >
    <option value="">Grade Level</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
  </select>
    </div>
    <div class="mt-4">
    <label class="block text-sm font-medium text-gray-400 mx-2 my-1" for="cars">Gender:</label>
    <label class="block">
<select name="register_gender" id="cars" class="block w-full px-5 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" value="<?php 
    if(isset($_SESSION['register_gender'])) {
        echo $_SESSION['register_gender'];
    } 
    ?>">
    <option value="">Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select>
</div>

<div class="mt-4">
<ul class="grid gap-8 m-auto w-full md:grid-cols-2">
    <li>
        <input type="radio" id="hosting-small" name="register_position" value="Student" class="hidden peer" required="">
        <label for="hosting-small" class="inline-flex p-5 text-gray-500 rounded-xl cursor-pointer peer-checked:border-blue-500 peer-checked:bg-blue-100 peer-checked:text-blue-500 hover:text-gray-600 bg-slate-200">                           
            <div class="block">
                <div class="w-full text-2xl font-semibold"><i class="text-3xl uil uil-book-reader"></i> Student</div>
            </div>
            <i class="ml-3 text-3xl uil uil-arrow-right"></i>
        </label>
    </li>
    <li>
        <input type="radio" id="hosting-big" name="register_position" value="Teacher" class="hidden peer">
        <label for="hosting-big" class="inline-flex p-5 text-gray-500 rounded-xl cursor-pointer peer-checked:border-blue-500 peer-checked:bg-blue-100 peer-checked:text-blue-500 hover:text-gray-600 bg-slate-200">
        <div class="block">
                <div class="w-full text-2xl font-semibold"> <i class="text-3xl uil uil-balance-scale"></i> Teacher</div>
            </div>
            <i class="ml-3 text-3xl uil uil-arrow-right"></i>
        </label>
    </li>
</ul>


</div>
  
  
 <div class=mt-4>
  <label class="block text-sm font-medium text-gray-400 mx-2 my-1" for="date">Date of Birth:</label>
  <label class="block">
   <input type="date" name="register_date_of_birth" class="block w-full px-5 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" value="<?php 
    if(isset($_SESSION['register_date_of_birth'])) {
        echo $_SESSION['register_date_of_birth'];
    } 
    ?>">
    </div>
</div>
    <div id="settings" role="tabpanel" aria-labelledby="settings-tab">
    <div class=mt-4>
  <label class="block text-sm font-medium text-gray-400 mx-2 my-1"for="register_email">Email</label>
  <label class="block">
    <input type="email" name="register_email" placeholder="Email"class="block w-full px-5 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-offset-blue-300" value="<?php 
    if(isset($_SESSION['register_email'])) {
        echo $_SESSION['register_email'];
    } 
    ?>" required>
    </div>
    <div class="mt-4">
    <label class="block text-sm font-medium text-gray-400 mx-2 my-1" for="register_password">Password</label>
    <input id='reg_normal_password' type="password" name="register_password" placeholder="Password" class="block w-full px-5 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" required>
</div>
<div class="mt-4">
    <label class="block text-sm font-medium text-gray-400 mx-2 my-1" for="register_confirmation_password">Confirm Password</label>
    <input id='reg_confirm_password' type="password" name="register_confirmation_password" placeholder="Confirm Password" class="block w-full px-5 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" required>
    <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password

<script>
</script>
</div>
    </div>
<div id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
<?php
$human_image_verification_array = array("assets/images/183901AFA12.png", "assets/images/2190AU12.png", "assets/images/13809ADH213.png", "assets/images/10239JAHK13.png", "assets/images/578123IJAS9.png", "assets/images/192085JKN.png", "assets/images/3105498KJA.png", "assets/images/123908ADKJ.png");
shuffle($human_image_verification_array);

$img_rotations = array(12,45,90,180);
shuffle($img_rotations);
?>
<center class=''>
<main class='relative m-auto w-48 bg-slate-200 shadow-[rgba(7,_65,_210,_0.1)_0px_9px_30px] 0px 9px 20px; rounded-3xl mb-4'>
    <img class=' p-5 rotate-<?php echo $img_rotations[0];?>' src="<?php echo $human_image_verification_array[0]; ?>" alt="">
</main>
</center>
    <div class="my-4 flex items-center py-2 px-3 bg-slate-100 rounded-2xl shadow-[rgba(7,_65,_210,_0.1)_0px_9px_30px] ">
    <button class="inline-flex justify-center items-center text-lg px-3 py-3 text-slate-500 bg-slate-200 rounded-full">
        <i class="uil uil-sync"></i>
    </button>
        <input name='human_ver_reg_input' class="block mx-4 p-2.5 w-full px-5 py-3 text-slate-600 placeholder-gray-400 transition duration-150 ease-in-out transform rounded-xl bg-slate-200 focus:outline-none focus:ring focus:ring-blue-300" placeholder='What is on the image?'></input>
        <button type='submit' name='submit_human_verification' class="inline-flex justify-center items-center text-lg px-3 py-3 text-slate-500 bg-slate-200 rounded-full">
        <i class="uil uil-check"></i>
    </button>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path opacity="0.4" d="M15.5 13.15h-2.17c-1.78 0-3.23-1.44-3.23-3.23V7.75c0-.41-.33-.75-.75-.75H6.18C3.87 7 2 8.5 2 11.18v6.64C2 20.5 3.87 22 6.18 22h5.89c2.31 0 4.18-1.5 4.18-4.18V13.9c0-.42-.34-.75-.75-.75Z" fill="#94a3b8"></path><path d="M17.82 2H11.93C9.67 2 7.84 3.44 7.76 6.01c.06 0 .11-.01.17-.01h5.89C16.13 6 18 7.5 18 10.18V16.83c0 .06-.01.11-.01.16 2.23-.07 4.01-1.55 4.01-4.16V6.18C22 3.5 20.13 2 17.82 2Z" fill="#94a3b8"></path><path d="M11.98 7.15c-.31-.31-.84-.1-.84.33v2.62c0 1.1.93 2 2.07 2 .71.01 1.7.01 2.55.01.43 0 .65-.5.35-.8-1.09-1.09-3.03-3.04-4.13-4.16Z" fill="#94a3b8"></path></svg>

    <div class="button">
        <button class="flex items-center justify-center w-full px-8 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-500 rounded-2xl hover:bg-blue-600" type="submit" name="register_btn">Create Account
        <svg class='ml-2' width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.4" d="M7.91588 22.0001H16.0839C19.6229 22.0001 21.9999 19.7241 21.9999 16.3351V7.6651C21.9999 4.2761 19.6229 2.0001 16.0839 2.0001H7.91588C4.37788 2.0001 1.99988 4.2771 1.99988 7.6661L1.99988 16.3351C1.99988 19.7241 4.37788 22.0001 7.91588 22.0001Z" fill="#93c5fd"></path>
<path d="M12.8553 16.2794L16.6203 12.5314C16.9033 12.2494 16.9033 11.7504 16.6203 11.4674L12.8553 7.7194C12.5613 7.4274 12.0863 7.4284 11.7943 7.7224C11.5023 8.0164 11.5023 8.4904 11.7963 8.7834L14.2733 11.2504H7.91833C7.50333 11.2504 7.16833 11.5864 7.16833 12.0004C7.16833 12.4144 7.50333 12.7504 7.91833 12.7504H14.2733L11.7963 15.2164C11.6493 15.3634 11.5763 15.5554 11.5763 15.7484C11.5763 15.9394 11.6493 16.1314 11.7943 16.2774C12.0863 16.5704 12.5613 16.5714 12.8553 16.2794Z" fill="#93c5fd"></path>
</svg>
        </button>
    </div>
</div>
</div>
</form>    
    <a class="text-gray-500 text-sm text-center	"href="sign_in.php"><center>Already have a account? Log In</center></a>
</div>
</div>
</body>
</html>
