<?php
class Notify {
    private $user_object;
    private $connection; 

    public function __construct($connection, $user) {
        $this->con = $connection;
        $this->user_object = new User_Info($connection, $user);
    }

    public function unreadNotifications() {
        $userLoggedIn = $this->user_object->gettingUsername();
        $unread_notifications_query = mysqli_query($this->con,"SELECT * FROM notifications WHERE viewed='no' AND user_to='$userLoggedIn'");
        return mysqli_num_rows($unread_notifications_query);
    }

    public function getNotifications() {
        $pfp_name = $this->user_object->getPfpName();
        $userLoggedIn = $this->user_object->gettingUsername();
        $get_notifications_query = mysqli_query($this->con,"SELECT * FROM notifications WHERE user_from='$userLoggedIn' OR user_to='$userLoggedIn' ORDER BY id DESC LIMIT 5");

        if(mysqli_num_rows($get_notifications_query) == 0) {
            echo "
            <div id='noti_card' class='mb-3 rounded-2xl bg-white text-black  shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px]'>
            <center class='card-body'>
            <svg class='m-auto' xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 24 24' fill='none'><path d='M16.75 3.56V2c0-.41-.34-.75-.75-.75s-.75.34-.75.75v1.5h-6.5V2c0-.41-.34-.75-.75-.75s-.75.34-.75.75v1.56c-2.7.25-4.01 1.86-4.21 4.25-.02.29.22.53.5.53h16.92c.29 0 .53-.25.5-.53-.2-2.39-1.51-4-4.21-4.25Z' fill='#3b82f6'></path><path opacity='.4' d='M21 10.838v1.74c0 .61-.54 1.08-1.14.98-.28-.04-.57-.07-.86-.07a5.51 5.51 0 0 0-5.5 5.5c0 .46.18 1.1.37 1.68a.998.998 0 0 1-.95 1.32H8c-3.5 0-5-2-5-5v-6.16c0-.55.45-1 1-1h16c.55.01 1 .46 1 1.01Z' fill='#3b82f6'></path><path d='M19 15c-2.21 0-4 1.79-4 4 0 .75.21 1.46.58 2.06A3.97 3.97 0 0 0 19 23c1.46 0 2.73-.78 3.42-1.94.37-.6.58-1.31.58-2.06 0-2.21-1.79-4-4-4Zm2.07 3.57-2.13 1.97c-.14.13-.33.2-.51.2-.19 0-.38-.07-.53-.22l-.99-.99a.754.754 0 0 1 0-1.06c.29-.29.77-.29 1.06 0l.48.48 1.6-1.48c.3-.28.78-.26 1.06.04s.26.77-.04 1.06ZM8.5 15c-.26 0-.52-.11-.71-.29-.18-.19-.29-.45-.29-.71 0-.26.11-.52.29-.71.23-.23.58-.34.91-.27.06.01.12.03.18.06.06.02.12.05.18.09l.15.12c.18.19.29.45.29.71 0 .26-.11.52-.29.71l-.15.12c-.06.04-.12.07-.18.09-.06.03-.12.05-.18.06-.07.01-.14.02-.2.02ZM12 15c-.26 0-.52-.11-.71-.29-.18-.19-.29-.45-.29-.71 0-.26.11-.52.29-.71.38-.37 1.05-.37 1.42 0 .18.19.29.45.29.71 0 .26-.11.52-.29.71-.19.18-.45.29-.71.29ZM8.5 18.499c-.26 0-.52-.11-.71-.29-.18-.19-.29-.45-.29-.71 0-.26.11-.52.29-.71.1-.09.2-.16.33-.21.37-.16.81-.07 1.09.21.18.19.29.45.29.71 0 .26-.11.52-.29.71-.19.18-.45.29-.71.29Z' fill='#3b82f6'></path></svg>
            <p class='px-2 py-2 text-sm text-slate-500'>You're up to date now!</p>
            </center>
          </div> 
            ";
            return;
        }

        $return_string = '';

        while($row = mysqli_fetch_array($get_notifications_query)) {
            $user_info_query = mysqli_query($this->con,"SELECT * FROM users WHERE username='$userLoggedIn'");
            $user_data = mysqli_fetch_array($user_info_query);

            $username = $user_data['username'];

            $message = $row["message"];
            $not_id = $row["id"];


            if (isset($_POST["{$user_data['username']}_{$row['id']}_mark_as_read"])) {
                $connection"";
                $mark_as_read_query = mysqli_query($this->con,"DELETE FROM notifications WHERE id='$not_id' AND message=''");
            }
            


        switch($row['viewed']) {
            case $row['viewed'] == 'no':
            $return_string .= <<<EOT
            <li>
                    <a class='flex bg-slate-100 m-1' href='index.php'>
                        <span class='indicator bg-slate-200 p-1.5 w-10 h-10 text-xl font-semibold text-gray-700 rounded-full flex items-center justify-center'>
                        $pfp_name
                        </span>
                        <span>
                            {$row['message']}
                        </span> 
                        <div class="tooltip tooltip-right" data-tip="Mark As Read">
                            <form class="inline" method="POST" action="index.php">
                                <button type='submit' name='{$user_data['username']}_{$row['id']}_mark_as_read' class='bg-emerald-200 badge w-3 text-black border-none'>
                                    <i class="uil uil-check"></i>
                                </button>     
                            </form>                   
                        </div>
                    </a>
            </li>
            EOT;
            break;
            case $row['viewed'] == 'yes':
            $return_string .= "
            <div id='noti_card' class='mb-3 grid rounded-2xl bg-slate-200/80 text-black border-0 backdrop-blur-xl'>
            <div class='card-body'>
                <h2 class='card-title'>" . $row['message'] . "</h2> 
                <p>You have 3 unread messages. Tap here to see.</p>
                <div class='-top-0 -right-0 absolute dropdown dropdown-end'>
                    <label tabindex='0' class='px-3 py-2 active:scale-125 cursor-pointer text-sm'><i class='uil uil-ellipsis-h'></i></label>
                    <ul tabindex='0' class='dropdown-content menu p-2 shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] bg-white rounded-2xl w-52'>
                    <li><a>Delete</a></li>
                    </ul>
                </div>
            </div>
            </div> 
            ";
            break;
        }
    }
        echo $return_string;
        
    }

    public function pushNewNotification($user_to, $noti_type) {
        $userLoggedIn = $this->user_object->gettingUsername();
        $full_name = $this->user_object->getFullName();

        $current_date = date("Y-m-d H:i:s");

        if($noti_type == 'authentification_accepted') {
            $notify_message = $full_name . "accepted your authentification";
        }
        else if($noti_type == 'request_received') {
            $notify_message = $full_name . " " . "requested to join your event";
        }
        else if($noti_type == 'live_request_received') {
            $notify_message = $full_name . "wants to join your live event";
        }

        $push_notification_query = mysqli_query($this->con,"INSERT INTO notifications VALUES(NULL, '$user_to', '$userLoggedIn',  '$noti_type', '$notify_message', '$current_date', 'no')");
    }
}

?>