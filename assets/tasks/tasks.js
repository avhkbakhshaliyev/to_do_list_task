$(function() {
  const getTasks = () => {
    $.get({
      url: `/tasks/tasksList`,
      dataType: "json",
      success: function (data) {
        let tasks = data.data,
                    rows = "";

        if(!!tasks)
        {
          $.each(tasks, function(i, value) {
            let name = value["name"],
                id = value["id"],
                status = value["status"],
                tdClass = "",
                tdStyle = "";

            if(status == "completed")
            {
              tdClass = "completed";
              tdStyle = "background-color: #d3d3d3 !important; text-decoration: line-through !important; color: #808080 !important;";
            }

            rows += `<tr class="task" data-role="line" data-id="${id}">
                      <td class="${tdClass}" style="${tdStyle}">${name}</td>
                      <td class="${tdClass}" style="${tdStyle}">
                        <a href="tasks/${id}/edit" class="btn btn-primary btn-sm">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-role="btn-delete">Delete</a>
                      </td>
                    </tr>`;
          });
        }
        else
        {
          rows = "<tr><td>No any tasks</td></tr>";
        }

        $(".table-tasks").html(rows);
      },
      error: function (error) {
        alert(error.message);
      },
      complete: function(c) {
      },
    });
  }

  getTasks();

});
