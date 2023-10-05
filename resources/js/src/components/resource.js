import 'jquery/dist/jquery.min.js';
import $ from 'jquery';
import jQuery from 'jquery';

jQuery(function () {


    // let link = '';

    // if (link = 'subscriptions') {
    //     $(`#${link}`).on('click', function (e) {
    //         e.preventDefault();
    //         loadContent(link);
    //         window.history.pushState(null, null, link);
    //     });
    // }

    // if (link = 'dashboard') {
    //     $(`#${link}`).on('click', function (e) {
    //         e.preventDefault();
    //         loadContent(link);
    //         window.history.pushState(null, null, link);
    //     });
    // }

    // function loadContent(link) {
    //     axios.get(link)
    //         .then(function (response) {
    //             $('#main-content').html(response.data);
    //         })
    //         .catch(function (error) {
    //             console.error(error);
    //         });
    // }

    function fetchSubscriptions() {
        $.ajax({
            type: "GET",
            "url": "api/subscriptions",
            dataType: "json",
            "headers": {
                "Accept": "application/vnd.api+json",
            },
            success: function (response) {
                $.map(response, function ({ subscription_type, status, max_courses, max_subscription_users, start_date, end_date }, index) {
                    $('#TableBody').append('<tr key=`${index}`>\
                        <td>'+ subscription_type + '</td>\
                        <td>'+ status + '</td>\
                        <td>'+ max_courses + '</td>\
                        <td>'+ max_subscription_users + '</td>\
                        <td>'+ start_date + '</td>\
                        <td>'+ end_date + '</td>\
                    </tr>'
                    );
                });
            },
            error: function (jqXHR) {
                $('#TableBody').html('');
            }
        });
    }

    fetchSubscriptions();

    function fetchCourses() {
        $.ajax({
            type: "GET",
            "url": "api/hr/courses",
            dataType: "json",
            "headers": {
                "Accept": "application/vnd.api+json",
            },
            success: function (response) {

                console.log(response);
                $.map(response.data.data, function ({ name, status, cpd_hours, start_date, end_date }, index) {
                    $('#CoursesTable').append('<tr key=`${index}`>\
                        <td>'+ name + '</td>\
                        <td>'+ status + '</td>\
                        <td>'+ cpd_hours + '</td>\
                        <td>'+ start_date + '</td>\
                        <td>'+ end_date + '</td>\
                    </tr>'
                    );
                });


            },
            error: function (jqXHR) {
                $('#CoursesTable').html('');
            }
        });
    }

    fetchCourses();

});
