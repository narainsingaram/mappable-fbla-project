
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
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
    <?php 
    
    if(in_array("There must be between 2 and 30 characters in your first and last name", $error_array)) echo <<<EOT
    <center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="font-semibold ml-2 text-left flex-auto">There must be between 2-30 characters in your first & last name!</span> <span id="profile-tab" data-tabs-target="#profile" class="rounded-2xl bg-slate-200 px-2 py-1.5 text-lg font-normal ml-2 cursor-pointer"><i class="uil uil-edit"></i></span>
    </div></center> 
    EOT; 

    if(in_array("Email already in use", $error_array)) echo <<<EOT
    <center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-envelope"></i></span>
    <span class="font-semibold mr-2 text-left flex-auto">Someone is already using this email!</span>
    </div></center>
    EOT; 

    if(in_array("Invalid email format", $error_array)) echo <<<EOT
    <center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-envelope"></i></span>
    <span class="font-semibold mr-2 text-left flex-auto">Invalid Email Format</span>
    </div></center>
    EOT; 


    if(in_array("Emails donzz", $error_array)) echo <<<EOT
    <center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-envelope"></i></span>
    <span class="font-semibold mr-2 text-left flex-auto">Invalid Email Format</span>
    </div></center>
    EOT; 

    if(in_array("Your passwords do not match", $error_array)) echo <<<EOT
    <center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-lock-alt"></i></span>
    <span class="font-semibold mr-2 text-left flex-auto">Make sure your passwords match together!</span>
    </div></center>
    EOT;

    if(in_array("Your password must be between 8-255 characters", $error_array)) echo <<<EOT
    <center><div class="my-2 p-2 bg-slate-300 items-center text-slate-800 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-slate-200 uppercase px-2 py-1 text-lg font-bold mr-3"><i class="bx bx-lock-alt"></i></span>
    <span class="font-semibold mr-2 text-left flex-auto">Your password must be between 8-255 characters</span>
    </div></center>
    EOT;

    if(in_array('You are set to login!', $error_array)) echo '
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
            <button class="btn bg-slate-100 px-4 py-1 my-2 rounded-xl text-slate-600 text-base" id="profile-tab" data-tabs-target="#profile" role="tab" aria-controls="profile">  Full Name</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="btn normal-case border-1 border-red-300 bg-slate-100 hover:bg-slate-200 px-4 py-1 my-2 rounded-xl text-slate-600 text-sm" id="dashboard-tab" data-tabs-target="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false">User Information</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="bg-slate-100 px-4 py-1 my-2 rounded-xl text-slate-600 text-base" id="settings-tab" data-tabs-target="#settings" role="tab" aria-controls="settings" aria-selected="false"><img class='mb-1 w-7 inline' src='assets/images/lock.png'> Credentials</button>
        </li>
        <li role="presentation">
            <button class="bg-slate-100 px-4 py-1 my-2 rounded-xl text-slate-600 text-base" id="contacts-tab" data-tabs-target="#contacts" role="tab" aria-controls="contacts" aria-selected="false"><img class='mb-1 w-7 inline' src='assets/images/submit.png'> Submit</button>
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
    <label for="my-modal-4" class="inline-flex items-center py-3 px-4 text-sm font-medium text-center text-blue-500 bg-blue-200/60 cursor-pointer rounded-xl">
    <svg class='mx-1' xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none"><path opacity=".4" d="M18.328 5.67 6.588 17.41c-.44.44-1.18.38-1.54-.14-1.24-1.81-1.97-3.95-1.97-6.15V6.73c0-.82.62-1.75 1.38-2.06l5.57-2.28a5.12 5.12 0 0 1 3.92 0l4.04 1.65c.67.27.84 1.13.34 1.63Z" fill="#2563eb"></path><path d="M19.27 7.042c.65-.55 1.64-.08 1.64.77v3.31c0 4.89-3.55 9.47-8.4 10.81-.33.09-.69.09-1.03 0a11.3 11.3 0 0 1-3.87-1.95c-.48-.37-.53-1.07-.11-1.5 2.18-2.23 8.56-8.73 11.77-11.44Z" fill="#2563eb"></path></svg>
        I'm Not A Robot</label>

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

<?php
$human_image_verification_array = array("assets/images/183901AFA12.png", "assets/images/2190AU12.png", "assets/images/13809ADH213.png", "assets/images/10239JAHK13.png", "assets/images/578123IJAS9.png", "assets/images/192085JKN.png", "assets/images/3105498KJA.png", "assets/images/123908ADKJ.png");
shuffle($human_image_verification_array);

$img_rotations = array(12,45,90,180);
shuffle($img_rotations);
?>


<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-4" class="modal-toggle" />
<label for="my-modal-4" class="modal cursor-pointer">
<label class="bg-white modal-box relative" for="">
    <center class=''>
        <main class='relative m-auto w-48 bg-slate-200 shadow-[rgba(7,_65,_210,_0.1)_0px_9px_30px] 0px 9px 20px; rounded-3xl mb-4'>
            <img class=' p-5 rotate-<?php echo $img_rotations[0];?>' src="<?php echo $human_image_verification_array[0]; ?>" alt="">
        </main>
    </center>
    <form class='inline' action="registration_form.php">
        <div class="my-4 flex items-center py-2 px-3 bg-slate-100 rounded-2xl shadow-[rgba(7,_65,_210,_0.1)_0px_9px_30px]">
                <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer">
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                </button>
                    <input class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-white focus:outline-none focus:ring focus:ring-blue-3000" placeholder="What does the image depict?"></input>
                        <button name='image_auth' type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer">
                            <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                        </button>
            </div>
    </form>
</label>

</body>
</html>
