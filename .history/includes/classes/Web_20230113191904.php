<?php 
class Web {
    public function display_event_form() {
        $html = <<<EOT
    <input type="checkbox" id="create_event" class="modal-toggle" />
        <div class="modal">
        <div class="modal-box bg-white relative">
            <label for="create_event" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Create a Space</h3>
            <form class='inline' action="index.php" method='POST'>
                <input type="text" name="space_name">
                <input type="text" name="space_bio">
                <button name='create_space' class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-blue-500 bg-blue-200/60 cursor-pointer rounded-xl' type="submit">Confirm</button>
            </form>
        </div>
        </div>
EOT;
        echo $html;
    }
}




?>
