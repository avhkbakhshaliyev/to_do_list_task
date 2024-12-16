$(function () {
  $(document).on("click", '[data-role="btn-delete"]', function() {
    let self = $(this),
        id = self.parents("tr").data("id");

    $.ajax({
      type: "DELETE",
      url: `task/${id}/delete`,
      dataType: "json",
      success: function (data) {
        console.log(data.message);
        self.parents("tr").remove();
        alert("Task deleted successfully!");
      },
      error: function (error) {
        alert(error.message);
      },
      complete: function (c) {
      },
    });
  });
});
