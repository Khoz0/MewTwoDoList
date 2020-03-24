function init() {
  $("#suppr").click(deleteNotif);
  $("#check").off('click');
  $("#check").click(check);
}

function deleteNotif() {
  var path = window.location.pathname;
  if (path == "/") {
    url = window.location.origin + "/ajax/delete_notif.php";
  } else {
    var base = path.split("/");
    url = window.location.origin + "/" + base[1] + "/ajax/delete_notif.php";
  }
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

function check() {
  if ($("[type=checkbox]:checked").length == $("[type=checkbox]").length) {
    uncheckAll();
    $("#check").html("Tout sélectionner");
  } else {
    checkAll();
    $("#check").html("Tout désélectionner");
  }

}


function checkAll() {
  $("[type=checkbox]").each(function(){
      $(this).prop("checked", true);
  });
}

function uncheckAll() {
  $("[type=checkbox]").each(function(){
      $(this).prop("checked", false);
  });
}

$(document).ready(function() {
  init();
});
