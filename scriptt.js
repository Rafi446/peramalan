// menggunakan library javascript yaitu jquery
$(document).ready(function () {
  $("#cari").on("keyup", function () {
    $.get("hasilpencarian.php?keyword=" + $("#cari").val(), function (data) {
      $("#hasil").html(data);
    });
  });
});
