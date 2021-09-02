$('.Header-Der').click(function(e) {
 e.preventDefault();
});

$(document).ready(function () {

// Ocultamos el boton de Arriba 
 $('#ha').css('visibility','hidden');

 // Ocultamos los Inputs en la card-b y mostramos el texto y ocultamos su btn editar
 $('.Inputs-b').css('display','none');
 $('.Vacio-b').css('display','block');
 $('#hb').css('visibility','hidden');

 //Function para cambiar de la card-a a la card-b cuando se aprete el boton de continuar
 $('.b-a').on('click',function() {
  $('.Inputs-a').css('display','none');
  $('#sn-a').html($('#Email').val());
  $('#sn-b').html($('#Nombre').val()+' '+$('#Apellido').val());
  $('#sn-c').html($('#Contacto').val());
  $('.Oculto-a').css('display','block');
  $('#ha').css('visibility','visible');

  $('.Inputs-b').css('display','block');
  $('.Vacio-b').css('display','none');
 });

 //Function para cambiar de la card-b a la card-c cuando se aprete el boton de continuar
 $('.b-b').on('click',function() {
  $('.Inputs-b').css('display','none');
  $('#sn-d').html($('#Direccion').val());
  $('#sn-e').html($('#Ciudad').val());
  $('#sn-f').html($('#Postal').val());
  $('.Oculto-b').css('display','block');
  $('#hb').css('visibility','visible');
 });

 // Funciones para desplegar las cajas 
 $('#ha').click(function(){
  $('.Inputs-a').css('display','block');
  $('.p-vacio-a').css('display','none');
  $('.Oculto-a').css('display','none');
 });

 $('#hb').click(function(){
  $('.Inputs-b').css('display','block');
  $('.p-vacio-b').css('display','none');
  $('.Oculto-b').css('display','none');
 });

});