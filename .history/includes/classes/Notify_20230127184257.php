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
        $get_notifications_query = mysqli_query($this->con,"SELECT * FROM notifications
        WHERE user_from='$userLoggedIn' OR user_to='$userLoggedIn'
        ORDER BY viewed = 'no' DESC");

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

            $message = $row["not_message"];
            $not_id = $row["id"];


            if (isset($_POST["{$user_data['username']}_{$row['id']}_mark_as_read"])) {
                $mark_as_read_query = mysqli_query($this->con, "UPDATE notifications SET viewed='yes' WHERE id='$not_id'", MYSQLI_STORE_RESULT);
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
                            {$row['not_message']}
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
                $return_string .= <<<EOT
                <li>
                        <a class='flex m-1' href='index.php'>
                            <span class='indicator bg-slate-200 p-1.5 w-10 h-10 text-xl font-semibold text-gray-700 rounded-full flex items-center justify-center'>
                            $pfp_name
                            </span>
                            <span>
                                {$row['not_message']}
                            </span> 
                        </a>
                </li>
                EOT;
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

    public function display_general_success_noti() {
        $success_alert = <<<EOT
    <div id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 rounded-md p-4" role="alert">
    <div class="flex">
        <div class="flex-shrink-0">
        <svg class="h-4 w-4 text-teal-400 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
        </div>
        <div class="ml-3">
        <div class="text-sm text-teal-800 font-medium">
            File has been successfully uploaded.
        </div>
        </div>
        <div class="pl-3 ml-auto">
        <div class="-mx-1.5 -my-1.5">
            <button type="button" class="inline-flex bg-teal-50 rounded-md p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600" data-hs-remove-element="#dismiss-alert">
            <span class="sr-only">Dismiss</span>
            <svg class="h-3 w-3" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M0.92524 0.687069C1.126 0.486219 1.39823 0.373377 1.68209 0.373377C1.96597 0.373377 2.2382 0.486219 2.43894 0.687069L8.10514 6.35813L13.7714 0.687069C13.8701 0.584748 13.9882 0.503105 14.1188 0.446962C14.2494 0.39082 14.3899 0.361248 14.5321 0.360026C14.6742 0.358783 14.8151 0.38589 14.9468 0.439762C15.0782 0.493633 15.1977 0.573197 15.2983 0.673783C15.3987 0.774389 15.4784 0.894026 15.5321 1.02568C15.5859 1.15736 15.6131 1.29845 15.6118 1.44071C15.6105 1.58297 15.5809 1.72357 15.5248 1.85428C15.4688 1.98499 15.3872 2.10324 15.2851 2.20206L9.61883 7.87312L15.2851 13.5441C15.4801 13.7462 15.588 14.0168 15.5854 14.2977C15.5831 14.5787 15.4705 14.8474 15.272 15.046C15.0735 15.2449 14.805 15.3574 14.5244 15.3599C14.2437 15.3623 13.9733 15.2543 13.7714 15.0591L8.10514 9.38812L2.43894 15.0591C2.23704 15.2543 1.96663 15.3623 1.68594 15.3599C1.40526 15.3574 1.13677 15.2449 0.938279 15.046C0.739807 14.8474 0.627232 14.5787 0.624791 14.2977C0.62235 14.0168 0.730236 13.7462 0.92524 13.5441L6.59144 7.87312L0.92524 2.20206C0.724562 2.00115 0.611816 1.72867 0.611816 1.44457C0.611816 1.16047 0.724562 0.887983 0.92524 0.687069Z" fill="currentColor"/>
            </svg>
            </button>
        </div>
        </div>
    </div>
    </div>
    EOT;
            echo $success_alert;
    }
}

?>