function validarExt() {
 var archivoInput=document.getElementById('archivoInput');
 var archivoRuta= archivoInput.value;
     
 if (archivoInput.files && archivoInput.files[0]) {
  var visor = new FileReader();
  visor.onload=function(e) {
   document.getElementById('visorArchivo').innerHTML='<embed id="myImg" src="'+e.target.result+'" width="200" height="200">';
  }
 visor.readAsDataURL(archivoInput.files[0]);
 }
} 

const inputs = document.querySelectorAll(".input");

function addcl() {
 let parent = this.parentNode.parentNode;
 parent.classList.add("focus");
}

function remcl() {
 let parent = this.parentNode.parentNode;
 if(this.value == "") {
  parent.classList.remove("focus");
 }
}

window.addEventListener("loadstart",
 $('.input-div').addClass('focus')
);

inputs.forEach(input => {
 input.addEventListener("focus", addcl);
 input.addEventListener("blur", remcl);
});