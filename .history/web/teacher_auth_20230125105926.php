<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

    $select_events_query = mysqli_query($connection, "SELECT * from authentifications WHERE authentifier='$userLoggedIn' AND accepted='no' ORDER BY id");

    $authentifications_content = "";
?>
<main class=''>  
<ol class='relative border-l mx-5 border-gray-200'> 
<?php

    while($auth_rows = mysqli_fetch_array($select_events_query)) {
        $id = $auth_rows['id'];
        $authentifier = $auth_rows['authentifier'];
        $requester = $auth_rows['requester'];
        $title = $auth_rows['title'];
        $image = $auth_rows['image'];
        $desc = $auth_rows['description'];

        $requester_query = mysqli_query($connection, "SELECT first_name, last_name FROM users WHERE username='$requester'");
        $select_request_details = mysqli_fetch_assoc($requester_query);

        $requester_first_name = $select_request_details['first_name'];
        $requester_last_name = $select_request_details['last_name'];
    
        if(isset($_POST["auth_verify$id-$requester"])) {
            $point_value = $_POST['add_points'];
            $gem_value = $_POST['add_gems'];

            //Update authentification as accepted in database table
            $authenticate_query = mysqli_query($connection,"UPDATE authentifications SET accepted = 'yes' WHERE id = '$id' AND requester = '$requester'");

            //Adding points and gems that authentifer wants on submit of form
            $add_points_query = mysqli_query($connection,"UPDATE users SET points = points + $point_value WHERE username = '$requester' ");
            $add_gems_query = mysqli_query($connection,"UPDATE users SET gems = gems + $gem_value WHERE username = '$requester' ");
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
?>
</ol>
</main>