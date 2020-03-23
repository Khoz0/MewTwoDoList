function init() {
  $("#supprimer").click(deleteNotif);
}

function deleteNotif() {

  var path = window.location.pathname;
  var base = path.split("/");
  url = window.location.origin + "/" + base[1] + "/ajax/delete_notif.php";
  var notif = [];
  $(":checked").each(function() {
    notif.push($(this).data("id"));
  });

  if (notif.length > 0) {
    $.ajax({
      type: 'POST',
      url: url,
      data: {
        id: JSON.stringify(notif)
      },
      timeout: 5000,
      success: function() {
        window.location.reload(true);

      },
      error: (xhr) => {
        console.log("status =" + xhr.status);
        console.log(xhr);
      }
    });
  }




}

$(document).ready(function() {
  init();
});
