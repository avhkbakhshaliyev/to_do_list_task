$(function () {
  $('[data-role="btn-update"]').click(function() {
    $('#overlay').removeClass('d-none');
    let id = $(this).attr("data-id");
    let data = {
      name: $(`[data-role="name"]`).val()?.trim(),
      descr: $(`[data-role="descr"]`).val()?.trim(),
      status: $(`[data-role="status"]`).val()?.trim()
    };

    $.ajax({
      type: "PUT",
      url: `/tasks/update/${id}`,
      data,
      dataType: "json",
      success: function (data) {
        console.log(data.message);
        $("#message").text("Task updated successfully!");
      },
      error: function (error) {
        alert("Error");
      },
      complete: function (c) {
        $('#overlay').addClass('d-none');
      },
    });
  });
});
