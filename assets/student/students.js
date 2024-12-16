$(function() {
  const getStudents = (keyword = "") => {
    let uni = $("th").attr("data-uni");

    $.get({
      url: `/student/studentsList/${uni}/?keyword=${keyword}`,
      dataType: "json",
      success: function (data) {
        let students = data.data,
                    rows = "";

        $.each(students, function(i, value) {
          let id = value["id"],
              name = value["name"],
              age = value["age"];

          rows += `<tr>
                    <td>${name}</td>
                    <td>${age}</td>
                    <td>
                      <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-role="btn-delete" data-id="${id}">Delete</a>
                    </td>
                  </tr>`;
        });

        $(".table-students").html(rows);
      },
      error: function (error) {
        alert(error.message);
      },
      complete: function(c) {
      },
    });
  };

  getStudents();

  $('[data-role="search"]').on("keyup", function() {
    let keyword = $(this).val();

    getStudents(keyword);
  });
});
