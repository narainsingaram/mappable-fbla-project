// function submitForm() {
//     // Get the form data
//     var name = $("#name").val();
//     var email = $("#email").val();

//     if (name === "" || email === "") {
//         alert("Please fill out all fields.");
//         return; // Return early to exit the function
//     }

//     // Make an AJAX request
//     $.ajax({
//         url: "index.php",
//         type: "POST",
//         data: { name: name, email: email },
//         success: function (response) {
//             console.log("Form submitted successfully!");
//         },
//         error: function (xhr, status, error) {
//             console.log("There was an error submitting the form.");
//         }
//     });
// }

// $("#myForm").submit(function (event) {
//     event.preventDefault(); // Prevent the form from resetting and the page from refreshing
//     event.returnValue = false; // Stop form from submitting when page 
//     submitForm(); // Call the function to submit the form
// });

// $(document).ready(function () {
//     $('#event_form').submit(function (event) {
//         event.preventDefault();

//         var title = $('#user_title').val();
//         var type = $('#user_type').val();
//         var date = $('#user_date').val();
//         var start = $('#user_start').val();
//         var end = $('#user_end').val();
//         var desc = $('#user_desc').val();
//         var image = $('#user_image').val();

//         $.ajax({
//             url: "post.php",
//             type: "POST",
//             data: {
//                 user_submit: 1,
//                 user_title: title,
//                 user_type: type,
//                 user_date: date,
//                 user_start: start,
//                 user_end: end,
//                 user_desc: desc,
//                 user_image: image
//             },
//             success: function (response) {
//                 console.log(response);
//             }
//         });
//     });
// });
