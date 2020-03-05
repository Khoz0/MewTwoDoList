function init() {
  $("#delete").click(deleteTache)
}

function deleteTache() {
  var id = $(this).val();
  url = window.location.origin + "/mew_two_do_list/ajax/delete_tache.php";
  console.log(url);

  if (confirm('Êtes vous sûr de vouloir supprimer votre tâche ?\nCette action est définitive !')) {

    $.ajax({
      type: 'POST',
      url: url,
      data: {
        id: id
      },
      timeout: 5000,
      success: function() {
        window.opener.location.reload(true);
        window.close();
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
