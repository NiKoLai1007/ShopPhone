$("#productSubmit").on('click', function(e) {
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
        url: "/api/products",
        data: formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "json",
        success: function(data) {
            console.log(data.product.img_path);

            $("#itemModal").modal("hide");
            // var img = "<img src="+value.img_path +" width='200px', height='200px'/>";
                var img = "<img src="+data.product.img_path +" width='200px', height='200px'/>";
                var tr = $("<tr>");
                tr.append($("<td>").html(data.product.product_id));
                tr.append($("<td>").html(img));
                tr.append($("<td>").html(data.product.description));
                tr.append($("<td>").html(data.product.sell_price));
                tr.append($("<td>").html(data.product.cost_price));
                tr.append("<td align='center'><a href='#' data-bs-toggle='modal' data-bs-target='#productModal' id='editbtn' data-id="+ data.product.product_id + "><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px' ></a></i></td>");
                tr.append("<td><a href='#'  class='deletebtn' data-id="+ data.product.product_id + "><i  class='fa fa-trash-o' style='font-size:24px; color:red' ></a></i></td>");
                $('#itable').prepend(tr.hide().fadeIn(5000));
        },
        error: function(error) {
            console.log('error');
        }
    });













































    
  });


