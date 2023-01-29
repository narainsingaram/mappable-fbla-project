<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

include("../includes/operators/settings_operator.php");


$change_user_info_query = mysqli_query($connection, "SELECT first_name, last_name, email FROM users WHERE username='$userLoggedIn'");
$change_user_info_row = mysqli_fetch_array($change_user_info_query);

$first_name = $change_user_info_row['first_name'];
$last_name = $change_user_info_row['last_name'];
$email = $change_user_info_row['email'];
?>
</head>


<main class="content m-auto p-16 w-3/4">

<h1 class='font-bold text-2xl mx-6 '>Change User Credentials</h1>

<form class='bg-white p-4 rounded-xl' action="user_settings.php" method="POST">
  <div class="mb-6">
    <label for="change_first_name" class="block text-sm font-medium text-gray-400 mx-2 my-1">Change First Name</label>
    <input class='block w-full px-3 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300' type="text" name="change_first_name" value="<?php echo $first_name; ?>">
  </div>
  <div class="mb-6">
    <label for="change_last_name" class="block text-sm font-medium text-gray-400 mx-2 my-1">Change Last Name</label>
    <input class='block w-full px-3 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300' type="text" name="change_last_name" value="<?php echo $last_name; ?>">
  </div>
  <div class="mb-6">
    <label for="change_email" class="block text-sm font-medium text-gray-400 mx-2 my-1">Change Email</label>
    <input class='block w-full px-3 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300' type="text" name="change_email" value="<?php echo $email; ?>">
  </div>
  <div class="mb-6">
    <label for="change_password" class="block text-sm font-medium text-gray-400 mx-2 my-1">Change Password</label>
    <input class='block w-full px-3 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300' type="password" name="change_password" >
  </div>
  <button type="submit" name="alter_user_info"class="btn normal-case w-full border-none px-8 py-4 font-medium text-slate-600 rounded-2xl bg-slate-200 hover:bg-slate-300"">Submit</button>
</form>
</main>



   
</body>
</html> 
