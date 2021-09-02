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

$('#is').click(function() {

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

$('.selectpicker').focus(function () {
 $('.selectpicker').css({'color':'#999','border-bottom':'2px solid #d9d9d9'});
});

$('.selectpicker').on('change', function () {
 $('.selectpicker').css({'color':'#4aa3db','border-bottom':'2px solid #4aa3db'});
 $('#datos').css({'display':'block'});

 var iIdPermiso = $('.selectpicker').val();

 var sDescripcion=$('#idn'+iIdPermiso).val();

 var datosmostrar=document.getElementById("datos");
 datosmostrar.innerHTML=sDescripcion;

});


function Usuariov (vuser) {
 var Usr = vuser;

 $.ajax({
  url: '../../Ajax/Registro.php',
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

function Password (vpass) {
 var Pass = vpass;
 if (Pass.length>=8) {
  const pattern = /^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ]/;
  if (!pattern.test(Pass)) {
   $('#pdib').html('Debe contener letras (Mayusculas y Minúsculas) y Numeros');
   $('#pdib').css('color','#ff2e43');
   $('#icoc').val('0');
  }
  else {
   $('#pdib').html('');
   $('#icoc').val('1');
  }
 }
 else {
  $('#pdib').html('Debe contener minimo 8 Carácteres');
  $('#pdib').css('color','#ff2e43'); 
  $('#icoc').val('0');
 }
}


$('#Form-Create').submit(function(e) {
 
 var u = $('#iuoc').val();
 var c = $('#icoc').val();

 if (u==0 || c==0) {
  e.preventDefault();
 }
});
