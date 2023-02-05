<?php 
include("../template/web_defaults.php");
include("../template/navbar.php");
include("../includes/operators/reward_operator.php");

?>




<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
    <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
      Products created by <span class='font-medium line-through decoration-red-500'>your</span> <b class='font-semibold text-blue-600'><br>our</b> community
    </h2>
    <p class="text-base text-gray-600 md:text-lg">
      Select from a various list of products created by students, teachers, and our community. Also, make sure you have enough gems! <br> You currently have <b class='text-green-500 font-semibold'><?php echo $gems; ?> gems</b>.
    </p>
  </div>
  <form method="POST">
    <div class="grid gap-5 mb-8 md:grid-cols-2 lg:grid-cols-3">

      <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
        <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
          <svg class="w-10 h-10 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
          </svg>
        </div>
        <h2 class="mb-2 font-semibold leading-5">Hershey Bars</h2>
        <h5 class="text-2xl text-green-500 font-semibold">75 GEMS</h5>
        <button class="bg-blue-600 active:bg-blue-700 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 float-right" type="button" style="transition: all 0.15s ease 0s;">
          BUY
        </button>
      </div>
      <h2 class="mb-2 font-semibold leading-5">Hershey Bars</h2>
      <h5 class="text-2xl text-green-500 font-semibold">75 GEMS</h5>
      <form class='inline' action="shop.php" method="POST">
        <button name='reward6' type='submit' class="bg-blue-600 active:bg-blue-700 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 float-right" type="button" style="transition: all 0.15s ease 0s;">
          BUY
        </button>
      </form>
    </div>
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
      <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
        <i class="uil uil-pen text-2xl"></i>
      </div>

      <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
        <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
          <i class="uil uil-notes text-2xl"></i>
        </div>
        <h4 class="mb-2 font-semibold leading-5">Sticky Notepads</h4>
        <h5 class="text-2xl text-green-500 font-semibold">75 GEMS</h5>
        <button class="bg-blue-600 active:bg-blue-700 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 float-right" type="button" style="transition: all 0.15s ease 0s;">
          BUY
        </button>
      </div>

  </div>
</form>
</div>