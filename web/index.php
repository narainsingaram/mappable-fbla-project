<?php
include("../template/navbar.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize variables
$search_query = isset($_GET['search_query']) ? mysqli_real_escape_string($connection, $_GET['search_query']) : "";
$search_results = null;

// Handle search
if (!empty($search_query)) {
  $query = "SELECT * FROM teacher_events WHERE title LIKE '%$search_query%' OR description LIKE '%$search_query%'";
  $search_results = mysqli_query($connection, $query);

  if (!$search_results) {
    die("Database query failed: " . mysqli_error($connection)); // Handle query failure
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body>
  <header aria-label="Page Header" class="bg-blue-800 mx-8 mt-4 rounded-xl">
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
      <div class="my-6">
        <h1 class="font-bold text-blue-50 text-4xl">
          Welcome Back, <?php echo "<a href='profile.php?profile_username=$userLoggedIn' class='text-blue-200'>$first_name</a>"; ?>
        </h1>
        <p class="mt-1.5 text-sm text-blue-100">
          Explore your school & community's events created by your teachers and administrators. 🚀
        </p>
      </div>
    </div>
  </header>

  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8 flex">
    <div class="w-1/2 p-5">
      <form action="index.php" method="GET" class="mt-4">
        <input type="text" name="search_query" class="px-4 py-2 border rounded-md" placeholder="Search events..."
          value="<?php echo htmlspecialchars($search_query); ?>" required>
        <select name="filter_type" class="px-4 py-2 border rounded-md ml-2">
          <option value="">Filter by Type</option>
          <option value="Extracurricular">Extracurricular</option>
          <option value="Academic">Academic</option>
          <!-- Add more options based on your event types -->
        </select>
        <button type="submit"
          class="inline-flex items-center py-2 px-4 text-sm font-medium text-blue-500 bg-blue-200/60 hover:bg-blue-300 rounded-xl">Search</button>
      </form>

      <div class="mt-4">
        <?php
        if (!empty($search_query) && mysqli_num_rows($search_results) > 0) {
          echo "<h2 class='text-xl font-bold mb-4'>Search Results for \"$search_query\"</h2>";
          while ($row = mysqli_fetch_assoc($search_results)) {
            echo "<div class='p-4 mb-4 bg-white rounded-lg shadow-md'>";
            echo "<h3 class='text-lg font-semibold'>{$row['title']}</h3>";
            echo "<p class='text-gray-700'>{$row['description']}</p>";
            echo "<p class='text-sm text-gray-500'>Date: {$row['date']}</p>";
            echo "<p class='text-sm text-gray-500'>Type: {$row['type']}</p>";
            echo "</div>";
          }
        } else {
          echo "<h2 class='text-xl font-bold mb-4'>Events</h2>";
          // Display default events or other content if no search query
          $post->live_events(); // Example of displaying live events
          $post->load_regular_feed("home"); // Example of loading regular feed
        }
        ?>
      </div>
    </div>

    <div class="w-1/2 p-5">
      <div class="p-6 shadow-lg bg-white rounded-2xl sm:p-8">
        <div class="flex justify-between items-center mb-4">
          <h5 class="text-2xl font-semibold text-gray-900">Activity</h5>
        </div>
        <div class="flow-root">
          <ul role="list" class="divide-y divide-gray-200">
            <?php
            $post->load_requested_feed(); // Example of loading requested feed
            ?>
          </ul>
        </div>
      </div>
      <div class="mt-8">
        <h1 class="font-bold text-gray-900 text-2xl mb-4 mx-4">Organizations</h1>
        <?php
        $space->load_space_div(); // Example of loading space division
        ?>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>

</html>
