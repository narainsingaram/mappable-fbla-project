<?php
class Teacher_Events {
    private $user_object;
    private $connection;

    public function __construct($connection, $user) {
        $this->con = $connection;
        $this->user_object = new User_Info($connection, $user);
    }

public function event_feed($title, $type, $date, $start_time, $end_time, $description, $image, $user_to) {
    $title = strip_tags($title);
    $description = strip_tags($description);

    if(preg_replace('/\s+/', '', $description) != ""){
        $date_added = date('Y-m-d H:i:s');
        $added_by = $this->user_object->gettingUsername();

        if($user_to == $added_by) {
            $user_to = "none";
        }

        $push_event_submit_query = mysqli_query($this->con, "INSERT INTO teacher_events VALUES(NULL, '$title', '$type', '$date', '$start_time', '$end_time', '$description', '$image', '$added_by', '$user_to', '$date_added', '', 'no')");
        $id_return = mysqli_insert_id($this->con);
    }
}
    

public function load_requested_feed() {
    $userLoggedIn = $this->user_object->gettingUsername();
    $event_data_query = mysqli_query($this->con, "SELECT * FROM teacher_events WHERE user_deleted='no' ORDER BY event_id DESC");
    $requested_content = '';

    while($event_row = mysqli_fetch_array($event_data_query)) {
        $create_event_query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$event_row[added_by]'");
        $row = mysqli_fetch_array($create_event_query);
        $check_requests = mysqli_query($this->con,"SELECT * FROM authentifications WHERE id='$event_row[event_id]' AND requester='$userLoggedIn'");
        $match_request_rows = mysqli_num_rows($check_requests);

        if($match_request_rows == 1) {
            $requested_content .= <<<EOT
        <li class='py-3 sm:py-4 mb-3 rounded-2xl shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] px-2 py-1'>
            <div class='flex items-center space-x-4'>
                <button class='absolute bg-slate-200 w-8 h-8 text-md text-gray-700 rounded-full font-semibold'>
                <span class=''> {$row['first_name'][0]}{$row['last_name'][0]} </span>
                </button>
            <div class='flex-shrink-0'>
                <img class='object-cover w-16 h-10 rounded-lg shadow-md' src='../assets/event_images/$event_row[image]'>
            </div>

        <div class='flex-1 min-w-0'>
                    <p class='text-sm font-medium text-gray-900 truncate'>
                        $event_row[title]
                    </p>
                    <p class='text-sm text-gray-500 truncate'>
                        $event_row[description]
                    </p>
                </div>
                    <form action='index.php' method='POST'>
                        <button name='auth_delete_btn_$event_row[event_id]' type='submit' class='inline-flex cursor-pointer active:scale-105 items-center text-xl text-red-400 px-2 py-1 rounded-xl text-gray-900'>
                            <i class="uil uil-trash-alt"></i>
                        </button>
                    </form>
            </div>
        </li>
    EOT;;
    ;
    }

    if(isset($_POST["auth_delete_btn_{$event_row['event_id']}"])) {
        $create_event_query = mysqli_query($this->con, "DELETE FROM authentifications WHERE id='$event_row[event_id]' AND requester='$userLoggedIn'");
        header("Location: index.php");
        echo "Deleted";
    }

            }
    echo $requested_content;
}

public function loadAuthentifications() {
    $userLoggedIn = $this->user_object->gettingUsername();
    $select_events_query = mysqli_query($this->con, "SELECT * from authentifications WHERE authentifier='$userLoggedIn' AND accepted='no' ORDER BY id");

    $authentifications_content = "";

    while($auth_rows = mysqli_fetch_array($select_events_query)) {
        $id = $auth_rows['id'];
        $authentifier = $auth_rows['authentifier'];
        $requester = $auth_rows['requester'];
        $title = $auth_rows['title'];
        $image = $auth_rows['image'];
        $desc = $auth_rows['description'];

        $requester_query = mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE username='$requester'");
        $select_request_details = mysqli_fetch_assoc($requester_query);

        $requester_first_name = $select_request_details['first_name'];
        $requester_last_name = $select_request_details['last_name'];
    
        if(isset($_POST["auth_verify$id-$requester"])) {
            $point_value = $_POST['add_points'];
            $gem_value = $_POST['add_gems'];

            //Update authentification as accepted in database table
            $authenticate_query = mysqli_query($this->con,"UPDATE authentifications SET accepted = 'yes' WHERE id = '$id' AND requester = '$requester'");

            //Adding points and gems that authentifer wants on submit of form
            $add_points_query = mysqli_query($this->con,"UPDATE users SET points = points + $point_value WHERE username = '$requester' ");
            $add_gems_query = mysqli_query($this->con,"UPDATE users SET gems = gems + $gem_value WHERE username = '$requester' ");
            header("Location: teacher_auth.php");
        }

        $authentifications_content .= "
        <li class='mb-10 ml-6'>
        <span class='flex absolute -left-5 justify-center items-center w-10 h-10 bg-slate-200 rounded-full'>
            <div class='rounded-full text-xl font-bold font-mono shadow-lg'>$requester_first_name[0]$requester_last_name[0]</div>
        </span>
        <div class='p-4 ml-4 bg-white rounded-lg border-none shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px]'>
            <div class='justify-between items-center mb-3 sm:flex'>
                <time class='text-xs font-normal text-gray-500 sm:order-last sm:mb-0'>Time Sent</time>
                <div class='text-sm font-normal text-gray-500'><a href='#' class='font-semibold text-gray-900 hover:underline'>$requester_first_name $requester_last_name</a> requested an authentification</div>
            </div>
        <button type='submit' class='active:scale-105 absolute -right-5 p-2 text-xl bg-red-200 rounded-full'>
        <svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
        <path opacity='0.4' d='M19.6433 9.48844C19.6433 9.55644 19.1103 16.2972 18.8059 19.1341C18.6153 20.875 17.493 21.931 15.8095 21.961C14.516 21.99 13.2497 22 12.0039 22C10.6812 22 9.38772 21.99 8.13216 21.961C6.50508 21.922 5.38178 20.845 5.20089 19.1341C4.88772 16.2872 4.36449 9.55644 4.35477 9.48844C4.34504 9.28345 4.41117 9.08846 4.54539 8.93046C4.67765 8.78447 4.86827 8.69647 5.06862 8.69647H18.9392C19.1385 8.69647 19.3194 8.78447 19.4624 8.93046C19.5956 9.08846 19.6627 9.28345 19.6433 9.48844Z' fill='#ef4444'></path>
        <path opacity='0.4' d='M19.6433 9.48844C19.6433 9.55644 19.1103 16.2972 18.8059 19.1341C18.6153 20.875 17.493 21.931 15.8095 21.961C14.516 21.99 13.2497 22 12.0039 22C10.6812 22 9.38772 21.99 8.13216 21.961C6.50508 21.922 5.38178 20.845 5.20089 19.1341C4.88772 16.2872 4.36449 9.55644 4.35477 9.48844C4.34504 9.28345 4.41117 9.08846 4.54539 8.93046C4.67765 8.78447 4.86827 8.69647 5.06862 8.69647H18.9392C19.1385 8.69647 19.3194 8.78447 19.4624 8.93046C19.5956 9.08846 19.6627 9.28345 19.6433 9.48844Z' fill='#ef4444'></path>
        <path d='M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z' fill='#ef4444'></path>
        </svg>
        </button>
            <div class='px-3 py-5 shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] flex items-center justify-between bg-slate-100 rounded-lg'>
            <blockquote class='flex items-center'>
            <img src='../assets/event_images/$image' class='object-cover w-16 h-10 rounded-lg shadow-md'>
                <p class='ml-2 text-xl font-bold tracking-wide'>$title</p>
            </blockquote>
            <blockquote>
            <form class='inline' method='POST' action='teacher_auth.php'>
            <select name='add_points'>
                    <option value='50'> 50 Points</option>
                    <option value='100'> 100 Points</option>
                    <option value='150'> 150 Points</option>
                    <option value='200'> 200 Points</option>
                    <option value='250'> 250 Points</option>
            </select>
            <select name='add_gems'>
                <option value='2'> 2 Gems</option>
                <option value='5'> 5 Gems</option>
                <option value='10'> 10 Gems</option>
                <option value='15'> 15 Gems</option>
                <option value='20'> 20 Gems</option>
            </select>
                <button class='rounded-xl bg-blue-100 text-blue-500 text-sm px-2.5 mx-2 py-2' name='auth_verify$id-$requester' type='submit'> 
                    Submit
                </button>
            </form>
            </blockquote>
            </div>
        </div>
    </li>
        ";
}
    echo $authentifications_content;

}

public function loadAttendanceTable() {
    $userLoggedIn = $this->user_object->gettingUsername();
    $select_events_query = mysqli_query($this->con, "SELECT * from authentifications WHERE authentifier='$userLoggedIn' ORDER BY id");

    $authentifications_content = "";

    while($auth_rows = mysqli_fetch_array($select_events_query)) {
        $id = $auth_rows['id'];
        $authentifier = $auth_rows['authentifier'];
        $requester = $auth_rows['requester'];
        $title = $auth_rows['title'];
        $image = $auth_rows['image'];
        $desc = $auth_rows['description'];

        $requester_query = mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE username='$requester'");
        $select_request_details = mysqli_fetch_assoc($requester_query);

        $requester_first_name = $select_request_details['first_name'];
        $requester_last_name = $select_request_details['last_name'];

    $authentifications_content .= <<<EOT
        <article class="rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:shadow-sm">
            <div class="rounded-[10px] bg-white p-4 !pt-20 sm:p-6">
            <time datetime="2022-10-10" class="block text-xs text-gray-500">
                10th Oct 2022
            </time>

            <a href="#">
                <h3 class="mt-0.5 text-lg font-medium text-gray-900">
                How to center an element using JavaScript and jQuery
                </h3>
            </a>

            <div class="mt-4 flex flex-wrap gap-1">
                <span
                class="whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-xs text-purple-600"
                >
                Snippet
                </span>

                <span
                class="whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-xs text-purple-600"
                >
                JavaScript
                </span>
            </div>
            </div>
        </article>

            EOT;;
    }
echo $authentifications_content;
}


public function load_regular_feed() {
    $userLoggedIn = $this->user_object->gettingUsername();
    $event_data_query = mysqli_query($this->con, "SELECT * FROM teacher_events WHERE user_deleted='no' ORDER BY event_id DESC");
    
    $event_content = '';
    
if(isset($_POST['auth_submit'])) {
    // Sanitize user input
    $event_id = mysqli_real_escape_string($this->con, $_POST['event_id']);
    $comments = mysqli_real_escape_string($this->con, $_POST['auth_comments']);
    $authentifier = mysqli_real_escape_string($this->con, $_POST['authentifier']);
    $title = mysqli_real_escape_string($this->con, $_POST['auth_title']);
    $image = mysqli_real_escape_string($this->con, $_POST['auth_image']);
    
    // Check if the event id exists in the authentifications table
    $verifying_checkin = mysqli_query($this->con, "SELECT COUNT(*) AS checkin_crosscheck FROM authentifications WHERE id='$event_id'");
    $cross_check_result = mysqli_fetch_assoc($verifying_checkin);
    
    // If the event id does not exist, insert new record into the authentifications table
    if ($cross_check_result['checkin_crosscheck'] == 0) {
        mysqli_query($this->con, "INSERT INTO authentifications VALUES($event_id, '$authentifier', '$userLoggedIn', '$title', '$image', '$comments', 'no', 'no') ORDER BY id DESC");
        // Create a new notification object and send a notification
        $add_notification = new Notify($this->con, $authentifier);
        $add_notification->pushNewNotification($authentifier, 'request_received');
    }
    // Redirect the user back to the index page
    header('Location: index.php');
}

    
    while($event_row = mysqli_fetch_array($event_data_query)) {
        $id = $event_row['event_id'];
        $title = $event_row['title'];
        $type = $event_row['type'];
        $date = $event_row['date'];
        $start_time = $event_row['start']; 
        $end_time = $event_row['end']; 
        $description = $event_row['description'];
        $image = $event_row['image'];
        $added_by = $event_row['added_by'];
        $date_added = $event_row['date_added'];

        $date = date_create($date);
        $reformated_date = date_format($date,'m/d/Y');

        if($event_row['user_to'] == 'none') {
            $user_to = '';
        }

        $create_event_query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$added_by'");
        $row = mysqli_fetch_array($create_event_query);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $username = $row['username'];
        $position = $row['position'];
        $level = $row['levels'];

        $fn_i = $first_name[0];
        $ln_i = $last_name[0];

        $check_requests = mysqli_query($this->con,"SELECT * FROM authentifications WHERE id='$id' AND requester='$userLoggedIn'");

        $match_request_rows = mysqli_num_rows($check_requests);
        

        if($match_request_rows == 0) {
            $event_content .= "             
        <div class='bg-white z-10 relative shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] transition ease-in px-3 pb-4 pt-2 rounded-2xl my-4'>
            <div>
                <div>
                    <div class='flex align-center'> 
                    <div class='inline-flex overflow-hidden relative justify-center items-center w-12 h-12 mt-1.5 mr-2 text-xl bg-slate-300/30 rounded-full'>
    <a href='profile.php?profile_username=$username' class='font-semibold text-gray-600'>$first_name[0]$last_name[0]</a>
</div>
                        <ul class='mt-2'>
                            <li>
                                <h3'>
                                    <a href='profile.php?profile_username=$username'>$first_name $last_name </a>
                                <span class='bg-blue-300/20 text-blue-500 text-xs font-semibold px-2 py-1 tracking-wide rounded'>Lvl. $level $position</span>
                                </h3>
                            </li>
                            <li><span class='text-gray-400 text-sm'>$date_added</span>
                            </li>
                        </ul>
                    </div>
            <div>
                <h1 class='rounded-2xl bg-slate-300/30 my-3 px-6 py-3 text-2xl font-bold text-black'>$title</h1>
            </div>
                <div class='post-images'>
                    <div class='grid lg:grid-cols-3 md:grid-cols-2 gap-6 w-full max-w-6xl'>
	
                    <!-- Tile 1 -->
                    <div class='p-5 bg-white rounded flex items-center'>
                        <div class='bg-green-200 h-16 w-16 rounded flex flex-shrink-0 items-center justify-center'>
                            <i class='text-3xl uil uil-calender'></i>
                        </div>
                        <div class='flex-grow flex flex-col ml-4'>
                            <span class='text-xl font-bold'>{$reformated_date}</span>
                            <div class='flex justify-between items-center'>
                                <span class='text-gray-500'>Date</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tile 2 -->
                    <div class='p-5 bg-white rounded flex items-center'>
                        <div class='bg-blue-200 h-16 w-16 rounded flex flex-shrink-0 items-center justify-center'>
                            <i class='text-3xl uil uil-signin'></i>
                        </div>
                        <div class='flex-grow flex flex-col ml-4'>
                            <span class='text-xl font-bold'>$start_time</span>
                            <div class='flex justify-between items-center'>
                                <span class='text-gray-500'>Start Time</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tile 3 -->
                    <div class='p-5 bg-white rounded flex items-center'>
                        <div class='bg-red-200 h-16 w-16 rounded flex flex-shrink-0 items-center justify-center'>
                            <i class='text-3xl uil uil-signout'></i>
                        </div>
                        <div class='flex-grow flex flex-col ml-4'>
                            <span class='text-xl font-bold'>$end_time</span>
                            <div class='flex justify-between items-center'>
                                <span class='text-gray-500'>End Time</span>
                            </div>
                        </div>
                    </div>
                    </div>

                        <p class='bg-slate-300/30 mt-6 mx-2 rounded-xl px-5 py-4 break-word'>
                            <b class='text-lg'>
                                <i class='uil uil-info-circle'></i> Description: 
                            </b>
                            <br> 
                            <span class='px-2'>$description </span></p>
                    </div>
                </div>
            <form action='index.php' method='POST' enctype='multipart/form-data'>
                <input type='hidden' name='event_id' value='$id'>
                <input type='hidden' name='authentifier' value='$added_by'>
                <input type='hidden' name='auth_title' value='$title'>
                <input type='hidden' name='auth_image' value='$image'>
                <div class='tooltip tooltip-right' data-tip='Request an authentification for {$title}'>
                    <center>
                        <button name='auth_submit' type='submit' class='btn bg-slate-200/70 hover:text-white text-black border-none capitalize mx-2 my-4 rounded-full'> 
                            <i class='text-2xl mr-2 uil uil-comment-add'></i> Add Auth
                        </button>
                    </center>
                </div>
            </form>  
    </main>
    </div>
    <div class='-top-0 -right-0 absolute dropdown'>
        <label tabindex='0' class='btn bg-white border-none text-black hover:bg-slate-200 active:scale-125 cursor-pointer text-sm'><i class='uil uil-ellipsis-h'></i></label>
        <ul tabindex='0' class='dropdown-content menu p-2 shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] bg-white rounded-2xl w-52'>
            <li><a href='profile.php?profile_username=$username'>View Profile</a></li>
        </ul>
        </div>
    </div>
";
}
        //Today's date
        $current_date = date('Y-m-d');

        //Filter & Delete events if date has already passed
        if($current_date > $date) {
            mysqli_query($this->con,"DELETE FROM teacher_events WHERE event_id='$id' AND added_by='$userLoggedIn'");
        }
        }
    echo $event_content;
    }

    public function live_events() {
        $live_event_query = mysqli_query($this->con, "SELECT * FROM teacher_events WHERE user_deleted='no' ORDER BY event_id DESC");

        $live_event_content = '';

        while($live = mysqli_fetch_array($live_event_query)) {
            $id = $live['event_id'];
            $title = $live['title'];
            $type = $live['type'];
            $date = $live['date'];
            $start_time = $live['start']; 
            $end_time = $live['end']; 
            $description = $live['description'];
            $image = $live['image'];
            $added_by = $live['added_by'];
            $date_added = $live['date_added'];

            //Today's date
            $current_date = date('Y-m-d');
            //time without PM or AM
            $current_time = date('h:i');
            //time with PM or AM
            $current_time_w_a = date('h:iA');

            //change all time variables into integers to verify which time is bigger
            $array_current_time = explode(":", $current_time);
            $int_current_time = $array_current_time[0] . $array_current_time[1];

            $array_start_time = explode(":", $start_time);
            $int_start_time = $array_start_time[0] . $array_start_time[1];

            $array_end_time = explode(":", $end_time);
            $int_end_time = $array_end_time[0] . $array_end_time[1];

            //if the current time is in PM, add 12 hours and if the current time is in AM, subtract 12 hours
            if($current_time . 'PM' == $current_time_w_a ) {
                $int_current_time = $int_current_time + 1200;
            }

            if($current_date == $date) {
            /* integer version of current time - integer version start time must be above 0 for it to be live
                integer version of current time - integer version end time must be less than 0 for it to be live
            */
            if($int_current_time > $int_start_time && $int_current_time < $int_end_time) {
                $add_live_events = mysqli_query($this->con, "UPDATE teacher_events SET live='yes' WHERE event_id='$id' AND added_by='$added_by'");
                $live_event_content .="
                    <div class='relative'>
    <div class='rounded-full' src='/docs/images/people/profile-picture-5.jpg'>fasdfsa</div>
</div>
<div class='p-6 relative rounded-2xl shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] hover:-translate-y-1 transition ease-in'>
    <header class='mb-2'>
        <h5 class='inline text-2xl font-bold tracking-tight text-gray-900'>
        $title
        </h5>
        <span class='text-xs tracking-normal uppercase font-semibold text-emerald-500 bg-emerald-200 px-2 py-1 active:scale-10 rounded-full'>Live</span>
    </header>
    <p class='mb-3 font-normal text-gray-700'>$description</p>
    <a class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-blue-500 bg-blue-200/60 cursor-pointer rounded-xl'>
        <svg class='mr-1' width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
        <path d='M21.101 9.58786H19.8979V8.41162C19.8979 7.90945 19.4952 7.5 18.999 7.5C18.5038 7.5 18.1 7.90945 18.1 8.41162V9.58786H16.899C16.4027 9.58786 16 9.99731 16 10.4995C16 11.0016 16.4027 11.4111 16.899 11.4111H18.1V12.5884C18.1 13.0906 18.5038 13.5 18.999 13.5C19.4952 13.5 19.8979 13.0906 19.8979 12.5884V11.4111H21.101C21.5962 11.4111 22 11.0016 22 10.4995C22 9.99731 21.5962 9.58786 21.101 9.58786Z' fill='#3b82f6'></path>
        <path d='M9.5 15.0155C5.45422 15.0155 2 15.6623 2 18.2466C2 20.8299 5.4332 21.5 9.5 21.5C13.5448 21.5 17 20.8532 17 18.2689C17 15.6846 13.5668 15.0155 9.5 15.0155Z' fill='#3b82f6'></path>
        <path opacity='0.4' d='M9.49999 12.5542C12.2546 12.5542 14.4626 10.3177 14.4626 7.52761C14.4626 4.73754 12.2546 2.5 9.49999 2.5C6.74541 2.5 4.53735 4.73754 4.53735 7.52761C4.53735 10.3177 6.74541 12.5542 9.49999 12.5542Z' fill='#3b82f6'></path>
        </svg>
    Join Event
    </a>
    <span class='-top-0 -right-0 absolute w-3 h-3 bg-green-400 border-2 border-white rounded-full animate-ping opacity-75'></span>
</div>
                    
                "; 
            }
            else if($int_current_time < $int_start_time || $int_current_time > $int_end_time) {
                $remove_live_events = mysqli_query($this->con, "UPDATE teacher_events SET live='no' WHERE event_id='$id' AND added_by='$added_by'");
            }
            }
            else {
            //if current != date then set as not live
                $remove_live_events = mysqli_query($this->con, "UPDATE teacher_events SET live='no' WHERE event_id='$id' AND added_by='$added_by'");
            }
        }
        echo $live_event_content;
    }
    public function attended_events() {
        $userLoggedIn = $this->user_object->gettingUsername();
        $attended_events_query = mysqli_query($this->con, "SELECT * FROM authentifications WHERE accepted ='yes' AND requester = '$userLoggedIn' ORDER BY requester DESC");
        $attended_event_content = '';
        $profile_event_query = mysqli_query($this->con, "SELECT * FROM teacher_events WHERE added_by ='$userLoggedIn' ORDER BY event_id DESC");
        $profile_event_content = '';

        while($profile = mysqli_fetch_array($attended_events_query)) {
            $id = $profile['event_id'];
            $title = $profile['title'];
            $type = $profile['type'];
            $date = $profile['date'];
            $start_time = $profile['start']; 
            $end_time = $profile['end']; 
            $description = $profile['description'];
            $image = $profile['image'];
            $added_by = $profile['added_by'];
            $date_added = $profile['date_added'];

            $create_event_query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$added_by'");
            $row = mysqli_fetch_array($create_event_query);
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $username = $row['username'];
            $position = $row['position'];
            $level = $row['levels'];
            $created_account_date = $row['date'];

            $attended_event_content .= "<div class='bg-white relative shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] transition ease-in px-3 pb-4 pt-2 rounded-2xl my-4'>
            <div>
                <div>
                    <div class='flex align-center'> 
                    <div class='inline-flex overflow-hidden relative justify-center items-center w-12 h-12 mr-2 text-xl bg-slate-300/30 rounded-full'>
    <span class='font-semibold text-gray-600'>$first_name[0]$last_name[0]</span>
</div>
                        <ul class='mt-2'>
                            <li>
                                <h3>
                                $first_name $last_name 
                                <span class='bg-blue-300/20 text-blue-500 text-xs font-semibold px-2 py-1 tracking-wide rounded'>Lvl. $level $position</span>
                                </h3>
                            </li>
                            <li><span class='text-gray-400 text-sm'>$date_added</span>
                            </li>
                        </ul>
                    </div>
            <div>
                <h1 class='rounded-2xl bg-slate-300/30 my-3 px-4 py-3 text-2xl font-bold text-black'>$title</h1>
            </div>
                    <div class='post-images'>
                        <img class='mb-3 rounded-2xl overflow-hidden w-max h-max' src='../assets/event_images/$image'> 
                    </div>
                <div>
                <br>
                $start_time $end_time

                </div>
                    <p class='break-all'>$description</p>
                </div>
        <form action='index.php' method='POST' enctype='multipart/form-data' class='inline'>
        <input type='hidden' name='event_id' value='$id'>
        <input type='hidden' name='authentifier' value='$added_by'>
        <input type='hidden' name='auth_title' value='$title'>
        <input type='hidden' name='auth_image' value='$image'>
            <button name='auth_submit' type='submit' class='active:scale-105 inline px-1 py-2 rounded-full text-xl'> 
            <svg width='35' height='35' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
            <path opacity='0.4' d='M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5026 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0453C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.298 9.012 20.0465 9.013C19.6247 9.016 19.1168 9.021 18.8088 9.021Z' fill='#10b981'></path>
            <path opacity='0.4' d='M16.0842 2.5673C15.7852 2.2563 15.2632 2.4703 15.2632 2.9013V5.5383C15.2632 6.6443 16.1742 7.5543 17.2792 7.5543C17.9772 7.5623 18.9452 7.5643 19.7672 7.5623C20.1882 7.5613 20.4022 7.0583 20.1102 6.7543C19.0552 5.6573 17.1662 3.6913 16.0842 2.5673Z' fill='#10b981'></path>
            <path d='M15.1052 12.8837C14.8142 13.1727 14.3432 13.1747 14.0512 12.8817L12.4622 11.2847V16.1117C12.4622 16.5227 12.1282 16.8567 11.7172 16.8567C11.3062 16.8567 10.9732 16.5227 10.9732 16.1117V11.2847L9.38223 12.8817C9.09223 13.1747 8.62023 13.1727 8.32923 12.8837C8.03823 12.5947 8.03723 12.1227 8.32723 11.8307L11.1892 8.9557C11.1902 8.9547 11.1902 8.9547 11.1902 8.9547C11.2582 8.8867 11.3402 8.8317 11.4302 8.7947C11.5202 8.7567 11.6182 8.7367 11.7172 8.7367C11.8172 8.7367 11.9152 8.7567 12.0052 8.7947C12.0942 8.8317 12.1752 8.8867 12.2432 8.9537C12.2442 8.9547 12.2452 8.9547 12.2452 8.9557L15.1072 11.8307C15.3972 12.1227 15.3972 12.5947 15.1052 12.8837Z' fill='#10b981'></path>
            </svg>
            </button>
        </form>  

        <button class='active:scale-105 inline px-1 py-2 rounded-full text-xl'>
            <svg width='35' height='35' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
            <path opacity='0.4' d='M12.02 2C6.21 2 2 6.74 2 12C2 13.68 2.49 15.41 3.35 16.99C3.51 17.25 3.53 17.58 3.42 17.89L2.75 20.13C2.6 20.67 3.06 21.07 3.57 20.91L5.59 20.31C6.14 20.13 6.57 20.36 7.081 20.67C8.541 21.53 10.36 21.97 12 21.97C16.96 21.97 22 18.14 22 11.97C22 6.65 17.7 2 12.02 2Z' fill='#6366f1'></path>
            <path opacity='0.4' d='M11.9805 13.2901C11.2705 13.2801 10.7005 12.7101 10.7005 12.0001C10.7005 11.3001 11.2805 10.7201 11.9805 10.7301C12.6905 10.7301 13.2605 11.3001 13.2605 12.0101C13.2605 12.7101 12.6905 13.2901 11.9805 13.2901ZM7.37009 13.2901C6.67009 13.2901 6.09009 12.7101 6.09009 12.0101C6.09009 11.3001 6.66009 10.7301 7.37009 10.7301C8.08009 10.7301 8.65009 11.3001 8.65009 12.0101C8.65009 12.7101 8.08009 13.2801 7.37009 13.2901ZM15.3103 12.0101C15.3103 12.7101 15.8803 13.2901 16.5903 13.2901C17.3003 13.2901 17.8703 12.7101 17.8703 12.0101C17.8703 11.3001 17.3003 10.7301 16.5903 10.7301C15.8803 10.7301 15.3103 11.3001 15.3103 12.0101Z' fill='#6366f1'></path>
            </svg>
        </button>

        <button class='active:scale-105 inline px-0.5 py-2 rounded-full text-xl'>
        <svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' viewBox='0 0 24 24' fill='none'><path opacity='.4' d='m7.11 5.961 9.02-3.01c4.05-1.35 6.25.86 4.91 4.91l-3.01 9.02c-2.02 6.07-5.34 6.07-7.36 0l-.89-2.68-2.68-.89c-6.06-2.01-6.06-5.32.01-7.35Z' fill='#22d3ee'></path><path d='m12.12 11.629 3.81-3.82ZM12.12 12.38c-.19 0-.38-.07-.53-.22a.754.754 0 0 1 0-1.06l3.8-3.82c.29-.29.77-.29 1.06 0 .29.29.29.77 0 1.06l-3.8 3.82c-.15.14-.34.22-.53.22Z' fill='#22d3ee'></path></svg>
        </button>
    </main>
    </div>
    <div class='-top-0 -right-0 absolute dropdown'>
        <label tabindex='0' class='px-3 py-2 active:scale-125 cursor-pointer text-sm'><i class='uil uil-ellipsis-h'></i></label>
        <ul tabindex='0' class='dropdown-content menu p-2 shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] bg-white rounded-2xl w-52'>
            <li><a>View Profile</a></li>
            <li><a>Save to Bookmarks</a></li>
            <li><a>Share</a></li>
            <li><a>Report</a></li>
        </ul>
        </div>
    </div>";
        }
        
        echo $profile_event_content;
    }
    public function profile_events() {
        $userLoggedIn = $this->user_object->gettingUsername();
        $profile_event_query = mysqli_query($this->con, "SELECT * FROM teacher_events WHERE added_by ='$userLoggedIn' ORDER BY event_id DESC");
        $profile_event_content = '';
    
        while($profile = mysqli_fetch_array($profile_event_query)) {
            $create_event_query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$profile[added_by]'");
            $row = mysqli_fetch_array($create_event_query);
    
            $profile_event_content .= "<div class='bg-white relative shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] transition ease-in px-3 pb-4 pt-2 rounded-2xl my-4'>
            <div>
                <div>
                    <div class='flex align-center'> 
                    <div class='inline-flex overflow-hidden relative justify-center items-center w-12 h-12 mr-2 text-xl bg-slate-300/30 rounded-full'>
    <span class='font-semibold text-gray-600'>{$row['first_name'][0]}{$row['last_name'][0]}</span>
    </div>
                        <ul class='mt-2'>
                            <li>
                                <h3>
                                {$row['first_name']} {$row['last_name']} 
                                <span class='bg-blue-300/20 text-blue-500 text-xs font-semibold px-2 py-1 tracking-wide rounded'>Lvl. {$row['levels']} {$row['position']}</span>
                                </h3>
                            </li>
                            <li><span class='text-gray-400 text-sm'>{$row['date']}</span>
                            </li>
                        </ul>
                    </div>
            <div>
                <h1 class='rounded-2xl bg-slate-300/30 my-3 px-4 py-3 text-2xl font-bold text-black'>{$profile['title']}</h1>
            </div>
                    <div class='post-images'>
                        <img class='mb-3 rounded-2xl overflow-hidden w-max h-max' src='../assets/event_images/{$profile['image']}'> 
                    </div>
                <div>
                <br>
                {$profile['start']} {$profile['end']}
    
                </div>
                    <p class='break-all'>{$profile['description']}</p>
                </div>
        <form action='index.php' method='POST' enctype='multipart/form-data' class='inline'>
        <input type='hidden' name='event_id' value='{$profile['event_id']}'>
        <input type='hidden' name='authentifier' value='{$profile['added_by']}'>    
        <input type='hidden' name='auth_title' value='{$profile['added_by']}>
        <input type='hidden' name='auth_image' value='{$profile['image']}>
            <button name='auth_submit' type='submit' class='active:scale-105 inline px-1 py-2 rounded-full text-xl'> 
            <svg width='35' height='35' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
            <path opacity='0.4' d='M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5026 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0453C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.298 9.012 20.0465 9.013C19.6247 9.016 19.1168 9.021 18.8088 9.021Z' fill='#10b981'></path>
            <path opacity='0.4' d='M16.0842 2.5673C15.7852 2.2563 15.2632 2.4703 15.2632 2.9013V5.5383C15.2632 6.6443 16.1742 7.5543 17.2792 7.5543C17.9772 7.5623 18.9452 7.5643 19.7672 7.5623C20.1882 7.5613 20.4022 7.0583 20.1102 6.7543C19.0552 5.6573 17.1662 3.6913 16.0842 2.5673Z' fill='#10b981'></path>
            <path d='M15.1052 12.8837C14.8142 13.1727 14.3432 13.1747 14.0512 12.8817L12.4622 11.2847V16.1117C12.4622 16.5227 12.1282 16.8567 11.7172 16.8567C11.3062 16.8567 10.9732 16.5227 10.9732 16.1117V11.2847L9.38223 12.8817C9.09223 13.1747 8.62023 13.1727 8.32923 12.8837C8.03823 12.5947 8.03723 12.1227 8.32723 11.8307L11.1892 8.9557C11.1902 8.9547 11.1902 8.9547 11.1902 8.9547C11.2582 8.8867 11.3402 8.8317 11.4302 8.7947C11.5202 8.7567 11.6182 8.7367 11.7172 8.7367C11.8172 8.7367 11.9152 8.7567 12.0052 8.7947C12.0942 8.8317 12.1752 8.8867 12.2432 8.9537C12.2442 8.9547 12.2452 8.9547 12.2452 8.9557L15.1072 11.8307C15.3972 12.1227 15.3972 12.5947 15.1052 12.8837Z' fill='#10b981'></path>
            </svg>
            </button>
        </form>  

        <button class='active:scale-105 inline px-1 py-2 rounded-full text-xl'>
            <svg width='35' height='35' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
            <path opacity='0.4' d='M12.02 2C6.21 2 2 6.74 2 12C2 13.68 2.49 15.41 3.35 16.99C3.51 17.25 3.53 17.58 3.42 17.89L2.75 20.13C2.6 20.67 3.06 21.07 3.57 20.91L5.59 20.31C6.14 20.13 6.57 20.36 7.081 20.67C8.541 21.53 10.36 21.97 12 21.97C16.96 21.97 22 18.14 22 11.97C22 6.65 17.7 2 12.02 2Z' fill='#6366f1'></path>
            <path opacity='0.4' d='M11.9805 13.2901C11.2705 13.2801 10.7005 12.7101 10.7005 12.0001C10.7005 11.3001 11.2805 10.7201 11.9805 10.7301C12.6905 10.7301 13.2605 11.3001 13.2605 12.0101C13.2605 12.7101 12.6905 13.2901 11.9805 13.2901ZM7.37009 13.2901C6.67009 13.2901 6.09009 12.7101 6.09009 12.0101C6.09009 11.3001 6.66009 10.7301 7.37009 10.7301C8.08009 10.7301 8.65009 11.3001 8.65009 12.0101C8.65009 12.7101 8.08009 13.2801 7.37009 13.2901ZM15.3103 12.0101C15.3103 12.7101 15.8803 13.2901 16.5903 13.2901C17.3003 13.2901 17.8703 12.7101 17.8703 12.0101C17.8703 11.3001 17.3003 10.7301 16.5903 10.7301C15.8803 10.7301 15.3103 11.3001 15.3103 12.0101Z' fill='#6366f1'></path>
            </svg>
        </button>

        <button class='active:scale-105 inline px-0.5 py-2 rounded-full text-xl'>
        <svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' viewBox='0 0 24 24' fill='none'><path opacity='.4' d='m7.11 5.961 9.02-3.01c4.05-1.35 6.25.86 4.91 4.91l-3.01 9.02c-2.02 6.07-5.34 6.07-7.36 0l-.89-2.68-2.68-.89c-6.06-2.01-6.06-5.32.01-7.35Z' fill='#22d3ee'></path><path d='m12.12 11.629 3.81-3.82ZM12.12 12.38c-.19 0-.38-.07-.53-.22a.754.754 0 0 1 0-1.06l3.8-3.82c.29-.29.77-.29 1.06 0 .29.29.29.77 0 1.06l-3.8 3.82c-.15.14-.34.22-.53.22Z' fill='#22d3ee'></path></svg>
        </button>
    </main>
    </div>
    <div class='-top-0 -right-0 absolute dropdown'>
        <label tabindex='0' class='px-3 py-2 active:scale-125 cursor-pointer text-sm'><i class='uil uil-ellipsis-h'></i></label>
        <ul tabindex='0' class='dropdown-content menu p-2 shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] bg-white rounded-2xl w-52'>
            <li><a>View Profile</a></li>
            <li><a>Save to Bookmarks</a></li>
            <li><a>Share</a></li>
            <li><a>Report</a></li>
        </ul>
        </div>
    </div>";
        }
        
        echo $profile_event_content;
    }
}
?>