<?php 
include("../template/web_defaults.php");
include("../template/sidebar.php");

?>

<div id="content" class='bg-gray-50'>
<div class="px-2 py-8 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl ">
  <div class="grid gap-10 lg:grid-cols-2">
    <div class="lg:pr-10 ">
<blockquote class='inline-block mb-5'></blockquote>
      <h5 class="mb-4 text-4xl font-bold  leading-none">
        Be A Part Of The Brand <br>
        New School <span class='font-bold text-blue-500'>Shopping Spree</span> <br> 
      </h5>
      <p class="text-gray-900">
        On <span class='font-bold text-blue-500'>Mappable</span>, <?php echo $user['school'];?> and many other schools have just released a way for students and teachers to purchase new cool products using the currency of <span class='text-green-500 font-bold'>gems</span>. 
        <br>
        Are you ready to get on your shopping spree?
      </p>
      <hr class="mb-4 border-0">
      <div class="flex items-center space-x-4">
        <button class='bg-blue-100 px-3 py-2 rounded-xl'>Shop Now</button>
        <button class='bg-blue-100 px-3 py-2 rounded-xl'><i class="uil uil-plus"></i> Create a Product</button>
      </div>
    </div>
    <div>
      <img class="object-cover w-full h-56 rounded shadow-lg sm:h-96" src="../assets/images/shopping_landing_page_img.jpg" alt="" />
    </div>
  </div>
</div>

<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
    <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
      Products created by <span class='font-medium line-through decoration-red-500'>your</span> <b class='font-semibold text-blue-600'><br>our</b> community
    </h2>
    <p class="text-base text-gray-600 md:text-lg">
      Select from a various list of products created by students, teachers, and our community. Also, make sure you have enough gems! <br> You currently have <b class='text-green-500 font-semibold'><?php echo $gems; ?> gems</b>.
    </p>
  </div>
  <div class="grid gap-5 mb-8 md:grid-cols-2 lg:grid-cols-3">
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
      <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
        <svg class="w-10 h-10 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
          <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
        </svg>
      </div>
      <h6 class="mb-2 font-semibold leading-5">The doctor said</h6>
      <p class="text-sm text-gray-900">
        Baseball ipsum dolor sit amet cellar rubber win hack tossed. Slugging catcher slide bench league, left fielder nubber.
      </p>
    </div>
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
      <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
        <svg class="w-10 h-10 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
          <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
        </svg>
      </div>
      <h6 class="mb-2 font-semibold leading-5">That is the true</h6>
      <p class="text-sm text-gray-900">
        We meet at one of those defining moments - a moment when our nation is at war, our economy is in turmoil, and the American promise has been threatened once more.
      </p>
    </div>
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
      <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
        <svg class="w-10 h-10 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
          <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
        </svg>
      </div>
      <h6 class="mb-2 font-semibold leading-5">Those options</h6>
      <p class="text-sm text-gray-900">
        Strategic high-level 30,000 ft view. Drill down re-inventing the wheel at the end of the day but curate imagineer, or to be inspired is to become creative.
      </p>
    </div>
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
      <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
        <svg class="w-10 h-10 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
          <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
        </svg>
      </div>
      <h6 class="mb-2 font-semibold leading-5">Swearem ipsum</h6>
      <p class="text-sm text-gray-900">
        Aliquam scelerisque accumsan nisl, a mattis eros vestibulum et. Vestibulum placerat purus ut nibh aliquam fringilla. Aenean et tortor diam, id tempor elit.
      </p>
    </div>
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
      <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
        <svg class="w-10 h-10 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
          <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
        </svg>
      </div>
      <h6 class="mb-2 font-semibold leading-5">Webtwo ipsum</h6>
      <p class="text-sm text-gray-900">
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque rem aperiam, eaque ipsa quae. Sed ut perspiciatis unde omnis.
      </p>
    </div>
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
      <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
        <svg class="w-10 h-10 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
          <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
        </svg>
      </div>
      <h6 class="mb-2 font-semibold leading-5">Lookout flogging</h6>
      <p class="text-sm text-gray-900">
        Flatland! Hypatia. Galaxies Orion's sword globular star cluster? Light years quasar as a patch of light gathered by gravity Vangelis radio telescope.
      </p>
    </div>
  </div>
</div>
</div>