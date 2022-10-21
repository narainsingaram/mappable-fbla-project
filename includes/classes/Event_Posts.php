<?php
class Event_Posts {
    private $user_object;
    private $con;

    public function __construct($con, $user) {
        $this->con = $con;
        $this->user_object = new User_Info($con, $user);
    }

    public function event_submit($title, $type, $date, $start_time, $end_time, $description, $image, $user_to /*index.php 4-7*/) {
        $title = strip_tags($title);
        $description = strip_tags($description);
    
        $delete_all_spaces = preg_replace('/\s+/' /* this means space */, '', $description);

        if($delete_all_spaces != ""){
            $date_added = date('Y-m-d H:i:s');
            $added_by = $this->user_object->gettingUsername();
    
            if($user_to == $added_by) {
                $user_to = "none";
            }
        $event_query = mysqli_query($this->con, "INSERT INTO post_events VALUES(NULL, '$title', '$type', '$date', '$start_time', '$end_time', '$description', '$image', '$added_by', '$user_to', '$date_added', 'no')");
        $id_return = mysqli_insert_id($this->con);
        }
    }

    public function load_events() {
        $userLoggedIn = $this->user_object->gettingUsername();
        $event_data_query = mysqli_query($this->con, "SELECT * FROM post_events WHERE user_deleted='no' ORDER BY id DESC");
        
        $event_content = '';
        
        if(isset($_POST['auth_submit'])) {
        
          $event_id = $_POST['event_id'];
        
          $verifying_checkin = mysqli_query($this->con, "SELECT COUNT(*) AS checkin_crosscheck FROM authentifications WHERE id='$event_id'");
        
          $cross_check_result = mysqli_fetch_assoc($verifying_checkin);
        
          $comments = $_POST['auth_comments'];
          $authentifier = $_POST['authentifier'];
          $title = $_POST['auth_title'];
          $image = $_POST['auth_image'];
          $auth_query = mysqli_query($this->con, "INSERT INTO authentifications VALUES($event_id, '$authentifier', '$userLoggedIn', '$title', '$image', '$comments', 'no', 'no') ORDER BY id DESC");
        
          echo $cross_check_result['checkin_crosscheck'];
          header('Location: index.php');
        }
        
        while($event_row = mysqli_fetch_array($event_data_query)) {
                $id = $event_row['id'];
                $title = $event_row['title'];
                $type = $event_row['type'];
                $start_time = $event_row['start']; 
                $end_time = $event_row['end']; 
                $description = $event_row['description'];
                $image = $event_row['image'];
                $added_by = $event_row['added_by'];
                $date_added = $event_row['date_added'];
        
                if($event_row['user_to'] == 'none') {
                    $user_to = '';
                }
        
                $create_event_query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$added_by'");
                $row = mysqli_fetch_array($create_event_query);
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $username = $row['username'];
                $position = $row['position'];
                $created_account_date = $row['date'];
        
                $fn_i = $first_name[0];
                $ln_i = $last_name[0];
        
                $event_content .="                     
            <div class='bg-white px-3 pb-4 pt-2 rounded-2xl my-4'>
                <div>
                    <div>
                        <div class='flex align-center'>
                        <span class='bg-blue-100 px-2.5 py-2.5 text-2xl font-bold text-gray-700  tracking-wide rounded-full font-mono mr-3'> $first_name[0]$last_name[0] </span>
                            <ul class='mt-2'>
                                <li><h3>$first_name $last_name $match_request_rows</h3></li>
                                <li><span class='text-gray-400 text-sm'>$date_added</span></li>
                            </ul>
                        </div>
                <div>
                    <h1 class='text-3xl ml-1 mt-1 font-bold'>$title</h1>
                </div>
                        <div class='post-images'>
                            <img class='mb-3 rounded-2xl' src='../assets/event_images/$image'>
                        </div>
                        <p class='break-all'>$description</p>
                    </div>
              <form action='index.php' method='POST' enctype='multipart/form-data' class='inline'>
              <input type='hidden' name='event_id' value='$id'>
              <input type='hidden' name='authentifier' value='$added_by'>
              <input type='hidden' name='auth_title' value='$title'>
              <input type='hidden' name='auth_image' value='$image'>
                <button name='auth_submit' type='submit' class='inline bg-green-200 px-2.5 py-1.5 text-2xl rounded-full'> <i class='uil uil-file-check-alt'></i></button>
              </form>  
                <button class='bg-blue-200 px-2.5 py-1.5 text-2xl rounded-full'> <i class='uil uil-qrcode-scan'></i></button>
        
                <button class='bg-indigo-200 px-2.5 py-1.5 text-2xl rounded-full'> <i class='uil uil-eye'></i></button>
                </div>
            </div>
        
        "; 
            }
        echo $event_content;
        }
}

?>