<?php 
include("../template/web_defaults.php");
include("../template/navbar.php");
include("../includes/operators/reward_operator.php");

$sql = "SELECT username, points
        FROM users
        ORDER BY points DESC
        LIMIT 4";
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
            <form class='inline' method='POST' action='shop.php'>
              <input name='reward_value' type='hidden' value='1st_place'></input>
              <button name='reward_submit' type='submit' class='btn bg-blue-300 border-none text-black hover:text-white capitalize float-right'>Claim</button>
            </form>
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
            <form class='inline' method='POST' action='shop.php'>
              <input name='reward_value' type='hidden' value='1st_place'></input>
              <button name='reward_submit' type='submit' class='btn bg-blue-300 border-none text-black hover:text-white capitalize float-right'>Claim</button>
            </form>
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
            <form class='inline' method='POST' action='shop.php'>
              <input name='reward_value' type='hidden' value='1st_place'></input>
              <button name='reward_submit' type='submit' class='btn bg-blue-300 border-none text-black hover:text-white capitalize float-right'>Claim</button>
            </form>
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
              <p class="text-sm font-medium text-blue-500 dark:text-blue-400">Rewards</p>
              <h1 class="mt-3 text-2xl font-semibold text-gray-800 dark:text-white md:text-3xl">No Rewards to Claim Here</h1>
              <p class="mt-4 text-gray-500 dark:text-gray-400">Sorry, the page you are looking for doesn't exist or has been moved.</p>

              <div class="flex items-center mt-6 gap-x-3">
                  <button onclick="history.back()" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                      </svg>

                      <span>Go Back</span>
                  </button>

                  <a href='index.php' class="w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                      Take Me Home
                  </a>
              </div>
          </div>
      </div>
  </section>
EOT;;
}

echo $rank_content;

if(isset($_POST['reward_submit'])) {
  $_POST['reward_value'] = $reward_value;
}



