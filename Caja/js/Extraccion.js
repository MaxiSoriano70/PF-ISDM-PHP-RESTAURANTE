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

$(document).ready(function() {
 $('#Cont-Aux').css('display','none');
 $('#Text-area').prop('disabled','true');
});

function Textarea(){
 var Text=document.getElementById('Seleciona').value;
 if (Text=='Otros') {
  document.getElementById("Cont-Aux").style.display="block";
  document.getElementById('Text-area').disabled=false;
 }
 else {
  document.getElementById("Cont-Aux").style.display="none";
  document.getElementById('Text-area').disabled=true;
 }
}