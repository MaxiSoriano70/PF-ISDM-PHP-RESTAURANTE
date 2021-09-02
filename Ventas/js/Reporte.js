$(document).ready(function() {
 $("#btn-reporte").on('click',function(){
  $("#CReporte").modal("show");
 });

 $('#btnCerrar').on('click',function(){
  $("#formReporte").trigger('reset');
 });
});

