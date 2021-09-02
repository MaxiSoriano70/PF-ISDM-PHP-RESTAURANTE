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


$('.i').click(function() {

 var Input = document.getElementById('Contraseña');
   
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


