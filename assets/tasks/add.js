$(function () {
  $('[data-role="btn-add"]').click(function() {
    let data = {
      name: $(`[data-role="name"]`).val()?.trim(),
      descr: $(`[data-role="descr"]`).val()?.trim(),
      status: $(`[data-role="status"]`).val()?.trim()
    };

    $.post({
      url:"create",
      data,
      dataType: "json",
      success: function (data) {
        console.log(data.message);
        window.location.href = "/tasks";
      },
      error: function (error) {
        alert("Error");
      },
      complete: function (c) {
      },
    });
  });
});
