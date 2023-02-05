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

if($rank == 0) {
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

else if ($rank > 3) {
    $rank_content .= <<<EOT
    <section class="bg-white dark:bg-gray-900 ">
      <div class="container flex items-center min-h-screen px-6 py-12 mx-auto">
          <div>
              <p class="text-sm font-medium text-blue-500 dark:text-blue-400">404 error</p>
              <h1 class="mt-3 text-2xl font-semibold text-gray-800 dark:text-white md:text-3xl">We can’t find that page</h1>
              <p class="mt-4 text-gray-500 dark:text-gray-400">Sorry, the page you are looking for doesn't exist or has been moved.</p>

              <div class="flex items-center mt-6 gap-x-3">
                  <button class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                      </svg>

                      <span>Go back</span>
                  </button>

                  <button class="w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                      Take me home
                  </button>
              </div>
          </div>
      </div>
  </section>
EOT;;
}

echo $rank_content;

?>




<div id="content" class='bg-gray-50'>

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