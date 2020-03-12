function init() {
  $(".valide").click(valide)
}

function valide() {
  var valide;
  if ($(this).is(':checked')) {
    valide = 1;
  } else {
    valide = 0;
  }
  var id = $(this).val();
  var path = window.location.pathname;
  var base = path.split("/");
  url = window.location.origin + "/" + base[1] +"/ajax/valide_tache.php";
  console.log(url);


    $.ajax({
      type: 'POST',
      url: url,
      data: {
        valide: valide,
        id: id
      },
      timeout: 5000,
      success: function() {

      },
      error: (xhr) => {
        console.log("status =" + xhr.status);
        console.log(xhr);
      }
    });


}

$(document).ready(function() {
  init();
});
