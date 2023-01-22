<?php 
class Web {
    public function display_event_form() {
        echo '<form action="index.php" method="POST" enctype="multipart/form-data">';
        echo '<input name="user_title" type="text" placeholder="Event Title" class="inline-flex items-center py-2 px-3 text-sm font-medium text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl">';
        echo '<select name="user_type" class="inline-flex items-center py-2 px-3 text-sm font-medium text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl">';
        echo '<option value="Choose Type of Event">Choose Type of Event</option>';
        echo '<option value="Academic">Academic</option>';
        echo '<option value="Extracurricular">Extracurricular</option>';
        echo '<option value="Sports">Sports</option>';
        echo '<option value="Other">Other</option>';
        echo '</select><br>';
        echo '<input type="date" name="user_date" id="" class="inline-flex items-center py-2 px-3 text-sm font-medium text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl">';
        echo '<input type="time" name="user_start" id="" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl">';
        echo '<input type="time" name="user_end" id="" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl"><br>';
        echo '<input type="text" name="user_desc" placeholder="Description of Your Event" class="inline-flex items-center py-2 px-3 text-sm font-medium text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl pt-12">';
        echo '<button name="user_submit" class="align-middle inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl" type="submit">Submit</button>';
        echo '</form>';
    }
}


?>
