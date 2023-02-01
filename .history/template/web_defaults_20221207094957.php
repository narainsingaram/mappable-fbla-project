<?php
require "../includes/configs/configurations.php";
include("../includes/classes/User_Info.php");
include("../includes/classes/Teacher_Events.php");
include("../includes/classes/Spaces.php");
include("../includes/classes/Notify.php");

if(isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($connection, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_assoc($user_details_query);
}

else {
    header("Location: ../registration_form.php");
}

$auth_query = mysqli_query($connection, "SELECT * FROM authentifications WHERE requester='$userLoggedIn'");
$auth = mysqli_fetch_assoc($auth_query);

$select_events = mysqli_query($connection, "SELECT * FROM teacher_events WHERE user_deleted='no'");
$event = mysqli_fetch_assoc($select_events);

$check_event_rows_query = mysqli_query($connection,"SELECT COUNT(*) as num_event_rows FROM teacher_events");

$fetch_event_rows = mysqli_fetch_assoc($check_event_rows_query);

if($fetch_event_rows['num_event_rows'] > 0) {
    $event_id = $event['event_id'];
}


$id = $user['id'];
$first_name = $user['first_name'];
$last_name = $user['last_name'];
$username = $user['username'];
$points = $user['points'];
$gems = $user['gems'];
$experience = $user['experience'];
$levels = $user['levels'];
$grade = $user['grade'];
$school = $user['school'];


$profile_symbol = $first_name[0]. "" . $last_name[0];
$full_name = $first_name. " " . $last_name;

$color_array = array("red", "orange", "amber", "yellow", "lime", "green", "emerald", "teal", "cyan", "sky", "blue", "indigo", "violet", "purple", "fuchsia", "pink", "rose");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mappable</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/html/styles.css">


    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.41.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.tailwindcss.com"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=<?php echo $user['font']; ?>:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

* {
    font-family: '<?php echo $user['font']; ?>';
}
</style>

<body>


    <script type = "text/typescript" src='../index.ts'></script>
    <script type = "text/javascript" src="../assets\javascript\index.js"></script>
    <script type = "text/javascript" src="../assets\ajax\message_submit.js"></script>
    <script type='text/javascript' src='../assets/js/toggle_notification.js'></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vuesax@4.0.1-alpha.16/dist/vuesax.min.js"></script>
</body>
</html>