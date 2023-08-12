window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

$("#itemSubmit").on('click', function(e) {
    e.preventDefault();
    // var data = $("#iform");
    var data = $('#iform')[0];
    console.log(data);
    let formData = new FormData($('#iform')[0]);
    // var data = $("#iform").serialize();
    // console.log(formData.entries());
    console.log(formData);
    for (var pair of formData.entries()) {
    console.log(pair[0]+ ', ' + pair[1]);
  }

    $.ajax({
        type: "POST",
        url: "/api/item",
        data: formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "json",
        success: function(data) {
            console.log(data.item.img_path);

            $("#itemModal").modal("hide");
            // var img = "<img src="+value.img_path +" width='200px', height='200px'/>";
                var img = "<img src="+data.item.img_path +" width='200px', height='200px'/>";
                var tr = $("<tr>");
                tr.append($("<td>").html(data.item.item_id));
                tr.append($("<td>").html(img));
                tr.append($("<td>").html(data.item.description));
                tr.append($("<td>").html(data.item.sell_price));
                tr.append($("<td>").html(data.item.cost_price));
                tr.append("<td align='center'><a href='#' data-bs-toggle='modal' data-bs-target='#itemModal' id='editbtn' data-id="+ data.item.item_id + "><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px' ></a></i></td>");
                tr.append("<td><a href='#'  class='deletebtn' data-id="+ data.item.item_id + "><i  class='fa fa-trash-o' style='font-size:24px; color:red' ></a></i></td>");
                $('#itable').prepend(tr.hide().fadeIn(5000));
        },
        error: function(error) {
            console.log('error');
        }
    });
  });
