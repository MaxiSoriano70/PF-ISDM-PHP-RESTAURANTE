const inputs = document.querySelectorAll(".input");

function addcl(){
 let parent = this.parentNode.parentNode;
 parent.classList.add("focus");
}

function remcl(){
 let parent = this.parentNode.parentNode;
 if(this.value == ""){
  parent.classList.remove("focus");
 }
}

inputs.forEach(input => {
 input.addEventListener("focus", addcl);
 input.addEventListener("blur", remcl);
});

$(document).ready(function(){
 $(".btn").prop('disabled',true);
});


$('#is').click(function() {

 var Input = document.getElementById('ca');
   
 if ($('#icontra').hasClass('Inv')) {
  $('.far')
  .removeClass('fa-eye-slash')
  .addClass('fa-eye');
   
  $('.Inv')
  .removeClass('Inv')
  .addClass('Vis');
    
  Input.type='password';
 }
   
 else if ($('#icontra').hasClass('Vis')) {
  $('.far')
  .removeClass('fa-eye')
  .addClass('fa-eye-slash');
         
  $('.Vis')
  .removeClass('Vis')
  .addClass('Inv');
   
  Input.type='text';
 }
   
});

$("#nc").keyup(function () {  

 var Pass = $("#nc").val();
 if (Pass.length>=8) {
  const pattern = /^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ]/;
  if (!pattern.test(Pass)) {
   $('#pdib').html('Debe contener letras (Mayusculas y Minúsculas) y Numeros');
   $('#pdib').css('color','#ff2e43');
   $('#icoc').val('0');
   $("#ic2") 
   .removeClass('fas fa-key fas fa-check-circle')
   .addClass('fas fa-times-circle');
  }
  else {
   $('#pdib').html('');
   $('#icoc').val('1');
   $("#ic2")
   .removeClass('fas fa-key fas fa-times-circle')
   .addClass('fas fa-check-circle');
   $("#rc").prop('disabled',false);
  }
 }
 else {
  $('#pdib').html('Debe contener minimo 8 Carácteres');
  $('#pdib').css('color','#ff2e43'); 
  $('#icoc').val('0');
  $("#ic2") 
  .removeClass('fas fa-key fas fa-check-circle')
  .addClass('fas fa-times-circle');
  $(".btn").prop('disabled',true);
  $("#rc").prop('disabled',true);
 }
});

$("#rc").keyup(function (){
 var nc = $("#nc").val();
 var rc = $("#rc").val();
   
 if (nc==rc) {
  $("#ic3")
  .removeClass('fas fa-key fas fa-times-circle')
  .addClass('fas fa-check-circle');

  $(".btn").prop('disabled',false);
 }
 else {
  $("#ic3") 
  .removeClass('fas fa-key fas fa-check-circle')
  .addClass('fas fa-times-circle');
  $(".btn").prop('disabled',true);
 }
});