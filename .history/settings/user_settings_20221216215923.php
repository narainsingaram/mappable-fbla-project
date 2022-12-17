<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

include("../includes/operators/settings_operator.php");


$change_user_info_query = mysqli_query($con, "SELECT first_name, last_name, email, school FROM users WHERE username='$userLoggedIn'");
$change_user_info_row = mysqli_fetch_array($change_user_info_query);

$first_name = $change_user_info_row['first_name'];
$last_name = $change_user_info_row['last_name'];
$email = $change_user_info_row['email'];
$school = $change_user_info_row['school'];
?>


<style>

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  background: #eee;
}

/* Style tab links */
.tablink {
  color: white;
  float: left;
  text-align: center;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}
</style>
</head>


<main class="content m-auto p-16 w-3/4">

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
  <label for="change_school" class="block text-sm font-medium text-gray-400 mx-2 my-1">Change School</label>
  <select name="change_school" id="cars" placeholder="<?php echo $school; ?>" class="block w-full px-3 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" value="<?php 
    if(isset($_SESSION['change_school'])) {
        echo $_SESSION['change_school'];
    } 
    ?>" >
    <option value=""><?php echo $school; ?></option>
    <option value="West Forsyth Highschool">West Forsyth Highschool</option>
    <option value="Lambert Highschool">Lambert Highschool</option>
    <option value="North Gwinnet Highschool">North Gwinnet Highschool</option>
    <option value="Other">Other</option>
  </select>
  </div>
  <div class="mb-6">
    <label for="change_password" class="block text-sm font-medium text-gray-400 mx-2 my-1">Change Password</label>
    <input class='block w-full px-3 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300' type="password" name="change_password" >
  </div>
  <button type="submit" name="alter_user_info"class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
</form>
</main>



<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 
