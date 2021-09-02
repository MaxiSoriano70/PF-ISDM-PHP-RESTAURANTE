// FUNCIONES DE VENTAS ------------------------------------------------------------------------------------------------------------- //

function Limpiar (An) {
 var Vectora='<?php echo json_encode($vectoraux); ?>';
 var Vector = JSON.parse(Vectora);
 
 for(var i=0;i<Vector.length;i++)
 {
  if (An==Vector[i]) {   
   $('#MyChartb'+Vector[i]).css('display','block');
   $('#MyChartt'+Vector[i]).css('display','block');
   $('#MyChartl'+Vector[i]).css('display','block');
  }
  else {
   $('#MyChartb'+Vector[i]).css('display','none');
   $('#MyChartt'+Vector[i]).css('display','none');
   $('#MyChartl'+Vector[i]).css('display','none');
  }
 }
}

function Graficosa(Year,id,action,type) {
 
 Limpiar (Year);
 $('#MyChartt'+Year).css('display','none');
 $('#MyChartl'+Year).css('display','none');

 $.ajax({
  url: '../Ajax/Estadisticas.php',
  data: 'Action='+action+'&Year='+Year,
  type: 'post',
  dataType: 'json',
  success: function(data) {
   
   var Valores = eval(data);

   var e  = Valores[0];
   var f  = Valores[1];
   var m  = Valores[2];
   var a  = Valores[3];
   var ma = Valores[4];
   var j  = Valores[5];
   var jl = Valores[6];
   var ag = Valores[7];
   var s  = Valores[8];
   var o  = Valores[9];
   var n  = Valores[10];
   var d  = Valores[11];

   var ctx = document.getElementById(id+Year).getContext("2d");
   var myChart= new Chart(ctx, {
    type: type,
    data: {
     labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre', 'Noviembre','Diciembre'],
     datasets:[{
      label: 'Ventas Año ' + Year,
      data: [e,f,m,a,ma,j,jl,ag,s,o,n,d],
      backgroundColor: [
       'rgba(3, 169, 244, 0.7)',
       'rgba(244, 67, 54, 0.7)',
       'rgba(233, 30, 99, 0.7)',
       'rgba(156, 39, 176, 0.7)',
       'rgba(153, 102, 255, 0.7)',
       'rgba(0, 188, 212, 0.7)',
       'rgba(0, 150, 136, 0.7)',
       'rgba(76, 175, 80, 0.7)',
       'rgba(205, 220, 57, 0.7)',
       'rgba(255, 235, 59, 0.7)',
       'rgba(255, 152, 0, 0.7)',
       'rgba(121, 85, 72, 0.7)',
      ],

     }]
    }, 

    options: {

     legend: { 
      display: true,
      position: 'bottom',
      labels: {
       fontSize: 13,
      }
     },

     scales: {
      yAxes:[{
       ticks:{
        beginAtZero: true,
       }
      }]
     }
    }
   });
  }
 });

 $.ajax({
    url: '../Ajax/Estadisticas.php',
    data: 'Action=Stats&Year='+Year,
    type: 'post',
    dataType: 'json',
    success: function(data) {
     $('#cVentas').html(data.cVentas);
     $('#Facturacion').html(data.Facturacion);
    }
 });

 $.ajax({
    url: '../Ajax/Estadisticas.php',
    data: 'Action=Visit',
    type: 'post',
    dataType: 'json',
    success: function(data) {
     $('#visven').html(data.Tot_Visit);
     $('#viscom').html(data.Tot_Visit);
    }
 });

}

function Graficos(Year,id,action,type) {
 
 Limpiar (Year);

 $.ajax({
  url: '../Ajax/Estadisticas.php',
  data: 'Action='+action+'&Year='+Year,
  type: 'post',
  dataType: 'json',
  success: function(data) {
   
   var Valores = eval(data);

   var e  = Valores[0];
   var f  = Valores[1];
   var m  = Valores[2];
   var a  = Valores[3];
   var ma = Valores[4];
   var j  = Valores[5];
   var jl = Valores[6];
   var ag = Valores[7];
   var s  = Valores[8];
   var o  = Valores[9];
   var n  = Valores[10];
   var d  = Valores[11];

   var ctx = document.getElementById(id+Year).getContext("2d");
   var myChart= new Chart(ctx, {
    type: type,
    data: {
     labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre', 'Noviembre','Diciembre'],
     datasets:[{
      label: 'Ventas Año ' + Year,
      data: [e,f,m,a,ma,j,jl,ag,s,o,n,d],
      backgroundColor: [
       'rgba(3, 169, 244, 0.7)',
       'rgba(244, 67, 54, 0.7)',
       'rgba(233, 30, 99, 0.7)',
       'rgba(156, 39, 176, 0.7)',
       'rgba(153, 102, 255, 0.7)',
       'rgba(0, 188, 212, 0.7)',
       'rgba(0, 150, 136, 0.7)',
       'rgba(76, 175, 80, 0.7)',
       'rgba(205, 220, 57, 0.7)',
       'rgba(255, 235, 59, 0.7)',
       'rgba(255, 152, 0, 0.7)',
       'rgba(121, 85, 72, 0.7)',
      ],

     }]
    }, 

    options: {

     legend: { 
      display: true,
      position: 'bottom',
      labels: {
       fontSize: 13,
      }
     },

     scales: {
      yAxes:[{
       ticks:{
        beginAtZero: true,
       }
      }]
     }
    }
   });
  }
 });

 $.ajax({
    url: '../Ajax/Estadisticas.php',
    data: 'Action=Stats&Year='+Year,
    type: 'post',
    dataType: 'json',
    success: function(data) {
     $('#cVentas').html(data.cVentas);
     $('#Facturacion').html(data.Facturacion);
    }
 });

 $.ajax({
    url: '../Ajax/Estadisticas.php',
    data: 'Action=Visit',
    type: 'post',
    dataType: 'json',
    success: function(data) {
     $('#visven').html(data.Tot_Visit);
     $('#viscom').html(data.Tot_Visit);
    }
 });

}


$('#gb').click(function(e) {
 Año=$('#vals').val();
 e.preventDefault();
 Graficos(Año,'MyChartb','Ventas','bar');
 $('#MyChartt'+Año).css('display','none');
 $('#MyChartl'+Año).css('display','none');
});

$('#gt').click(function(e) {
 Año=$('#vals').val();
 e.preventDefault();
 Graficos(Año,'MyChartt','Ventas','pie');
 $('#MyChartb'+Año).css('display','none');
 $('#MyChartl'+Año).css('display','none');
});

$('#gl').click(function(e) {
 Año=$('#vals').val();
 e.preventDefault();
 Graficos(Año,'MyChartl','Ventas','line');
 $('#MyChartb'+Año).css('display','none');
 $('#MyChartt'+Año).css('display','none');
});



// FUNCIONES DE COMPRAS --------------------------------------------------------------------------------------------------------------- //

function Limpiarc (Anc) {
 var Vectorac='<?php echo json_encode($vectorauxc); ?>';
 var Vectorc = JSON.parse(Vectorac);
 
 for(var i=0;i<Vectorc.length;i++)
 {
  if (Anc==Vectorc[i]) {  
   $('#MyChartbc'+Vectorc[i]).css('display','block');
   $('#MyCharttc'+Vectorc[i]).css('display','block');
   $('#MyChartlc'+Vectorc[i]).css('display','block');
  }
  else {
   $('#MyChartbc'+Vectorc[i]).css('display','none');
   $('#MyCharttc'+Vectorc[i]).css('display','none');
   $('#MyChartlc'+Vectorc[i]).css('display','none');
  }
 }
}

function Graficosac(Yearc,idc,actionc,typec) {
 
 Limpiarc(Yearc);
 $('#MyCharttc'+Yearc).css('display','none');
 $('#MyChartlc'+Yearc).css('display','none');

 $.ajax({
  url: '../Ajax/Estadisticas.php',
  data: 'Action='+actionc+'&Yearcom='+Yearc,
  type: 'post',
  dataType: 'json',
  success: function(data) {
   
   var Valores = eval(data);

   var e  = Valores[0];
   var f  = Valores[1];
   var m  = Valores[2];
   var a  = Valores[3];
   var ma = Valores[4];
   var j  = Valores[5];
   var jl = Valores[6];
   var ag = Valores[7];
   var s  = Valores[8];
   var o  = Valores[9];
   var n  = Valores[10];
   var d  = Valores[11];

   var ctx = document.getElementById(idc+Yearc).getContext("2d");
   var myChart= new Chart(ctx, {
    type: typec,
    data: {
     labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
     datasets:[{
      label: 'Compras Año ' + Yearc,
      data: [e,f,m,a,ma,j,jl,ag,s,o,n,d],
      backgroundColor: [
       'rgba(3, 169, 244, 0.7)',
       'rgba(244, 67, 54, 0.7)',
       'rgba(233, 30, 99, 0.7)',
       'rgba(156, 39, 176, 0.7)',
       'rgba(153, 102, 255, 0.7)',
       'rgba(0, 188, 212, 0.7)',
       'rgba(0, 150, 136, 0.7)',
       'rgba(76, 175, 80, 0.7)',
       'rgba(205, 220, 57, 0.7)',
       'rgba(255, 235, 59, 0.7)',
       'rgba(255, 152, 0, 0.7)',
       'rgba(121, 85, 72, 0.7)',
      ],

     }]
    }, 

    options: {

     legend: { 
      display: true,
      position: 'bottom',
      labels: {
       fontSize: 13,
      }
     },

     scales: {
      yAxes:[{
       ticks:{
        beginAtZero: true,
       }
      }]
     }
    }
   });
  }
 });

 $.ajax({
    url: '../Ajax/Estadisticas.php',
    data: 'Action=Statsc&Yearc='+Yearc,
    type: 'post',
    dataType: 'json',
    success: function(data) {
     $('#cCompras').html(data.cCompras);
     $('#Facturacionc').html(data.Facturacionc);
    }
 });

 $.ajax({
    url: '../Ajax/Estadisticas.php',
    data: 'Action=Visit',
    type: 'post',
    dataType: 'json',
    success: function(data) {
     $('#visven').html(data.Tot_Visit);
     $('#viscom').html(data.Tot_Visit);
    }
 });

}

function Graficosc(Yearc,idc,actionc,typec) {
 
 Limpiarc(Yearc);

 $.ajax({
  url: '../Ajax/Estadisticas.php',
  data: 'Action='+actionc+'&Yearcom='+Yearc,
  type: 'post',
  dataType: 'json',
  success: function(data) {
   
   var Valores = eval(data);

   var e  = Valores[0];
   var f  = Valores[1];
   var m  = Valores[2];
   var a  = Valores[3];
   var ma = Valores[4];
   var j  = Valores[5];
   var jl = Valores[6];
   var ag = Valores[7];
   var s  = Valores[8];
   var o  = Valores[9];
   var n  = Valores[10];
   var d  = Valores[11];

   var ctx = document.getElementById(idc+Yearc).getContext("2d");
   var myChart= new Chart(ctx, {
    type: typec,
    data: {
     labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre', 'Noviembre','Diciembre'],
     datasets:[{
      label: 'Compras Año ' + Yearc,
      data: [e,f,m,a,ma,j,jl,ag,s,o,n,d],
      backgroundColor: [
       'rgba(3, 169, 244, 0.7)',
       'rgba(244, 67, 54, 0.7)',
       'rgba(233, 30, 99, 0.7)',
       'rgba(156, 39, 176, 0.7)',
       'rgba(153, 102, 255, 0.7)',
       'rgba(0, 188, 212, 0.7)',
       'rgba(0, 150, 136, 0.7)',
       'rgba(76, 175, 80, 0.7)',
       'rgba(205, 220, 57, 0.7)',
       'rgba(255, 235, 59, 0.7)',
       'rgba(255, 152, 0, 0.7)',
       'rgba(121, 85, 72, 0.7)',
      ],

     }]
    }, 

    options: {

     legend: { 
      display: true,
      position: 'bottom',
      labels: {
       fontSize: 13,
      }
     },

     scales: {
      yAxes:[{
       ticks:{
        beginAtZero: true,
       }
      }]
     }
    }
   });
  }
 });

 $.ajax({
    url: '../Ajax/Estadisticas.php',
    data: 'Action=Statsc&Yearc='+Yearc,
    type: 'post',
    dataType: 'json',
    success: function(data) {
     $('#cCompras').html(data.cCompras);
     $('#Facturacionc').html(data.Facturacionc);
    }
 });

 $.ajax({
    url: '../Ajax/Estadisticas.php',
    data: 'Action=Visit',
    type: 'post',
    dataType: 'json',
    success: function(data) {
     $('#visven').html(data.Tot_Visit);
     $('#viscom').html(data.Tot_Visit);
    }
 });

}

$('#gbc').click(function(e) {
 Año=$('#valsc').val();
 e.preventDefault();
 Graficosc(Año,'MyChartbc','Compras','bar');
 $('#MyCharttc'+Año).css('display','none');
 $('#MyChartlc'+Año).css('display','none');
});

$('#gtc').click(function(e) {
 Año=$('#valsc').val();
 e.preventDefault();
 Graficosc(Año,'MyCharttc','Compras','pie');
 $('#MyChartbc'+Año).css('display','none');
 $('#MyChartlc'+Año).css('display','none');
});

$('#glc').click(function(e) {
 Año=$('#valsc').val();
 e.preventDefault();
 Graficosc(Año,'MyChartlc','Compras','line');
 $('#MyChartbc'+Año).css('display','none');
 $('#MyCharttc'+Año).css('display','none');
});



// FUNCIONES DE PRODUCTOS VENDIDOS ----------------------------------------------------------------------------------------------------- //

function Limpiarpv (ident,Anp) {
 var Vectorap='<?php echo json_encode($vectorpv); ?>';
 var Vectorp = JSON.parse(Vectorap);
 
 for(var i=0;i<Vectorp.length;i++)
 {
  if (Anp==Vectorp[i]) {  
   $('#'+ident+Vectorp[i]).css('display','block');
  }
  else {
   $('#'+ident+Vectorp[i]).css('display','none');
  }
 }
}

function Graficospv (Yearp,idp,actionp,typep,Info) {  // El yearp ES EL VECTOR Y NO LA VARIABLE VECTOR 
 
 Limpiarpv(idp,Yearp);

 $.ajax({
  url: '../Ajax/Estadisticas.php',
  data: 'Action='+actionp+'&Fecha='+Yearp,
  type: 'post',
  dataType: 'json',
  success: function(res) {

   var vTitulo = [];
   var vCantidad = [];
   for(var i=0; i<res.length; i++) {
    vTitulo.push(res[i].sNombre);
    vCantidad.push(res[i].Cantidad);
   }

   var ctx = document.getElementById(idp+Yearp).getContext("2d");
   var myChart= new Chart(ctx, {
    type: typep,
    data: {
     labels: vTitulo,
     datasets:[{
      label: Info + ' ' + Yearp,
      data: vCantidad,
      backgroundColor: [
       'rgba(3, 169, 244, 0.7)',
       'rgba(244, 67, 54, 0.7)',
       'rgba(233, 30, 99, 0.7)',
       'rgba(156, 39, 176, 0.7)',
       'rgba(153, 102, 255, 0.7)',
       'rgba(0, 188, 212, 0.7)',
      ],

     }]
    }, 

    options: {

     legend: { 
      display: true,
      position: 'bottom',
      labels: {
       fontSize: 13,
      }
     },

     animation: {
      animateScale: false
     }
    }
   });
  }
 });
}


// FUNCIONES DE PRODUCTOS NO VENDIDOS -------------------------------------------------------------------------------------------------- //

function Limpiarpnv (ident,Anp) {
 var Vectorap='<?php echo json_encode($vectorpnv); ?>';
 var Vectorp = JSON.parse(Vectorap);
 
 for(var i=0;i<Vectorp.length;i++)
 {
  if (Anp==Vectorp[i]) {  
   $('#'+ident+Vectorp[i]).css('display','block');
  }
  else {
   $('#'+ident+Vectorp[i]).css('display','none');
  }
 }
}

function Graficospnv (Yearp,idp,actionp,typep,Info) {  // El yearp ES EL VECTOR Y NO LA VARIABLE VECTOR 
 
 Limpiarpnv(idp,Yearp);

 $.ajax({
  url: '../Ajax/Estadisticas.php',
  data: 'Action='+actionp+'&Fecha='+Yearp,
  type: 'post',
  dataType: 'json',
  success: function(res) {
   
   var vTitulo = [];
   var vCantidad = [];
   for(var i=0; i<res.length; i++) {
    vTitulo.push(res[i].sNombre);
    vCantidad.push(res[i].Cantidad);
   }

   var ctx = document.getElementById(idp+Yearp).getContext("2d");
   var myChart= new Chart(ctx, {
    type: typep,
    data: {
     labels: vTitulo,
     datasets:[{
      label: Info + ' ' + Yearp,
      data: vCantidad,
      backgroundColor: [
       'rgba(0, 150, 136, 0.7)',
       'rgba(76, 175, 80, 0.7)',
       'rgba(205, 220, 57, 0.7)',
       'rgba(255, 235, 59, 0.7)',
       'rgba(255, 152, 0, 0.7)',
       'rgba(121, 85, 72, 0.7)',
      ],

     }]
    }, 

    options: {

     legend: { 
      display: true,
      position: 'bottom',
      labels: {
       fontSize: 13,
      }
     },

     animation: {
      animateScale: false,
     }

    }
   });
  }
 });
}


// FUNCION CARGA DE DOM --------------------------------------------------------------------------------------------------------------- //

$(document).ready(function () {
 var Maximo = $('#Maxim').val();
 Graficos(Maximo,'MyChartb','Ventas','bar');
 $('#MyChartt'+Maximo).css('display','none');
 $('#MyChartl'+Maximo).css('display','none');
});

$(document).ready(function () {
 var Maximoc = $('#Maximc').val();
 Graficosc(Maximoc,'MyChartbc','Compras','bar');
 $('#MyCharttc'+Maximoc).css('display','none');
 $('#MyChartlc'+Maximoc).css('display','none');
});

$(document).ready(function () {
 var Input1 = $('#In1').val();
 Graficospv(Input1,'MyChartpv','Pv','doughnut','Productos mas Vendidos');
});

$(document).ready(function () {
 var Input2 = $('#In2').val();
 Graficospnv(Input2,'MyChartpnv','Pnv','doughnut','Productos menos Vendidos');
});