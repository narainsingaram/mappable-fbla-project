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
  <div class="relative">
    <input class='block w-full px-3 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300' type="password" name="change_password" id="change_password">
    <span class="absolute right-0 top-0 mt-2 mr-2 cursor-pointer">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
        <circle cx="12" cy="12" r="3"></circle>
      </svg>
    </span>
  </div>
  </div>
  <button type="submit" name="alter_user_info"class="btn normal-case w-full border-none px-8 py-4 font-medium text-slate-600 rounded-2xl bg-slate-200 hover:bg-slate-300"">Submit</button>
</form>
</main>

<script>
const passwordInput = document.getElementById("change_password");
const passwordToggle = passwordInput.nextElementSibling;

passwordToggle.addEventListener("click", function () {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordToggle.innerHTML = "<svg class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='M23.954 21.03L13.584 7.61a2 2 0 0 0-2.83 0L7.389 8.75a2 2 0 0 1-2.83-2.83l9.91-13.6a2 2 0 0 0 0-2.83l1.879-1.879a2 2 0 0 1 2.83 2.83l-8.67 11.97z'></path><circle cx='12' cy='12' r='3'></circle></svg>";
  } else {
    passwordInput.type = "password";
    passwordToggle.innerHTML = "<svg class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'></path><circle cx='12' cy='12' r='3'></circle></svg>";
  }
});
</script>



   
</body>
</html> 
