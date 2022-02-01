$(document).ready(function() {
  $("input#otraOficina").click(function(event) {
      if ($(this).is(":checked")) {
          $("input#nuevaOficina").removeAttr("disabled");
      } else {
          $("input#nuevaOficina").attr("disabled", "");
      }
  });

  $("input#otroUso").click(function(event) {
      if ($(this).is(":checked")) {
          $("input#nuevoUso").removeAttr("disabled");
      } else {
          $("input#nuevoUso").attr("disabled", "");
      }
  });
});