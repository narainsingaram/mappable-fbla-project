<?php
    include("../template/web_defaults.php");
    include("../includes/operators/personalization_operator.php");
?>

<style>
    body {
        background: #eee;
    }
</style>
    
        <div class="bg-gray-200 w-full">
            <div class="container px-6 py-6 sm:py-0 mx-auto">
                <div class="sm:hidden bg-white w-full relative">
                    <div class="absolute inset-0 m-auto mr-4 z-0 w-6 h-6">
                       <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_tabs-svg8.svg" alt="toggler">
                    </div>

                    <select aria-label="Selected tab" class="form-select block w-full p-3 border border-gray-300 rounded text-gray-600 appearance-none bg-transparent relative z-10">
                        <option selected="" class="text-sm text-gray-600">Dashboard</option>
                        <option class="text-sm text-gray-600">Earnings</option>
                        <option class="text-sm text-gray-600">Forecasting</option>
                        <option class="text-sm text-gray-600">Reports</option>
                    </select>
                </div>
                <ul role="list" class="hidden sm:flex flex-row pt-8">
                    <li role="listitem" class="rounded-t w-32 h-12 flex items-center justify-center bg-white text-sm text-gray-800"><a href="javascript:void(0)">Dashboard</a></li>
                    <li role="listitem" class="rounded-t w-32 h-12 flex items-center justify-center bg-gray-300 hover:bg-white mx-1 text-sm text-gray-800"><a href="javascript:void(0)">Earnings</a></li>
                    <li role="listitem" class="rounded-t w-32 h-12 flex items-center justify-center bg-gray-300 hover:bg-white mr-1 text-sm text-gray-800"><a href="javascript:void(0)">Forecasting</a></li>
                    <li role="listitem" class="rounded-t w-32 h-12 flex items-center justify-center bg-gray-300 hover:bg-white text-sm text-gray-800"><a href="javascript:void(0)">Reports</a></li>
                </ul>
            </div>
        </div>

        <form action="user_personalization.php" method='POST'>
<div class="container mx-auto px-6">
    <div class="bg-white rounded-2xl w-full h-full">
    <section class="text-gray-600 body-font">
  <div class="container px-0 py-10 mx-auto">
    <div class="text-center mb-4">
      <h1 class="text-4xl mb-3 font-medium text-center title-font text-gray-900">Your Personalization</h1>

<button id="dropdownHelperRadioButton" data-dropdown-toggle="dropdownHelperRadio" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">Select a Theme <i class="uil uil-angle-down text-xl"></i></button>

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
        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
            <path d="M22 4L12 14.01l-3-3"></path>
          </svg>
          <span class="title-font font-medium">Authentic Cliche Forage</span>
        </div>
      </div>
      <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
            <path d="M22 4L12 14.01l-3-3"></path>
          </svg>
          <span class="title-font font-medium">Kinfolk Chips Snackwave</span>
        </div>
      </div>
      <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
            <path d="M22 4L12 14.01l-3-3"></path>
          </svg>
          <span class="title-font font-medium">Coloring Book Ethical</span>
        </div>
      </div>
      <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
            <path d="M22 4L12 14.01l-3-3"></path>
          </svg>
          <span class="title-font font-medium">Typewriter Polaroid Cray</span>
        </div>
      </div>
      <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
            <path d="M22 4L12 14.01l-3-3"></path>
          </svg>
          <span class="title-font font-medium">Pack Truffaut Blue</span>
        </div>
      </div>
      <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
            <path d="M22 4L12 14.01l-3-3"></path>
          </svg>
          <span class="title-font font-medium">The Catcher In The Rye</span>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div>
    <button name='personalization_submit' type='submit' class='text-white bg-blue-500 font-medium rounded-2xl text-lg px-3 py-2.5 fixed bottom-3 right-0 m-auto w-52 left-0'>
        Confirm Changes
    </button>
</form>


