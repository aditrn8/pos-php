let baseUrl = $("base").attr("href");

$(document).ready(function() {
  let year = (new Date).getFullYear();
  daterange();

  function daterange() {
    $("#default-daterange").daterangepicker({
      opens: "right",
      format: "MM/DD/YYYY",
      separator: " to ",
      minDate: "01/01/" + year,
      maxDate: "12/31/" + year,
    }, function(e, t) {
      $("#default-daterange input").val(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"));
    });
  }

  if ($("small.text-danger").length > 0) {
    toggleForm();
  }

  $("#toggleForm").on("click", function() {
    if ($(this).html() == "New") {
      clearField();
      daterange();
    } else {
      toggleForm();
    }
  });

  function toggleForm() {
    $("#form").toggle(500);
    $("#btnSubmit").toggleClass("display-none");
    if ($("#lv_trans_id").val() != "") {
      $("#toggleForm").html("New");
      toggleLoading();
    } else {
      clearField();
    }
  }

  function clearField() {
    $("#lv_trans_id").val("");
    $("#type").val("");
    $("#leave_periode").val("");
    $("#notes").val("");
    $("#toggleForm").html('<i class="fa fa-plus"></i> Form cuti');
  }

  function toggleLoading() {
    $(".loading").toggleClass("display-none");
  }

  $("#dataTable").on("click", ".btn-primary", function() {
    toggleLoading();
    let id = $(this).data("id");

    $.ajax({
      url: "cuti/getselfcuti",
      type: "POST",
      data: {
        lv_trans_id: id
      },

      success: function(data) {
        data = JSON.parse(data);

        $("#lv_trans_id").val(data["lv_trans_id"]);
        $("#type").val(data["lv_type_id"]);
        $("#leave_periode").val(data["start"] + " - " + data["end"]);
        $("#notes").val(data["lv_notes"]);

        $("#default-daterange").daterangepicker({
          opens: "right",
          format: "MM/DD/YYYY",
          startDate: data["lv_start"],
          endDate: data["lv_end"],
          separator: " to ",
          minDate: "01/01/" + year,
          maxDate: "12/31/" + year,
        }, function(e, t) {
          $("#default-daterange input").val(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"));
        });

        if ($("#btnSubmit").hasClass("display-none")) {
          toggleForm();
        } else {
          $("#toggleForm").html("New");
          toggleLoading();
        }
      }
    });
  });

  $("#dataTable").on("click", ".btn-danger", function() {
    toggleLoading();
    let trans_id = $(this).data("id");

    $.ajax({
      url: "cuti/deletecuti",
      type: "POST",
      data: {
        trans_id: trans_id
      },

      success: function(data) {
        dataTable.ajax.reload(null, false);
      }
    });
  });
});