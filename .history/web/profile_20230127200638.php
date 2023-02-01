<?php
include("../template/web_defaults.php");
include("../template/navbar.php");



$id = (isset($_GET['id'])) ? $_GET['id'] : 0;

if(isset($_GET['profile_username'])) {
    $username = $_GET['profile_username'];
    $profile_details_query = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
    $profile_list = mysqli_fetch_array($profile_details_query);
}
?>
      <section class="relative block bg-red" style="height: 500px;">
        <div
          class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("https://eoimages.gsfc.nasa.gov/images/imagerecords/87000/87843/tetons_photo_2015_lrg.jpg");'
        >
        </div>
        <div
          class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
          style="height: 70px;"
        >
        </div>
      </section>
      <section class="relative py-16 bg-gray-300">
        <div class="container mx-auto px-4">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full shadow-[rgba(7,_65,_50,_0.1) rounded-lg -mt-64"
          >
            <div class="px-6">
              <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-6/12 px-4 lg:order-1 flex justify-center">
                  <div class='-mt-24 shadow-[rgba(7,_65,_50,_0.1)_0px_9px_100px] inline-flex overflow-hidden relative justify-center items-center w-48 h-48 text-8xl bg-slate-200 rounded-full'>
                    <span class='relative z-10 font-semibold text-gray-600'><?php echo $profile_list['first_name'][0] . $profile_list['last_name'][0]; ?>
                  </span>
                  <div class='absolute right-0 bottom-0 z-50	'>
                    <sup class='bg-blue-500 text-blue-100 text-xs px-3 py-2 rounded-full'><?php echo $profile_list['position']; ?></sup>
                    </div>
                  </div>
                </div>
                <div class="w-full lg:w-6/12 px-4 lg:order-2">
                  <div class="flex justify-center py-4 lg:pt-4 pt-8">
                    <div class="mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                        >10</span
                      ><span class="text-sm text-gray-500">Events Attended</span>
                    </div>
                    <div class="mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                        ><?php echo $points ?> </span
                      ><span class="text-sm text-gray-500">Points</span>
                    </div>
                    <div class="lg:mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                        ><?php echo $gems ?></span
                      ><span class="text-sm text-gray-500">Gems</span>
                    </div>
                  </div>
                </div>
              </div>
              <div >
                <h3
                  class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2 text-center">
                  <?php echo "{$profile_list['first_name']}  {$profile_list['last_name']}" ; ?>
                </h3>
                <div
                  class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase text-center"
                >
                </div>

              </div>
              <div class="mt-10 py-10 border-t-4 border-gray-300">
                <div class="flex flex-wrap justify-center ">
                  <div class="w-full lg:w-9/12 px-4 ">
                    <h3 class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2 text-center">
                      Events Created
                    </h3>
                    <?php
                      $post = new Teacher_Events($connection, $userLoggedIn);
                      $post->profile_events();
                    ?>
                  <div class="text-center">
                    <a href="#pablo" class="font-normal text-blue-600 "
                      >View All</a
                    >
                  </div> 
                  </div>
                </div>
              </div>
              <div class="mt-10 py-10 border-t border-gray-200">
                <div class="flex flex-wrap justify-center">
                  <div class="w-full lg:w-9/12 px-4">
                    <h3 class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2 text-center">
                      Events Attended
                    </h3>
                    <?php
                      $post = new Teacher_Events($connection, $userLoggedIn);
                      $post->attended_events();
                    ?>
                    <div class="text-center">
                    <a href="#pablo" class="font-normal text-blue-600 "
                      >View All</a
                    >
                  </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

