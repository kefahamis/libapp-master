// import 'jquery/dist/jquery.min.js';
// import $ from 'jquery';
// import jQuery from 'jquery';

// jQuery(function () {

//     function loadSection(section) {
//         $.ajax({
//             url: section,
//             type: 'GET',
//             success: function (response) {
//                 $('#main-content').html(response);
//             },
//             error: function () {
//                 alert('An error occurred while loading the section.');
//             }
//         });
//     }



//     // Store the currently displayed URL
//     var currentUrl = window.location.pathname;

//     // function loadContent(url) {

//     //     $.ajax({
//     //         url: 'data',
//     //         type: 'post',
//     //         data: {
//     //             resource: url
//     //         },
//     //         success: function (response) {
//     //             console.log(response);
//     //             $('#main-content').html(response);
//     //         },
//     //         error: function (error) {
//     //             // Handle error response here
//     //             console.error(error);
//     //         }
//     //     });
//         // axios.get(url)
//         //     .then(function (response) {
//         //         $('#main-content').append(response);
//         //         currentUrl = url;
//         //     })
//         //     .catch(function (error) {
//         //         console.error(error);
//         //     });



//     // // Define a function to handle link clicks
//     function handleLinkClick(e) {
//         e.preventDefault(); // Prevent the default link behavior

//         // Get the href attribute of the clicked link
//         var href = $(this).attr('href');

//         // Load content dynamically based on the href
//         loadContent(href);

//         // Update the browser's address bar with the new URL
//         window.history.pushState(null, null, href);
//     }


//     $('body').on('click', 'a', handleLinkClick);

//     // $('#generate').on('click', function (e) {
//     //     e.preventDefault();
//     //     const url = 'api/v1/apikeys/' + id;
//     //     generateAPI()
//     //     function generateAPI() {
//     //         $.ajax({
//     //             type: "GET",
//     //             url: `${url}`,
//     //             dataType: "json",
//     //             success: function (response) {
//     //                 // console.log(response);
//     //                 getAPI(id);
//     //             },
//     //             error: function (jqXHR, status, error) {
//     //                 // console.log(jqXHR);
//     //             }
//     //         });
//     //     }
//     // });

// })
