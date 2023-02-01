<?php
include("../template/web_defaults.php");
include("../template/navbar.php");


$profile_symbol = substr($first_name, 0, 1) . substr($last_name, 0, 1);
$full_name = "$first_name $last_name";

$id = (isset($_GET['id'])) ? $_GET['id'] : 0;

if(isset($_GET['profile_username'])) {
    $username = $_GET['profile_username'];
    $profile_details_query = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
    $profile_list = mysqli_fetch_array($profile_details_query);
}
?>
<div class="bg-white rounded-lg shadow-lg overflow-hidden">
  <div class="p-6">
    <img src="/images/avatar.png" alt="Profile avatar" class="h-16 w-16 rounded-full mx-auto">
    <h1 class="text-3xl font-bold text-center mt-4">John Smith</h1>
    <p class="text-gray-600 text-center text-sm mt-1">Software Developer</p>
  </div>
  <div class="bg-gray-100 p-6">
    <div class="flex items-center justify-between">
      <div class="text-gray-600 text-sm font-bold">Location</div>
      <div class="text-gray-700 text-sm">New York, NY</div>
    </div>
    <div class="flex items-center justify-between mt-2">
      <div class="text-gray-600 text-sm font-bold">Skills</div>
      <div class="text-gray-700 text-sm">Java, Python, JavaScript</div>
    </div>
  </div>
  <div class="p-6">
    <p class="text-gray-700 text-base">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Aliquam vehicula fringilla gravida. Nunc euismod purus
      a dictum luctus. Nulla facilisi.
    </p>
  </div>
  <div class="bg-gray-100 p-6">
    <div class="flex items-center justify-between">
      <div class="text-gray-600 text-sm font-bold">Education</div>
      <div class="text-gray-700 text-sm">Bachelor's degree in Computer Science</div>
    </div>
    <div class="flex items-center justify-between mt-2">
      <div class="text-gray-600 text-sm font-bold">Experience</div>
      <div class="text-gray-700 text-sm">5 years in software development</div>
    </div>
  </div>
</div>
