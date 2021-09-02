function anyThing(destroyFeedback) {
 setTimeout(function(){ destroyFeedback(true); }, 1500);
}
  
function noThing(destroyFeedback) {
 setTimeout(function(){ destroyFeedback(true); }, 10000);
}
  
var stepperDiv = document.querySelector('.stepper');
console.log(stepperDiv);
var stepper = new MStepper(stepperDiv);

$("#code").on("click",function () {
 var Codigo_Insertado = $("#Codigo").val();

 $.ajax({
  url : '../Ajax/Verificacion.php',
  data : 'Action=Verificacion&sCodigo='+Codigo_Insertado,
  type: 'post',
  dataType: 'json',

  success: function(data) {  
   if (data=='Vacio') {
    $(".validateda")
    .removeClass('valid')
    .addClass('invalid');
    $('#Codigo').val("")
   }
     
   else {
    $("#iIdUsuario").val(data.iIdUsuario)
        
    $(".validateda")
    .removeClass('invalid')
    .addClass('valid');

    $("#NuevaCla").on("keyup",function () {
     var NuevaClave = $("#NuevaCla").val();
     var RepetirClave = $("#RepetirCla").val();

     if(NuevaClave==RepetirClave) {
      $(".validatedb")
      .removeClass('invalid')
      .addClass('valid');
      $("#btsVal").prop('disabled',false);
     }
     else {
      $(".validatedb")
      .removeClass('valid')
      .addClass('invalid');
      $("#btsVal").prop('disabled',true);
     }
    });

    $("#RepetirCla").on("keyup",function () {
     var NuevaClave = $("#NuevaCla").val();
     var RepetirClave = $("#RepetirCla").val();
     if(NuevaClave==RepetirClave) {
      $(".validatedb")
      .removeClass('invalid')
      .addClass('valid');
      $("#btsVal").prop('disabled',false);
     }
     else {
      $(".validatedb")
      .removeClass('valid')
      .addClass('invalid');
      $("#btsVal").prop('disabled',true);
     }
    });
   }
  },
 });
});




