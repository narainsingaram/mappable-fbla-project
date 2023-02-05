<?php 
include("../template/web_defaults.php");
include("../template/navbar.php");
include("../includes/operators/reward_operator.php");

$sql = "SELECT username, points
        FROM users
        ORDER BY points DESC
        LIMIT 3";
$result = mysqli_query($connection, $sql);

$rank = 0;

while($row = mysqli_fetch_assoc($result)) {
  $rank++;
    if ($row['username'] == $userLoggedIn) {
      break;
  }
}

$rank_content = '';

if($rank == 1) {
  $rank_content .=<<<EOT
      <header aria-label="Page Header" class="my-10 bg-slate-200 mx-8 rounded-xl">
      <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="my-6">
          <h1 class="font-bold text-gray-900 text-4xl">
            Claim Your T-Shirt Reward
          </h1>
            <button class='btn capitalize float-right'>Claim</button>
          <p class="mt-1.5 text-sm text-gray-500">
            Because you are first place in the points leaderboard for you school, you have the ability to claim a T-Shirt prize.
          </p>
        </div>
      </div>

    </header>
  EOT;;
}

else if ($rank == 2) {
  $rank_content .=<<<EOT
      <header aria-label="Page Header" class="my-10 bg-slate-200 mx-8 rounded-xl">
      <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="my-6">
          <h1 class="font-bold text-gray-900 text-4xl">
            Claim Your Slushie Reward
          </h1>
            <button class='btn capitalize float-right'>Claim</button>
          <p class="mt-1.5 text-sm text-gray-500">
            Because you are second place in the points leaderboard for you school, you have the ability to claim a Slushie prize.
          </p>
        </div>
      </div>

    </header>
  EOT;;
}

else if ($rank == 3) {
  $rank_content .=<<<EOT
      <header aria-label="Page Header" class="my-10 bg-slate-200 mx-8 rounded-xl">
      <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="my-6">
          <h1 class="font-bold text-gray-900 text-4xl">
            Claim Your Notebook Reward
          </h1>
            <button class='btn capitalize float-right'>Claim</button>
          <p class="mt-1.5 text-sm text-gray-500">
            Because you are second place in the points leaderboard for you school, you have the ability to claim a Notebook prize.
          </p>
        </div>
      </div>

    </header>
  EOT;;
}

echo $rank_content;

?>




<div id="content" class='bg-gray-50'>

<section class="bg-gray-900 text-white">
  <div class="max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="max-w-xl">
      <h2 class="text-3xl font-bold sm:text-4xl">Claim Your Rewards Here</h2>

      <p class="mt-4 text-gray-300">
        If you are in the Top 3 for having the most points within West Forsyth High School. You can claim your rewards here.
      </p>
    </div>

    <div
      class="mt-8 grid grid-cols-1 gap-8 md:mt-16 md:grid-cols-2 md:gap-12 lg:grid-cols-3"
    >
    <div class="flex items-start">
        <span class="flex-shrink-0 rounded-lg bg-gray-800 p-4">
          <svg
            class="h-5 w-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
            <path
              d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
            ></path>
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
            ></path>
          </svg>
        </span>

        <div class="ml-4">
          <h2 class="text-lg font-bold">T-Shirt</h2>

          <p class="mt-1 text-sm text-gray-300">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
            cumque tempore est ab possimus quisquam reiciendis tempora animi!
            Quaerat, saepe?
          </p>
          <button class='bg-white text-black px-4 py-2 rounded-xl my-2'>Claim</button>
        </div>
      </div>

      <div class="flex items-start">
        <span class="flex-shrink-0 rounded-lg bg-gray-800 p-4">
          <svg
            class="h-5 w-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
            <path
              d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
            ></path>
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
            ></path>
          </svg>
        </span>

        <div class="ml-4">
          <h2 class="text-lg font-bold">Lorem, ipsum dolor.</h2>

          <p class="mt-1 text-sm text-gray-300">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
            cumque tempore est ab possimus quisquam reiciendis tempora animi!
            Quaerat, saepe?
          </p>
          <button class='bg-white text-black px-4 py-2 rounded-xl my-2'>Claim</button>
        </div>
      </div>

      <div class="flex items-start">
        <span class="flex-shrink-0 rounded-lg bg-gray-800 p-4">
          <svg
            class="h-5 w-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
            <path
              d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
            ></path>
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
            ></path>
          </svg>
        </span>

        <div class="ml-4">
          <h2 class="text-lg font-bold">Lorem, ipsum dolor.</h2>

          <p class="mt-1 text-sm text-gray-300">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
            cumque tempore est ab possimus quisquam reiciendis tempora animi!
            Quaerat, saepe?
          </p>
          <button class='bg-white text-black px-4 py-2 rounded-xl my-2'>Claim</button>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
    <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
      The top <span class='font-semibold text-blue-600'> three </span> students from your highschool will be selected for respective <span class='font-semibold text-blue-600'>prizes!</span>
    </h2>
    <p class="text-base text-gray-600 md:text-lg">
    See information about the prizes below, and head to the <a href="dashboard.php" class='font-semibold text-blue-600'> dashboard </a> to see if you're in the top 3!.
    </p>
  </div>
  <div class="grid gap-5 mb-8 md:grid-cols-2 lg:grid-cols-3">
  <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
      <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
      <i class='bx bxs-t-shirt text-2xl'></i>
      </div>
      <h6 class="mb-2 font-semibold leading-5">First Place Prize</h6>
      <p class="text-sm text-gray-900">
        The First Place Prize is a <?php echo $school ?> T-Shirt. The person from your school with the most points will be awarded this prize. 
      </p>
    </div>
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
      <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
        <i class="uil uil-coffee text-2xl"></i>
      </div>
      <h6 class="mb-2 font-semibold leading-5">Second Place Prize</h6>
      <p class="text-sm text-gray-900">
        The Second Place Prize is a free slushie from your school store. The person from your school with the second most points will be awarded this prize. 
      </p>
    </div>
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2">
      <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
        <i class="uil uil-book text-2xl"></i>
      </div>
      <h5 class="mb-2 font-semibold leading-5">Third Place Prize</h5>
      <p class="text-sm text-gray-900">
        The Third Place Prize is a free notebook of your choosing. The person from your school with the third most points will be awarded this prize. 
      </p>
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