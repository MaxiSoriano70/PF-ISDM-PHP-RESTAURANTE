function Subtotal (id) {
 var Precio = document.getElementById('p'+id).value;
 var Aux = document.getElementById('c'+id).value;
 var Cantaux=parseInt(Aux);

 var Stock = document.getElementById('sc'+id).value;
 var Stockaux=parseInt(Stock);

 if (Cantaux<=0) {
  document.getElementById('c'+id).value=1;
 }

 else if (Cantaux>Stockaux) {
  document.getElementById('c'+id).value=Stockaux;
 } 

 else {
 }

 var Cantidad = document.getElementById('c'+id).value;
 var Calculo = Cantidad * Precio;
 document.getElementById('iSubtotal'+id).innerHTML = '$ '+Calculo.toFixed(2);

 $.ajax({
  url: 'Update.php',
  data: 'Action=Cambiar&Platillo_id='+id+'&Cantidad='+Cantidad+'&Subtotal='+Calculo,
  type: 'post',
  dataType: 'json',
  success: function(data) {
   console.log(data);
   var Total = data.Total;
   $('.fResultado').html('$ ' + Total);
  }
 });
}


$(document).ready(function () {
 $("#Conf-Vent").on('click',function(){
  $("#CDireccion").modal("show");
 });
});

