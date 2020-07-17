// $.ajaxSetup({
//     "headers": {
//         "accept": "application/json",
//         "Access-Control-Allow-Origin":"*"
//     }
// });
$("#govenorates").change(function () {
    // alert("Hi");
    // $.ajax({
    //     url: "https://ipda3-tech.com/blood-bank/api/v1/governorates",
    //     contentType: 'text/plain',
    //     xhrFields: {
    //         // The 'xhrFields' property sets additional fields on the XMLHttpRequest.
    //         // This can be used to set the 'withCredentials' property.
    //         // Set the value to 'true' if you'd like to pass cookies to the server.
    //         // If this is enabled, your server must respond with the header
    //         // 'Access-Control-Allow-Credentials: true'.
    //         withCredentials: false
    //     },
    //     success: function (result) {
    //         console.log(result);
    //     }
    // });
    $.ajax({

        // The 'type' property sets the HTTP method.
        // A value of 'PUT' or 'DELETE' will trigger a preflight request.
        type: 'GET',

        // The URL to make the request to.
        url: 'https://ipda3-tech.com/blood-bank/api/v1/governorates',

        // The 'contentType' property sets the 'Content-Type' header.
        // The JQuery default for this property is
        // 'application/x-www-form-urlencoded; charset=UTF-8', which does not trigger
        // a preflight. If you set this value to anything other than
        // application/x-www-form-urlencoded, multipart/form-data, or text/plain,
        // you will trigger a preflight request.
        contentType: 'text/plain',

        xhrFields: {
            // The 'xhrFields' property sets additional fields on the XMLHttpRequest.
            // This can be used to set the 'withCredentials' property.
            // Set the value to 'true' if you'd like to pass cookies to the server.
            // If this is enabled, your server must respond with the header
            // 'Access-Control-Allow-Credentials: true'.
            withCredentials: false
        },

        headers: {
            // Set any custom headers here.
            // If you set any non-simple headers, your server must include these
            // headers in the 'Access-Control-Allow-Headers' response header.
        },

        success: function(result) {
            // Here's where you handle a successful response.
            console.log(result);
        },

        error: function() {
            // Here's where you handle an error response.
            // Note that if the error was due to a CORS issue,
            // this function will still fire, but there won't be any additional
            // information about the error.
        }
    });
});
$(document).ready(function () {
    $('#owl-articles').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
                loop: false,
                margin: 20
            }
        }

    })
});
//loader  
// $(window).on("load", function () {
//
//     $("body").css("overflow", "auto");
//     $(".overlay").fadeOut(2000);
//
// });






