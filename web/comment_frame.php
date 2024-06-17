<?php  
    include("../template/navbar.php");
?>


<html>
 <head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://kit.fontawesome.com/e1623e6969.js" crossorigin="anonymous"> </script>
 </head>
 <body class="comments-section-fully">
 
	<script>
		function toggle() {
			var element = document.getElementById("comment_section");

			if(element.style.display == "block") 
				element.style.display = "none";
			else 
				element.style.display = "block";
		}
	</script>

	<?php  
	//Get id of post
	if(isset($_GET['post_id'])) {
		$post_id = $_GET['post_id'];
	}

	$user_query=mysqli_query($con, "SELECT added_by, user_to FROM user_posts WHERE id='$post_id'");
    $row=mysqli_fetch_array($user_query);

	$posted_to = $row['added_by'];
	$user_to = $row['user_to'];

	if(isset($_POST['postComment' . $post_id])) {
		$post_body = $_POST['post_body'];
		$post_body = mysqli_escape_string($con, $post_body);
		$date_time_now = date("Y-m-d H:i:s");
		$insert_post= mysqli_query($con, "INSERT INTO comments VALUES ('','$post_body','$userLoggedIn','$posted_to','$date_time_now','no','$post_id')");

		if($posted_to != $userLoggedIn) {
			$notification = new Notification($con, $userLoggedIn);
			$notification->insertNotification($post_id, $posted_to, "comment");
		}

		if($user_to != 'none' && $user_to != $userLoggedIn){
			$notification = new Notification($con, $userLoggedIn);
			$notification->insertNotification($post_id, $user_to, "profile_comment");
		}

		$get_commenters = mysqli_query($con, "SELECT * FROM comments WHERE post_id='$post_id'");
		$notified_users = array();
		while($row = mysqli_fetch_array($get_commenters)) {
				if($row['posted_by'] != $posted_to && $row['posted_by'] != $user_to
				&& $row['posted_by'] != $userLoggedIn && !in_array($row['posted_by'], $notified_users)) {

					$notification = new Notification(con, $userLoggedIn);
					$notification->insertNotification($post_id, $row['posted_by'], "comment_non_owner");

					array_push($notified_users, $row['posted_by']);

				}
		}

		echo "<p class='comment-posted-notification'>Comment Posted! </p>";
	}
	?>

	
<form action="comment_frame.php?post_id=<?php echo $post_id; ?>"name="postComment<?php echo $post_id; ?>" method="POST">
    <label for="chat" class="sr-only">Your message</label>
    <div class="flex items-center px-3 py-2 rounded-lg bg-slate-100 my-4">
        <textarea name="post_body" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Your message..."></textarea>
			<button type="submit" name="postComment<?php echo $post_id; ?>" class="btn inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100">
				Comment
			</button>
    </div>
</form>


    <?php
        $get_comments = mysqli_query($con, "SELECT * FROM comments WHERE post_id='$post_id' ORDER BY id ASC");
        $count = mysqli_num_rows($get_comments);

        if ($count != 0) {

            while($comment = mysqli_fetch_array($get_comments)) {
                $comment_body = $comment['post_body'];
                $posted_to = $comment['posted_to'];
                $posted_by = $comment['posted_by'];
                $date_added = $comment['date_added'];
                $removed = $comment['removed'];

                 //Timeframe
					$date_time_now = date("Y-m-d H:i:s");
					$start_date = new DateTime($date_added); //Time of post
					$end_date = new DateTime($date_time_now); //Current time
					$interval = $start_date->diff($end_date); //Difference between dates 
					if($interval->y >= 1) {
						if($interval == 1)
							$time_message = $interval->y . " year ago"; //1 year ago
						else 
							$time_message = $interval->y . " years ago"; //1+ year ago
					}
					else if ($interval-> m >= 1) {
						if($interval->d == 0) {
							$days = " ago";
						}
						else if($interval->d == 1) {
							$days = $interval->d . " day ago";
						}
						else {
							$days = $interval->d . " days ago";
						}


						if($interval->m == 1) {
							$time_message = $interval->m . " month". $days;
						}
						else {
							$time_message = $interval->m . " months". $days;
						}

					}
					else if($interval->d >= 1) {
						if($interval->d == 1) {
							$time_message = "Yesterday";
						}
						else {
							$time_message = $interval->d . " days ago";
						}
					}
					else if($interval->h >= 1) {
						if($interval->h == 1) {
							$time_message = $interval->h . " hour ago";
						}
						else {
							$time_message = $interval->h . " hours ago";
						}
					}
					else if($interval->i >= 1) {
						if($interval->i == 1) {
							$time_message = $interval->i . " minute ago";
						}
						else {
							$time_message = $interval->i . " minutes ago";
						}
					}
					else {
						if($interval->s < 30) {
							$time_message = "Just now";
						}
						else {
							$time_message = $interval->s . " seconds ago";
						}
					}

                    $user_obj = new User($con, $posted_by);


                    ?>
                    
                    
                    <div class="comment_section">
                    <a href="<?php echo $posted_by; ?>" target="_parent"> <img src="<?php echo $user_obj->getProfilePic();?>" title="<?php echo $posted_by; ?>" style="float:left;" height="50"> </a>
                    <a href="<?php echo $posted_by; ?>" target="_parent"> <b> <?php echo $user_obj->getFirstAndLastName(); ?> </b></a>
                    &nbsp;  <span class='time_num_info_comment_section'> <?php echo $time_message?> </span> <?php echo "<br>" . $comment_body; ?> 
                </div>
                
                    <?php
            }
            

        }

        else {
            echo "<center> <img class='comment-icon-image' src='assets\images\be-first-comments.png'> <br><br> Be the first one to comment! </center>";

        }
    
    ?>
    
 
 </body>
 </html>