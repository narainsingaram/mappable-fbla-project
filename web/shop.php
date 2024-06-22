<?php
include("../template/navbar.php");

// Function to fetch rewards from database
function fetchRewards($connection) {
    $sql = "SELECT * FROM rewards";
    $result = mysqli_query($connection, $sql);
    $rewards = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rewards[] = $row;
    }
    return $rewards;
}

// Fetch rewards
$rewards = fetchRewards($connection);

// Handle reward purchase
if (isset($_POST['reward_submit'])) {
    $reward_id = $_POST['reward_value'];
    
    // Fetch reward details
    $sql = "SELECT * FROM rewards WHERE reward_id = '$reward_id'";
    $result = mysqli_query($connection, $sql);
    $reward = mysqli_fetch_assoc($result);
    
    // Check if user has enough points to purchase
    $points_required = $reward['reward_points_cost'];
    $user_points = fetchUserPoints($connection, $userLoggedIn); // Assuming $userLoggedIn is set elsewhere
    
    if ($user_points >= $points_required) {
        // Generate unique 32-letter code
        $unique_code = generateUniqueCode();
        
        // Update rewards table with the generated code and increment claim_count
        $update_sql = "UPDATE rewards SET reward_code = '$unique_code', claim_count = claim_count + 1 WHERE reward_id = '$reward_id'";
        mysqli_query($connection, $update_sql);
        
        // Deduct points from user
        $deduct_points_sql = "UPDATE users SET points = points - $points_required WHERE username = '$userLoggedIn'";
        mysqli_query($connection, $deduct_points_sql);
        
        // Insert into claimed_reward table
        $insert_claimed_sql = "INSERT INTO claimed_reward (user_id, reward_id, reward_code) VALUES ('$userLoggedIn', '$reward_id', '$unique_code')";
        mysqli_query($connection, $insert_claimed_sql);
        
        // Redirect to a success page with unique code
        header("Location: shop.php?claim_success=$unique_code");
        exit(); // Ensure no further code execution after redirect
    } else {
        echo "<p>Sorry, you do not have enough points to claim this reward.</p>";
    }
}

// Function to generate a unique 32-letter code
function generateUniqueCode() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    $length = 32;
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

// Function to fetch user points
function fetchUserPoints($connection, $userLoggedIn) {
    $sql = "SELECT points FROM users WHERE username = '$userLoggedIn'";
    $result = mysqli_query($connection, $sql);
    $user = mysqli_fetch_assoc($result);
    return $user['points'];
}

// Display rewards
foreach ($rewards as $reward) {
    $imageTag = $reward['image'] ? "<img src='../assets/images/{$reward['image']}' alt='{$reward['reward_name']}' class='reward-image'>" : '';
    echo <<<EOT
    <header aria-label="Page Header" class="my-10 bg-slate-200 mx-8 rounded-xl">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="my-6">
                <h1 class="font-bold text-gray-900 text-4xl">
                    {$reward['reward_name']}
                </h1>
                $imageTag
                <form class='inline' method='POST' action='shop.php'>
                    <input name='reward_value' type='hidden' value='{$reward['reward_id']}'></input>
                    <button name='reward_submit' type='submit' class='btn bg-blue-300 border-none text-black hover:text-white capitalize float-right'>Buy ({$reward['reward_points_cost']} points)</button>
                </form>
                <p class="mt-1.5 text-sm text-gray-500">
                    {$reward['reward_description']}
                </p>
            </div>
        </div>
    </header>
    EOT;
}

// Example of handling cases where no rewards are available
if (empty($rewards)) {
    echo <<<EOT
    <section class="bg-white dark:bg-gray-900">
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
    EOT;
}

?>
