<?php
include("../template/navbar.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if event_id is provided in the URL
if (isset($_GET['event_id'])) {
    $event_id = mysqli_real_escape_string($connection, $_GET['event_id']);
    
    // Query to fetch event details from database based on event_id
    $event_query = mysqli_query($connection, "SELECT * FROM teacher_events WHERE event_id = '$event_id'");
    
    if (mysqli_num_rows($event_query) > 0) {
        $event_row = mysqli_fetch_assoc($event_query);
        
        // Extract event details
        $title = $event_row['title'];
        $type = $event_row['type'];
        $date = date_create($event_row['date']);
        $start_time = $event_row['start']; 
        $end_time = $event_row['end']; 
        $description = $event_row['description'];
        $added_by = $event_row['added_by'];
        $date_added = $event_row['date_added'];

        // You can continue fetching other necessary details like image URL, etc.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> Details</title>
    <!-- Include any necessary CSS files -->
    <!-- Example: <link rel="stylesheet" href="css/style.css"> -->
</head>
<body><div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4"><?php echo $title; ?> Details</h1>
    <div class="bg-white shadow-md rounded-lg px-6 py-4">
        <p class="mb-2"><strong>Type:</strong> <?php echo $type; ?></p>
        <p class="mb-2"><strong>Date:</strong> <?php echo date_format($date,'m/d/Y'); ?></p>
        <p class="mb-2"><strong>Start Time:</strong> <?php echo $start_time; ?></p>
        <p class="mb-2"><strong>End Time:</strong> <?php echo $end_time; ?></p>
        <p class="mb-2"><strong>Description:</strong> <?php echo $description; ?></p>
        <p class="mb-2"><strong>Added By:</strong> <?php echo $added_by; ?></p>
        <p class="mb-2"><strong>Date Added:</strong> <?php echo $date_added; ?></p>
        <!-- Optionally, include buttons or links for actions like registering for the event, etc. -->
        <!-- Example: -->
        <!-- <a href="#" class="btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mt-4 inline-block">Register</a> -->
    </div>
</div>

</body>
</html>

<?php
    } else {
        // Handle case where event_id does not match any event
        echo "Event not found.";
    }
} else {
    // Handle case where event_id is not provided in the URL
    echo "Event ID not specified.";
}
?>
