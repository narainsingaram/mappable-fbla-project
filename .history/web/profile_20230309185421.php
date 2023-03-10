<?php
include("../template/web_defaults.php");
include("../template/navbar.php");



$id = (isset($_GET['id'])) ? $_GET['id'] : 0;

if(isset($_GET['profile_username'])) {
    $username = $_GET['profile_username'];
    $profile_details_query = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
    $profile_list = mysqli_fetch_array($profile_details_query);
}

// Getting events attended by user to display in indiviual data
$events_attended = mysqli_query(
  $connection,
  "SELECT * FROM authentifications
  WHERE accepted = 'yes'"
  )
?>

      <section class="relative block"  style="height: 500px;">
        <div
          class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("https://eoimages.gsfc.nasa.gov/images/imagerecords/87000/87843/tetons_photo_2015_lrg.jpg"); '
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
            class="relative flex flex-col bg-white w-full shadow-[rgba(7,_65,_50,_0.1) rounded-2xl -mt-64"
          >
            <div class="px-6">
              <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-6/12 px-4 lg:order-1 flex justify-center">
                  <div class='-mt-24 shadow-[rgba(7,_65,_50,_0.1)_0px_9px_100px] inline-flex overflow-hidden relative justify-center items-center w-48 h-48 text-8xl bg-slate-200 rounded-full'>
                    <div class='relative z-10 font-semibold text-gray-600'>
                      
                    <?php 
                      $name_parts = explode("_", "narain_singaram");

                      // Get the first character of the first name and the last name
                      $first_initial = substr($name_parts[0], 0, 1);
                      $last_initial = substr($name_parts[1], 0, 1);
              
                      // Concatenate the two initials
                      $added_by_initials = $first_initial . $last_initial;
                      $cap_added_by_initials = strtoupper($added_by_initials);

                      echo $cap_added_by_initials;
                     ?>
                  </div>
                    <sup class='absolute bottom-0 bg-blue-500 text-blue-100 text-xs px-3 py-2 rounded-full h-7'><?php echo $profile_list['position']; ?></sup>
                  </div>
                </div>
                <div class="w-full lg:w-6/12 px-4 lg:order-2">
                  <div class="flex justify-center py-4 lg:pt-4 pt-8">
                    <div class="bg-slate-100 rounded-xl px-4 py-6  mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                        >10</span
                      ><span class="text-sm text-gray-500">Attended</span>
                    </div>
                    <div class="bg-slate-100 rounded-xl px-4 py-6  mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                        ><?php echo $points ?> </span
                      ><span class="text-sm text-gray-500">Points</span>
                    </div>
                    <div class="bg-slate-100 rounded-xl px-4 py-6  lg:mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                        ><?php echo $gems ?></span
                      ><span class="text-sm text-gray-500">Gems</span>
                    </div>
                  </div>
                </div>
              </div>
              <div >

              </div>
              <div class="mt-0 py-10">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

