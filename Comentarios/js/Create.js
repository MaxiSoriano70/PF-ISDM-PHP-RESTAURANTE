window.addEventListener("loadstart",
$('.ie').css('visibility','hidden')
);

$(document).ready(function(){
 var User = $('#UsOc').val();
 if (User==0) {
  $("#bsenviar").prop('disabled',true);
  $('.btncom')
  .removeClass('btncom')
  .addClass('btncomd');
  $('.Parraf').css('visibility','visible');
 }
 else {
  $("#bsenviar").prop('disabled',false);
  $('.btncomd')
  .removeClass('btncomd')
  .addClass('btncomd');
  $('.Parraf').css('visibility','hidden');
 }
});

function Puntuacion(data){
 var estrella=data;
 document.getElementById("Estrellas").value=estrella;
 $('.ie').css('visibility','hidden');
}

$('#formPuntuacion').submit(function(e) {
 var Puntos = $('#Estrellas').val();
 if (Puntos.length==0) {
  e.preventDefault();  
  $('.ie').css('visibility','visible');
 }
 else {
  $('.ie').css('visibility','hidden');
 }
});
