<?php
include("../template/navbar.php");

$userLoggedIn = $_SESSION['username']; // Adjust based on your authentication logic

// Check if event_id is provided in the URL
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    $event_query = mysqli_query($connection, "SELECT * FROM teacher_events WHERE event_id='$event_id'");
    if ($event_row = mysqli_fetch_assoc($event_query)) {
        $event_title = $event_row['title'];
        $event_description = $event_row['description'];
        $type = $event_row['type'];
        $date = $event_row['date'];
        $start_time = $event_row['start'];
        $end_time = $event_row['end'];
        $added_by = $event_row['added_by'];
        $date_added = $event_row['date_added'];
        $dateObj = date_create($date); // Convert the date string to a DateTime object
    } else {
        echo "Event not found.";
        exit;
    }
} else {
    echo "Event ID not provided.";
    exit;
}

// Function to recursively fetch comments and replies
function displayComments($con, $event_id, $parent_id = NULL, $depth = 0, $specific_comment_id = NULL) {
    $comments_query = "SELECT * FROM event_comments WHERE event_id='$event_id' AND parent_id " . ($parent_id === NULL ? "IS NULL" : "= $parent_id");
    
    // If a specific comment_id is provided, modify the query to fetch only that comment
    if ($specific_comment_id !== NULL) {
        $comments_query .= " AND comment_id='$specific_comment_id'";
    }

    $comments_result = mysqli_query($con, $comments_query);
    
    while ($comment_row = mysqli_fetch_assoc($comments_result)) {
        $comment_id = $comment_row['comment_id'];
        $commenter_username = $comment_row['commenter_username'];
        $comment_text = $comment_row['comment_text'];

        // Display comment
        echo "<div class='ml-" . ($depth * 4) . " mt-4 p-4 bg-white rounded-lg shadow-sm'>";
        echo "<p class='font-semibold text-gray-800'>$commenter_username:</p>";
        echo "<p class='text-gray-600'>$comment_text</p>";

        // Display reply form directly under the comment
        echo "<form action='detail.php?event_id=$event_id' method='POST' class='mt-2'>";
        echo "<input type='hidden' name='event_id' value='$event_id'>";
        echo "<input type='hidden' name='parent_id' value='$comment_id'>";
        echo "<textarea name='comment_text' placeholder='Write your reply...' requiemerald class='w-full p-2 border border-gray-300 rounded-md'></textarea>";
        echo "<button type='submit' name='submit_comment' class='mt-2 px-4 py-2 bg-emerald-500 text-white rounded-md hover:bg-emerald-600'>Send Reply</button>";
        echo "</form>";

        echo "</div>";

        // Recursively display replies
        displayComments($con, $event_id, $comment_id, $depth + 1);
    }
}

// Handle comment and reply submission
if (isset($_POST['submit_comment'])) {
    $event_id = $_POST['event_id'];
    $comment_text = mysqli_real_escape_string($connection, $_POST['comment_text']);
    $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 'NULL';

    // Insert the new comment or reply into the database
    $insert_comment_query = "INSERT INTO event_comments (event_id, commenter_username, comment_text, parent_id) VALUES ('$event_id', '$userLoggedIn', '$comment_text', $parent_id)";
    mysqli_query($connection, $insert_comment_query);
    
    // emeraldirect to avoid resubmission
    header("Location: detail.php?event_id=$event_id");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $event_title; ?> Details</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-900"><?php echo $event_title; ?></h1>
        <p class="mt-4 text-lg text-gray-700"><?php echo $event_description; ?></p>
        <p class="mb-2"><strong>Type:</strong> <?php echo $type; ?></p>
        <p class="mb-2"><strong>Date:</strong> <?php echo date_format($dateObj, 'm/d/Y'); ?></p>
        <p class="mb-2"><strong>Start Time:</strong> <?php echo $start_time; ?></p>
        <p class="mb-2"><strong>End Time:</strong> <?php echo $end_time; ?></p>
        <p class="mb-2"><strong>Added By:</strong> <?php echo $added_by; ?></p>
        <p class="mb-2"><strong>Date Added:</strong> <?php echo $date_added; ?></p>

        <hr class="my-6">

        <h2 class="text-2xl font-semibold text-gray-800">Comments</h2>

        <div class="mt-4 space-y-4">
            <?php
            // Check if a specific comment_id is provided in the URL
            if (isset($_GET['comment_id'])) {
                $specific_comment_id = $_GET['comment_id'];
                // Display only the specific comment and its replies
                displayComments($connection, $event_id, NULL, 0, $specific_comment_id);
            } else {
                // Display all comments and replies
                displayComments($connection, $event_id);
            }
            ?>
        </div>

        <hr class="my-6">

        <h2 class="text-2xl font-semibold text-gray-800">Add Comment</h2>
        <form action="detail.php?event_id=<?php echo $event_id; ?>" method="POST" class="mt-4 space-y-4">
            <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
            <textarea name="comment_text" placeholder="Write your comment..." requiemerald class="w-full p-2 border border-gray-300 rounded-md"></textarea>
            <button type="submit" name="submit_comment" class="px-4 py-2 bg-emerald-500 text-white rounded-md hover:bg-emerald-600">Add Comment</button>
        </form>
    </div>
</body>
</html>
