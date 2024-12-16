$(function() {
  console.log("test");
  $(document).on("click", '[data-role="btn-delete"]', function() {
    console.log("slm");
    let id = $(this).data("id"),
        self = $(this);

    $.ajax({
      type: "DELETE",
      url: `/student/${id}/delete`,
      dataType: "json",
      success: function (data) {
        console.log(data.message);
        self.parents("tr").remove();
        alert("Student deleted successfully!");
      },
      error: function (error) {
        alert(error.message);
      },
      complete: function (c) {

      }
    });
  });
});
