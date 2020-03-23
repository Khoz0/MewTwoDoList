function init() {
  $("#check").off('click');
  $("#check").click(check);
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
