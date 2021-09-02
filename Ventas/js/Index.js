$(document).ready(function () {
 function Duracion(id) {
  var bdfech=$('#f'+id).html();   
  var db=new Date(bdfech);
  db=new Date(db.getTime()+3600000)
  setInterval(update, 1000)
  function update() {
   var now=new Date()
   var diff = db - now;
   var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
   var seconds = Math.floor((diff % (1000 * 60)) / 1000);
   if (diff < 0) {
    clearInterval(update);
    $("#ms"+id).html("Expirado"); 

    $('#cb'+id)
    .removeClass('btn-naranja')
    .addClass('btn-verde');

    $('#ic'+id)
    .removeClass('fa-exclamation-circle')
    .addClass('fa-clipboard-check');

    $('#txt'+id).html('Concretado');
   }
   else {
    $("#ms"+id).html(minutes +'m '+seconds+'s'); 
   }
  }
 }
 
 var Cantid = $('#Sumatoria').val();
 var escalafon = "<?php echo json_encode($vector);  ?>";
 var vectora = JSON.parse(escalafon);
 for (var i=0; i<Cantid; i++) {
  Duracion(vectora[i]);
 }
});

