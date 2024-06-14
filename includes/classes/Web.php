<?php 
class Web {
    public function disp_evt_mo() {
        $html = <<<EOT
        <input type="checkbox" id="create_event" class="modal-toggle hidden">
        <div class="modal fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
            <div class="modal-box bg-white p-6 rounded-lg shadow-lg relative max-w-lg w-full">
                <label for="create_event" class="btn btn-sm btn-circle absolute right-2 top-2 cursor-pointer text-gray-500">✕</label>
                <h3 class="text-xl font-semibold mb-4">Create a Space</h3>
                <form action="{$_SERVER['PHP_SELF']}" method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="user_title" class="block text-sm font-medium text-gray-500">Event Title</label>
                        <input name="user_title" type="text" placeholder="Event Title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="user_type" class="block text-sm font-medium text-gray-500">Type of Event</label>
                        <select name="user_type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" required>
                            <option value="" disabled selected>Choose Type of Event</option>
                            <option value="Academic">Academic</option>
                            <option value="Extracurricular">Extracurricular</option>
                            <option value="Sports">Sports</option>
                            <option value="Environmental">Environmental</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="user_date" class="block text-sm font-medium text-gray-500">Event Date</label>
                        <input type="date" name="user_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="user_start" class="block text-sm font-medium text-gray-500">Start Time</label>
                        <input type="time" name="user_start" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="user_end" class="block text-sm font-medium text-gray-500">End Time</label>
                        <input type="time" name="user_end" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="user_desc" class="block text-sm font-medium text-gray-500">Event Description</label>
                        <textarea name="user_desc" placeholder="Description of Your Event" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" rows="4" required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button name="user_submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
EOT;
        echo $html;
    }

    public function displayFundamentalSuccessAlert() {
        $success_alert = <<<EOT
    <div class="fixed top-0 w-full mx-auto">
        <div id="toast-success" class="flex items-center max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px]" role="alert">
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
    </div>
    EOT;
            echo $success_alert;
    }

    public function displayFundamentalInvalidAlert() {
        $success_alert = <<<EOT
    <div class="fixed top-0 w-full mx-auto">
        <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Item has been deleted.</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
    EOT;
            echo $success_alert;
    }
}





