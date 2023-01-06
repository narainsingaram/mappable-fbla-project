// Get the form element
var form = document.getElementById('section');

// Add an event listener to the form
form.addEventListener('submit', function (event) {
    // Prevent the form from submitting
    event.preventDefault();

    // Get the form data
    var data = new FormData(form);

    // Send an AJAX request to the server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'insert.php');
    xhr.onload = function () {
        if (xhr.status === 200) {
            // If the request is successful, update the page with the new information
            document.getElementById('insert-results').innerHTML = xhr.responseText;
        }
    };
    xhr.send(data);
});