<?php
class Spaces {
    private $user_object;
    private $con;

    public function __construct($con, $user) {
        $this->con = $con;
        $this->user_object = new User_Info($con, $user);
    }

    public function createSpace($space_id, $crt_user, $content, $type, $date) {
        // Sanitize input
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $type = filter_var($type, FILTER_SANITIZE_STRING);
        $date = filter_var($date, FILTER_SANITIZE_STRING);
        $start_time = filter_var($start_time, FILTER_SANITIZE_STRING);
        $end_time = filter_var($end_time, FILTER_SANITIZE_STRING);
        $description = filter_var($description, FILTER_SANITIZE_STRING);
        $image = filter_var($image, FILTER_SANITIZE_URL);
    }

    public function load_current_space($space_id) {
        $userLoggedIn = $this->user_object->gettingUsername();

        $spaces_query = mysqli_query($this->con,"SELECT * FROM spc_msgs WHERE space_location = '$space_id' ORDER BY spacemsg_id ");
        $spc_content = '';
        
        if (mysqli_num_rows($spaces_query) > 0) {
            while($spc_rows = mysqli_fetch_array($spaces_query)) {
                $sender = $spc_rows['sender'];
                $content = $spc_rows['content'];
                $type = $spc_rows['type'];
                $time = $spc_rows['time'];

                $get_sender_info = mysqli_query($this->con, "SELECT * FROM users WHERE username='$sender'");
                $sender_info = mysqli_fetch_array($get_sender_info);

                $sender_name = $sender_info['first_name'] . ' ' . $sender_info['last_name'];
                $sender_pfp = $sender_info['first_name'][0] . $sender_info['last_name'][0];

                $select_space = mysqli_query($this->con,"SELECT * FROM spaces WHERE space_id = '$space_id'");

                $crt_main_spc = mysqli_fetch_array($select_space);
                $crt_spc_name = $crt_main_spc['name'];

                if ($sender == $userLoggedIn && $type == 'default' ) {
                    $spc_content .= "
                    <li class='flex justify-end my-3'>
                        <div class='bg-blue-400 rounded-full text-white relative max-w-xl px-3 py-2'>
                            <span class='block'>$content</span>
                        </div>
                    </li>
                ";
                }
                else if ($sender != $userLoggedIn && $type == 'default') {
                    $spc_content .= "
                    <li class='flex justify-start my-4'>
                        <span class='my-1 relative max-w-xl px-2 mx-2 py-2 bg-slate-100 rounded-full'>$sender_pfp</span>
                        <div class='bg-slate-100 rounded-full my-1 relative max-w-xl px-3 py-2'>
                            <span class='block'>$content</span>
                        </div>
                    </li>
                ";
                }

                switch($type){
                    case "new_member":
                        $spc_content .= "
                    <li class='m-auto bg-slate-200 w-fit px-4 py-2.5 rounded-full flex'>
                        <p class='text-slate-600 m-auto'>
                        <span class=''>
                            <i class='bx bx-party'></i>
                        </span>
                        $sender joined $crt_spc_name</p> 
                    </li>
                        ";
                    break;
                
                    case "red";
                        echo "red and large";
                    break;
                }
            }
            echo $spc_content;
        }
        else {
            echo '
        <div class="bg-slate-200/50 w-1/2 m-auto px-8 py-10 rounded-2xl">
            <svg class="m-auto py-2" xmlns="http://www.w3.org/2000/svg" width="180" height="180" viewBox="0 0 24 24" fill="none"><path d="M14.5 10.75h-6c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h6c.41 0 .75.34.75.75s-.34.75-.75.75ZM11.5 13.75h-3c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h3c.41 0 .75.34.75.75s-.34.75-.75.75Z" fill="#3b82f6"></path><path opacity=".4" d="M11.5 21a9.5 9.5 0 1 0 0-19 9.5 9.5 0 0 0 0 19Z" fill="#3b82f6"></path><path d="M21.3 21.999c-.18 0-.36-.07-.49-.2l-1.86-1.86a.706.706 0 0 1 0-.99c.27-.27.71-.27.99 0l1.86 1.86c.27.27.27.71 0 .99-.14.13-.32.2-.5.2Z" fill="#3b82f6"></path></svg>
            <h1 class="text-center text-slate-400 font-semibold py-2 text-2xl"> No Messages Yet </h1>
            <p class="text-center text-slate-400">Looks like no one has sent a message in the space. <br> Be the first one to send a message!</p>
            ';
        }
    }

    public function load_space_menu_links() {
        $userLoggedIn = $this->user_object->gettingUsername();
        $links_menu = "";

        $all_spcs_query = mysqli_query($this->con,"SELECT * FROM spaces");
        while($space = mysqli_fetch_array($all_spcs_query)) {
            $id = $space['space_id'];
            $space_name = $space['name'];
            $participant_arr = explode(',', $space['participants']);
    
            if (in_array($userLoggedIn, $participant_arr)) {
                if ($space_name != "") {
                    $links_menu .= "
                        <a class='bg-slate-200/60 hover:text-slate-600 rounded-xl m-2 px-3 py-2 block' href='space.php?space=$id'>$space_name</a>
                    ";
                }
            }
        }
        echo $links_menu;
    }
}

?>