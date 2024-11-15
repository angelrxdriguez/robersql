$(document).ready(function () {
  $(".crear").on("click", function () {
      $("#popupCrear").show();
  });

  $("#aceptarCrear").on("click", function () {
    $("#popupCrear").hide();
});


  $("#cancelarCrear").on("click", function () {
      $("#popupCrear").hide();
  });

  $(".eliminar").on("click", function () {
    $("#popupEliminar").show();
});

$("#cancelarEliminar").on("click", function () {
    $("#popupEliminar").hide();
});

  $("#aceptarEliminar").on("click", function () {

      $("#popupEliminar").hide();
  });

  $("#cancelarEliminar").on("click", function () {
      $("#popupEliminar").hide();
  });

  $(".modificar").on("click", function () {
    $("#popupModificar").show();
});

$("#cancelarModificar").on("click", function () {
    $("#popupModificar").hide();
});


  $("#cancelarModificar").on("click", function () {
      $("#popupModificar").hide();
  });
});
