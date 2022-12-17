<?php
include("../template/web_defaults.php");
include("../template/navbar.php");


$profile_symbol = substr($first_name, 0, 1) . substr($last_name, 0, 1);
$full_name = "$first_name $last_name";

$id = (isset($_GET['id'])) ? $_GET['id'] : 0;

if(isset($_GET['profile_username'])) {
    $username = $_GET['profile_username'];
    $profile_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $profile_list = mysqli_fetch_array($profile_details_query);
}
?>



      <section class="relative block" style="height: 500px;">
        <div
          class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("https://eoimages.gsfc.nasa.gov/images/imagerecords/87000/87843/tetons_photo_2015_lrg.jpg");'
        >
          <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-50 bg-black"
          ></span>
        </div>
        <div
          class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
          style="height: 70px;"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-gray-300 fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
      </section>
      <section class="relative py-16 bg-gray-300">
        <div class="container mx-auto px-4">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full shadow-xl rounded-lg -mt-64"
          >
            <div class="px-6">
              <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-4/12 px-4 lg:order-2 flex justify-center">
                  <div class='-mt-24 shadow-[rgba(7,_65,_50,_0.1)_0px_9px_100px] inline-flex overflow-hidden relative justify-center items-center w-48 h-48 text-8xl bg-slate-200 rounded-full'>
                    <span class='font-semibold text-gray-600'><?php echo $first_name[0] . $last_name[0] ?></span>
                  </div>
                </div>
                <div
                  class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"
                >
                  <div class="py-6 px-3 mt-32 sm:mt-0">
                    <button
                      class="bg-blue-600 active:bg-blue-700 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                      type="button"
                      style="transition: all 0.15s ease 0s;"
                    >
                      Connect
                    </button>
                  </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 lg:order-1">
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
                  class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2 text-center"
                >
                  <?php echo $first_name . ' ' . $last_name; ?>
                </h3>
                <div
                  class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase text-center"
                >
                  <i
                    class="fas fa-map-marker-alt mr-2 text-lg text-gray-500 text-center"
                  ></i>
                  Cumming, Georgia
                </div>
                <div class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase text-center">
                  <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i
                  ><?php echo $position ?> at <?php echo $school ?>
                </div>
              </div>
              <div class="mt-10 py-10 border-t-4 border-gray-300">
                <div class="flex flex-wrap justify-center ">
                  <div class="w-full lg:w-9/12 px-4 ">
                    <h3 class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2 text-center">
                      Events Created
                    </h3>
                    <?php
                      $post = new Teacher_Events($con, $userLoggedIn);
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
                      $post = new Teacher_Events($con, $userLoggedIn);
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

