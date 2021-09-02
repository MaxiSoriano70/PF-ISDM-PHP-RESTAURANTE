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

if ($('#usnpo').val()==$('#nusa').val()) { 
 $('#pdia').html('');
 $('#iuoc').val('1'); 
}

function Usuariov (vuser) {
 var Usr = vuser;
 var comp = $('#nusa').val();

 if (Usr==comp) { 
  $('#pdia').html('');
  $('#iuoc').val('1'); 
 }
 else {
 $.ajax({
  url: '../Ajax/Registro.php',
  data: 'Action=Usuaris&sNombreUsuario='+Usr,
  type: 'post',
  dataType: 'json',
  success: function(data) {
  console.log(data);
   var Verificar = data.Cantidad;

   if (Verificar==0) {
    if (Usr.length>=8) {
     var ptss = /^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ]/;
     if (!ptss.test(Usr)) {
      $('#pdia').html('Debe contener letras (Mayusculas y Minúsculas) y Numeros');
      $('#pdia').css('color','#ff2e43');
      $('#iuoc').val('0');
     }
     else {
      $('#pdia').html('');
      $('#iuoc').val('1');
     }
    }
    else {
     $('#pdia').html('Debe contener minimo 8 Carácteres');
     $('#pdia').css('color','#ff2e43');
     $('#iuoc').val('0'); 
    }
   }
   else {
    $('#pdia').html('El Nombre de Usuario ya está en uso');
    $('#pdia').css('color','#ff2e43');
    $('#iuoc').val('0'); 
   }
  }
 });
 }
}

$('#Form-Upp').submit(function(e) {
 var u = $('#iuoc').val();
 if (u==0) {
  e.preventDefault();
 }
});

