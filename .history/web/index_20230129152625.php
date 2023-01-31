<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

if(isset($_POST['user_submit'])) {
  $post = new Teacher_Events($connection, $userLoggedIn);
  $post->event_feed($_POST['user_title'],$_POST['user_type'], $_POST['user_date'], $_POST['user_start'], $_POST['user_end'], $_POST['user_desc'], $filename, 'none'); //do submitEvent function in Post_Events.php
header("Location: index.php");
}
?>

<!--
  This component uses @tailwindcss/forms

  yarn add @tailwindcss/forms
  npm install @tailwindcss/forms

  plugins: [require('@tailwindcss/forms')]
-->

<header aria-label="Page Header" class="bg-gray-50">
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="flex items-center sm:justify-between sm:gap-4">
      <div class="relative hidden sm:block">
        <label class="sr-only" for="search"> Search </label>

        <input
          class="h-10 w-full rounded-lg border-none bg-white pl-4 pr-10 text-sm shadow-sm sm:w-56"
          id="search"
          type="search"
          placeholder="Search website..."
        />

        <button
          type="button"
          class="absolute top-1/2 right-1 -translate-y-1/2 rounded-md bg-gray-50 p-2 text-gray-600 transition hover:text-gray-700"
        >
          <span class="sr-only">Submut Search</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
            />
          </svg>
        </button>
      </div>

      <div
        class="flex flex-1 items-center justify-between gap-8 sm:justify-end"
      >
        <div class="flex gap-4">
          <button
            type="button"
            class="block shrink-0 rounded-lg bg-white p-2.5 text-gray-600 shadow-sm hover:text-gray-700 sm:hidden"
          >
            <span class="sr-only">Search</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
              />
            </svg>
          </button>

          <a
            href="#"
            class="block shrink-0 rounded-lg bg-white p-2.5 text-gray-600 shadow-sm hover:text-gray-700"
          >
            <span class="sr-only">Academy</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path d="M12 14l9-5-9-5-9 5 9 5z" />
              <path
                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
              />
            </svg>
          </a>

          <a
            href="#"
            class="block shrink-0 rounded-lg bg-white p-2.5 text-gray-600 shadow-sm hover:text-gray-700"
          >
            <span class="sr-only">Notifications</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
              />
            </svg>
          </a>
        </div>

        <button
          type="button"
          class="group flex shrink-0 items-center rounded-lg transition"
        >
          <span class="sr-only">Menu</span>
          <img
            alt="Man"
            src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
            class="h-10 w-10 rounded-full object-cover"
          />

          <p class="ml-2 hidden text-left text-xs sm:block">
            <strong class="block font-medium">Eric Frusciante</strong>

            <span class="text-gray-500"> eric@frusciante.com </span>
          </p>

          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="ml-4 hidden h-5 w-5 text-gray-500 transition group-hover:text-gray-700 sm:block"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"
            />
          </svg>
        </button>
      </div>
    </div>

    <div class="mt-8">
      <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
        Welcome Back, Barry!
      </h1>

      <p class="mt-1.5 text-sm text-gray-500">
        Your website has seen a 52% increase in traffic in the last month. Keep
        it up! 🚀
      </p>
    </div>
  </div>
</header>


<section id='section' class="flex mx-auto max-w-screen-xl px-10 py-8 sm:px-6 lg:px-8">
<?php
if(isset($_POST['getting_points'])){
  $new_points = $points + 20;
  $new_gems = $gems + 5;
  $experience_growth = $experience * 1.1; 
  $levels = floor($experience_growth / 100); 
  $percentage_growth = $experience_growth - ($levels * 100); 
  mysqli_query($connection,"UPDATE users SET points = '$new_points', gems = '$new_gems', experience = '$experience_growth', levels = '$levels', percentage_growth = '$percentage_growth' WHERE id = '$id'"); 
  header("Location: index.php");
}
 if(isset($_POST['create_space'])) {
  mysqli_query($connection, "INSERT INTO spaces VALUES(NULL, '{$_POST['space_name']}', '{$_POST['space_bio']}', '$userLoggedIn', ',', ',', 'no')");
  header("Location: index.php");
}
?>

<div class="w-1/2 p-5">
  <form action="index.php" method='POST'>
    <button name='getting_points' class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-blue-500 bg-blue-500 cursor-pointer rounded-xl' type="submit">Get Points</button>
  </form>

<input type="checkbox" id="create_space" class="modal-toggle" />
<div class="modal">
  <div class="modal-box bg-white relative">
    <label for="my-modal-5" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Create a Space</h3>
    <form class='inline' action="index.php" method='POST'>
        <input type="text" name="space_name">
        <input type="text" name="space_bio">
        <button name='create_space' class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-blue-500 bg-blue-200/60 cursor-pointer rounded-xl' type="submit">Confirm</button>
    </form>
  </div>
</div>




<h1 class='inline text-xl font-bold leading-none text-gray-900'>
  <svg class='inline' xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"><path opacity=".4" d="M2 9.75c-.41 0-.75-.34-.75-.75V6.5c0-2.9 2.36-5.25 5.25-5.25H9c.41 0 .75.34.75.75s-.34.75-.75.75H6.5c-2.07 0-3.75 1.68-3.75 3.75V9c0 .41-.34.75-.75.75Z" fill="#3b82f6"></path><path d="M22 9.75c-.41 0-.75-.34-.75-.75V6.5c0-2.07-1.68-3.75-3.75-3.75H15c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h2.5c2.89 0 5.25 2.35 5.25 5.25V9c0 .41-.34.75-.75.75Z" fill="#3b82f6"></path><path opacity=".4" d="M17.5 22.75H16c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h1.5c2.07 0 3.75-1.68 3.75-3.75V16c0-.41.34-.75.75-.75s.75.34.75.75v1.5c0 2.9-2.36 5.25-5.25 5.25Z" fill="#3b82f6"></path><path d="M9 22.75H6.5c-2.89 0-5.25-2.35-5.25-5.25V15c0-.41.34-.75.75-.75s.75.34.75.75v2.5c0 2.07 1.68 3.75 3.75 3.75H9c.41 0 .75.34.75.75s-.34.75-.75.75ZM8.501 11.381a2.88 2.88 0 1 0 0-5.76 2.88 2.88 0 0 0 0 5.76Z" fill="#3b82f6"></path><path opacity=".4" d="M7.501 18.381a1.88 1.88 0 1 0 0-3.76 1.88 1.88 0 0 0 0 3.76ZM16.501 9.381a1.88 1.88 0 1 0 0-3.76 1.88 1.88 0 0 0 0 3.76Z" fill="#3b82f6"></path><path d="M15.501 18.381a2.88 2.88 0 1 0 0-5.76 2.88 2.88 0 0 0 0 5.76Z" fill="#3b82f6"></path></svg>
Spaces
</h1>
<?php

?>


<h1 class="text-4xl font-semibold">Welcome, <?php echo" <a href='profile.php?profile_username=$userLoggedIn' class='text-blue-600'>$full_name</a>";?></h1>
<p>Explore your school & community's events created by your teachers and administrators.</p>
<?php
  $web = new Web();
  $space = new Spaces($connection, $userLoggedIn);
  $post = new Teacher_Events($connection, $userLoggedIn);
  $web->disp_evt_mo();
  $space->load_space_div();
  $post->live_events();
  $post->load_regular_feed();
?>
</div>



<div class="w-1/2 p-5">

<!-- <form id="myForm" method="POST">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email"><br><br>
  <input type="submit" value="Submit">
</form>  -->
<!-- 
<script>
  function submitForm() {
  // Get the form data
  var name = $("#name").val();
  var email = $("#email").val();

  if (name === "" || email === "") {
    alert("Please fill out all fields.");
    return; // Return early to exit the function
  }

  // Make an AJAX request
  $.ajax({
    url: "index.php",
    type: "POST",
    data: { name: name, email: email },
    success: function(response) {
      console.log("Form submitted successfully!");
    },
    error: function(xhr, status, error) {
      console.log("There was an error submitting the form.");
    }
  });
}

$("#myForm").submit(function(event) {
  event.preventDefault(); // Prevent the form from resetting and the page from refreshing
  event.returnValue = false; // Stop form from submitting when page 
  submitForm(); // Call the function to submit the form
});



</script> -->


<div class="p-4 w-full shadow-[rgba(7,_65,_50,_0.1)_0px_9px_100px] bg-white rounded-2xl sm:p-8">
    <div class="flex justify-between items-center mb-2">
        <h5 class="text-xl font-bold leading-none text-gray-900">Activity</h5>
   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200">
            <?php
            $post->load_requested_feed();
          ?>
        </ul>
   </div>
  </div>
</div>
  </main>
    </section>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>  


