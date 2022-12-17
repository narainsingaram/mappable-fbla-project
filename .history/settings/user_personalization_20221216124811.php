<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

include("../includes/operators/settings_operator.php");
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
    
<div class='tabcontent m-2'>
  <a href='user_settings.php' class="tablink bg-gray-200 text-black">Home</a>
  <a href='user_personalization.php' class="tablink bg-blue-600 font-semibold">Personalization</a>
  <a class="tablink bg-gray-200 text-black">Other</a>
  <a class="tablink bg-gray-200 text-black">Other</a>
</div>

        <form action="user_personalization.php" method='POST'>
<div class="container mx-auto px-6">
    <div class="bg-white rounded-2xl w-full h-full">
    <section class="text-gray-600 body-font">
  <div class="container px-0 py-10 mx-auto">
    <div class="text-center mb-4">

<button id="dropdownHelperRadioButton" data-dropdown-toggle="dropdownHelperRadio" class="text-white mt-8 bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">Select a Theme <i class="uil uil-angle-down text-xl"></i></button>

<div id="dropdownHelperRadio" class="hidden z-10 w-60 bg-white rounded divide-y divide-gray-100 shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 806px);">
    <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownHelperRadioButton">
    <li>
        <div class="flex p-2 rounded hover:bg-gray-100 <?php 
              if($user['theme'] == 'light_theme') {
                echo 'bg-slate-100 border-2 border-blue-100';
              } 
              ?>">
          <div class="flex items-center h-5">
              <input id="helper-radio-4" name="theme_mode" type="radio" value="light_theme" class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" <?php 
              if($user['theme'] == 'light_theme') {
                echo 'checked';
              } 
              ?>>
          </div>
          <div class="ml-2 text-sm0">
              <label for="helper-radio-4" class="font-medium text-gray-900">
                <div>Light Mode</div>
                <p id="helper-radio-text-5" class="text-xs font-normal text-gray-500">With improved daytime accessibility and a brighter user interface.</p>
              </label>
          </div>
        </div>
      </li>
      <li>
        <div class="flex p-2 rounded hover:bg-gray-100 <?php 
              if($user['theme'] == 'dark_theme') {
                echo 'bg-slate-100 border-2 border-blue-100';
              } 
              ?>">
          <div class="flex items-center h-5">
              <input id="helper-radio-5" name="theme_mode" type="radio" value="dark_theme" class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" <?php 
              if($user['theme'] == 'dark_theme') {
                echo 'checked';
              } 
              ?>>
          </div>
          <div class="ml-2 text-sm">
              <label for="helper-radio-5" class="font-medium text-gray-900">
                <div>Dark Mode</div>
                <p id="helper-radio-text-5" class="text-xs font-normal text-gray-500">Easier on the eyes, and darkened user interface.</p>
              </label>
          </div>
        </div>
      </li>
      <li>
        <div class="flex p-2 rounded hover:bg-gray-100">
          <div class="flex items-center h-5">
              <input id="helper-radio-6" name="theme_mode" type="radio" value="" class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
          </div>
          <div class="ml-2 text-sm">
              <label for="helper-radio-6" class="font-medium text-gray-900">
                <div>Coming Soon</div>
                <p id="helper-radio-text-6" class="text-xs font-normal text-gray-500">Currently uploading more themes and colors</p>
              </label>
          </div>
        </div>
      </li>
    </ul>
</div>

    </div>
    
    <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
      <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-blue-600 rounded-xl flex p-4 h-full items-center">
        <i class="uil uil-sun text-2xl mx-4 text-white"></i>
          <span class="title-font text-white font-extrabold font-medium">Light Mode</span>
        </div>
      </div>
      <div class="p-2 sm:w-1/2 w-full">
      <div class="bg-blue-600 rounded-xl flex p-4 h-full items-center">
        <i class="uil uil-moon text-2xl mx-4 text-white"></i>
          <span class="title-font text-white font-extrabold font-medium">Dark Mode</span>
        </div>
      </div>
      <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-blue-600 rounded-xl flex p-4 h-full items-center">
        <i class="uil uil-sun text-2xl mx-4 text-white"></i>
          <span class="title-font text-white font-extrabold font-medium">Coming Soon...</span>
        </div>
      </div>
      <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-blue-600 rounded-xl flex p-4 h-full items-center">
        <i class="uil uil-sun text-2xl mx-4 text-white"></i>
          <span class="title-font text-white font-extrabold font-medium">Coming Soon...</span>
        </div>
      </div>
      <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-blue-600 rounded-xl flex p-4 h-full items-center">
        <i class="uil uil-sun text-2xl mx-4 text-white"></i>
          <span class="title-font text-white font-extrabold font-medium">Coming Soon...</span>
        </div>
      </div>
      <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-blue-600 rounded-xl flex p-4 h-full items-center">
        <i class="uil uil-sun text-2xl mx-4 text-white"></i>
          <span class="title-font text-white font-extrabold font-medium">Coming Soon...</span>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div>
    <button name='personalization_submit' type='submit' class='text-white bg-blue-600 font-medium rounded-2xl text-lg px-3 py-2.5 fixed bottom-3 right-0 m-auto w-52 left-0'>
        Confirm Changes
    </button>
</form>


