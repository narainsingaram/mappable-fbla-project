<?php 
class Web {
    public function disp_evt_mo() {
        $html = <<<EOT
    <input type="checkbox" id="create_event" class="modal-toggle" />
        <div class="modal">
        <div class="modal-box bg-white relative">
            <label for="create_event" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Create a Space</h3>
                <form action="{$_SERVER['PHP_SELF']}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" name="user_desc" placeholder="Description of Your Event" class="inline-flex items-center py-2 px-3 text-sm font-medium text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl pt-12">
                    <button name="user_submit" class="align-middle inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl" type="submit">Submit</button>
                </form>
            </div>
        </div>
EOT;
        echo $html;
    }

    public function display_general_success_noti() {
        $success_alert = <<<EOT
    <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px]" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">Task Successfully Completed</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    EOT;
            echo $success_alert;
    }
}




?>
