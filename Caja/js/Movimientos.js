var iIdApertura=$("#iIdApertura").val();
$.ajax({
 url: '../Ajax/Movimientos.php',
 data: 'Action=Movimiento&Apetura_id='+iIdApertura,
 type: 'post',
 dataType: 'json',
 success: function(res) {

   var vTitulo = [];
   var vCantidad = [];
   for(var i=0; i<res.length; i++) {
    vTitulo.push(res[i].Descripcion);
    vCantidad.push(res[i].Total);
   }

   var ctx = document.getElementById('Graf-Mov').getContext('2d');
   var myChart = new Chart(ctx, {
   type: 'pie',
   data: {
    labels: vTitulo,
    datasets: [{
     label: 'Movimientos de Caja',
     data: vCantidad,
     backgroundColor: [
      'rgba(3, 169, 244, 0.7)',
      'rgba(244, 67, 54, 0.7)',
      'rgba(255, 235, 59, 0.7)',
      'rgba(233, 30, 99, 0.7)',
      'rgba(156, 39, 176, 0.7)',
      'rgba(255, 235, 59, 0.7)',
      'rgba(153, 102, 255, 0.7)',
      'rgba(0, 188, 212, 0.7)',
      'rgba(0, 150, 136, 0.7)',
      'rgba(76, 175, 80, 0.7)',
      'rgba(205, 220, 57, 0.7)',
      'rgba(255, 152, 0, 0.7)',
      'rgba(121, 85, 72, 0.7)',
     ],
    }]
   },
   options: {
    scales: {
     yAxes: [{
      ticks: {
       beginAtZero: true
      }
     }]
    }
   }
  });
 }
});



$(document).ready(function() {

 $('.Rs1').css('display','block');
 $('.Rs2').css('display','none');
 $('.Rs3').css('display','none');
 $('.Rs4').css('display','none');

 $('#Opns1').on('click',function() {
  $('.Rs1').css('display','block');
  $('.Rs2').css('display','none');
  $('.Rs3').css('display','none');
  $('.Rs4').css('display','none');
 });

 $('#Opns2').on('click',function() {
  $('.Rs1').css('display','none');
  $('.Rs2').css('display','block');
  $('.Rs3').css('display','none');
  $('.Rs4').css('display','none');
 });

 $('#Opns3').on('click',function() {
  $('.Rs1').css('display','none');
  $('.Rs2').css('display','none');
  $('.Rs3').css('display','block');
  $('.Rs4').css('display','none');
 });

 $('#Opns4').on('click',function() {
  $('.Rs1').css('display','none');
  $('.Rs2').css('display','none');
  $('.Rs3').css('display','none');
  $('.Rs4').css('display','block');
 });

});

var Marker = document.querySelector('#marker');
var item = document.querySelectorAll('nav .Opns');

function Indicador(e) {
 Marker.style.left = e.offsetLeft+'px';
 Marker.style.width = e.offsetWidth+'px';
}

item.forEach(link => {
 link.addEventListener('click', (e)=> {
  Indicador(e.target);
  e.preventDefault();
 })
})

