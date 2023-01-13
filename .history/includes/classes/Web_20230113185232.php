<?php 
class Web {
    public function display_event_form() {
        $html = <<<EOT
        <form action="index.php" method="POST" enctype="multipart/form-data">
        <input name="user_title" type="text" placeholder="Event Title" class="inline-flex items-center py-2 px-3 text-sm font-medium text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl">
        <select name="user_type" class="inline-flex items-center py-2 px-3 text-sm font-medium text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl">
        <option value="Choose Type of Event">Choose Type of Event</option>
        <option value="Academic">Academic</option>
        <option value="Extracurricular">Extracurricular</option>
        <option value="Sports">Sports</option>
        <option value="Other">Other</option>
        </select><br>
        <input type="date" name="user_date" id="" class="inline-flex items-center py-2 px-3 text-sm font-medium text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl">
        <input type="time" name="user_start" id="" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl">
        <input type="time" name="user_end" id="" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl"><br>
        <input type="text" name="user_desc
    }
}


?>
