$(function() {
  const getUnis = (keyword = "") => {
    $.get({
      url: `/student/unisList?keyword=${keyword}`,
      dataType: "json",
      success: function (data) {
        let unis = data.data,
                    rows = "";

        $.each(unis, function(i, value) {
          let uni = value['university'];
          let uniLower = uni.toLowerCase();

          rows += `<tr><td><a href="student/list/${uniLower}">${uni}</a></td></tr>`;
        });

        $(".table-unis").html(rows);
      },
      error: function (error) {
        alert(error.message);
      },
      complete: function(c) {
      },
    });
  };

  getUnis();

  $('[data-role="search"]').on("keyup", function() {
    let keyword = $(this).val();

    getUnis(keyword);
  });
});
