$(document).ready( function() {

    $('#btnGuardar').hide();
 
    $("#btnAgregarPla").click(function(){
    $("#CPlatillos").modal("show");
    var Action = "AgrPlatillos";
    Usuario = $("#iIdUsuario").val();
 
    $.ajax({
       url : '../Ajax/Ventas.php',
       type : 'POST',
       async : true,
       data : 'Action='+Action+'&Usuario='+Usuario,
 
       success: function() {      
       },
    });
    });
 
    $('.sel_platillos').select2({
     theme: 'bootstrap4',
    });
 
    
    $('#cantidad').prop('disabled',true);
    $('#btnGuardar2').prop('disabled',true);

    $('#platillos').on('change', function() {
       var platillo = $(this).val();
       if (platillo=='0') {
        $('.cant').removeClass('Cantver');
        $('.hmg').removeClass('hmgv');
        $('.cant').removeClass('Cantroj');
        $('.hmg').removeClass('hmgr');
        $('#precio').val(' ');
        $('.cant').html(' ');
        $('#cantidad').prop('disabled',true);
        $('#btnGuardar2').prop('disabled',true);
       }

       else {
       $.ajax({
         url: '../Ajax/Ventas.php',
         data: 'Action=buscar&platillo_id='+platillo,
         type: 'post',
         dataType: 'json',
         success: function(data) {
          console.log(data);
          $('#platillo').val(data.sNombre);
          $('#precio').val(data.fPrecio);
          $('.cant').html(data.iStock);
          $('#dispon').val(data.iStock);
          $('#subtotal_modal').val(' ');
          

          if(data.iStock<=0) {
           $('.cant').removeClass('Cantver').addClass('Cantroj');
           $('.hmg').removeClass('hmgv').addClass('hmgr');
          }
          else {
           $('.cant').removeClass('Cantroj').addClass('Cantver');
           $('.hmg').removeClass('hmgr').addClass('hmgv');
          }

          if (data.iStock==0 || data.iStock=='undefined') {
           $('#cantidad').prop('disabled',true);
           $('#cantidad').val(' ');
           $('#btnGuardar2').prop('disabled',true);
          }
          else {
           $('#cantidad').prop('disabled',false);
           $('#cantidad').val(' ');
           $('#btnGuardar2').prop('disabled',false);
          }
         }
       });
      }
    });
    
    $('#cantidad').keyup(function() {
       var Cant_Modal = $('#cantidad').val();
       var Prec_Modal = $('#precio').val();
       var Sub_Modal = Prec_Modal * Cant_Modal;  
       $('#subtotal_modal').val(Sub_Modal.toFixed(2));
    });
 
    $('#formPlatillos').submit(function(e) {
       e.preventDefault();
       var platillos = $('#platillos').val();
       var disp = $('#dispon').val();
 
       $('#detalles tbody').append('<tr id='+"trn"+platillos+'><td style="vertical-align:middle;">'+$('#platillo').val()+'</td><td style="vertical-align:middle;" id='+"p"+platillos+'>'+$('#precio').val()+'</td><td style="vertical-align:middle;"><input type="number" id='+"c"+platillos+' name="platillos['+$('#platillos').val()+'][cantidad]" value="'+$('#cantidad').val()+'" onkeyup="Cantidad('+platillos+')" class="form-control ti text-center" min="1" style="width: 30%; border-radius:40px; margin: auto;" required><input type="hidden" id='+"stk"+platillos+' value='+disp+'></td><td style="vertical-align:middle;" id='+"st"+platillos+' name="sub_princ">'+$('#subtotal_modal').val()+'</td><td><div id='+$('#platillo').val()+' class="btn btn-danger" onclick="Eliminar('+platillos+')"><i class="fas fa-trash-alt mr-2"></i>Eliminar</div></td></tr>');
       
       Total();
 
       $("#CPlatillos").modal("hide"); 
       $("#formPlatillos").trigger('reset');
       $('#btnGuardar').show();
    });
 
    $('#btnCerrar').on('click',function() {
       $("#formPlatillos").trigger('reset');
    });
 
    $("#formulario").submit(function(e){
       e.preventDefault();
       var data = new FormData($('#formulario')[0]);
       console.log(data);
 
    $.ajax({
       url : '../Ajax/Ventas.php',
       type : 'POST',
       async : true,
       data : data,
       contentType: false,
       processData: false,
       dataType: 'json',
       success: function(data) {   
          if(data.status==false) {
           swal({
            title: "¡Venta Incorrecta!",
            text: "¡Debe Abir la Caja para Vender!",
            icon: "warning",
            button: true,
            dangerMode: true,
           })
           .then((value) => {
            switch (value) {
             default:
              location.href ="/dbRestaurant/Ventas"; 
             }
           });
          }
          if (data.status==true) {
           window.location='/dbRestaurant/Ventas/';  
          }
       },
    });
    });
 
 });
 
 
 function Eliminar (id) {
    $('#trn'+id).remove();
    Total();
    var sub=document.getElementsByName("sub_princ");
    if (sub.length==0) {$('#btnGuardar').hide();}
 }
 
 function Total() {
    var sub=document.getElementsByName("sub_princ");
    var total=0;
 
     for (var i=0; i<sub.length; i++) {
    var aux = parseFloat(sub[i].textContent);
    total += aux;
    }
    $('#total').text(total.toFixed(2)); 
 }
 
 function Cantidad(id) {
    var Precio = parseFloat(document.getElementById('p'+id).textContent);
    var Cantidad = parseInt($('#c'+id).val());
    var Bd = parseInt($('#stk'+id).val());

    if (Cantidad<=0) {
     $('#c'+id).val(1);
     var Subtotal = Precio * 1; 
    }

    else if (Cantidad>Bd) {
     $('#c'+id).val(Bd);  
     var Subtotal = Precio * parseInt($('#stk'+id).val()); 
    }

    else {
     var Subtotal = Precio * Cantidad;
    }
 
    $('#st'+id).text(Subtotal.toFixed(2));
    Total();
 }


 function Sub (Nbd,Sbd) {
  vara = parseInt(Nbd, 10);
  varb = parseInt(Sbd, 10);
  
  if (vara<=0) {
   $('#subtotal_modal').val('');
   $('#cantidad').val(1);
   var Cant_Modal = $('#cantidad').val();
   var Prec_Modal = $('#precio').val();
   var Sub_Modal = Prec_Modal * Cant_Modal;  
   $('#subtotal_modal').val(Sub_Modal.toFixed(2));
  }

  else if (vara>varb) {
   $('#cantidad').val(varb);
   var Cant_Modal = $('#cantidad').val();
   var Prec_Modal = $('#precio').val();
   var Sub_Modal = Prec_Modal * Cant_Modal;  
   $('#subtotal_modal').val(Sub_Modal.toFixed(2));
  }

  else {}
 }
