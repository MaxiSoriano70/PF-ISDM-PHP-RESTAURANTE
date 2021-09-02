$(document).ready( function() {

   $('#btnGuardar').hide();

   $("#btnAgregarIns").click(function(){
   $("#CInsumos").modal("show");
   var Action = "AgrInsumos";
   Proveedor = $("#iIdproveedor").val();

   $.ajax({
      url : '../Ajax/Create.php',
      type : 'POST',
      async : true,
      data : 'Action='+Action+'&Proveedor='+Proveedor,

      success: function() {      
      },
   });
   });

   $('.sel_insumos').select2({
      theme: 'bootstrap4',
   });

   $('#insumos').on('change', function() {
      var insumo = $(this).val();
      $.ajax({
        url: '../Ajax/Create.php',
        data: 'Action=buscar&insumo_id='+insumo,
        type: 'post',
        dataType: 'json',
        success: function(data) {
           console.log(data);
           $('#insumo').val(data.sNombre);
           $('#precio').val(data.fPrecio);
          //console.log(data);
        }
      });
   });
   
   $('#cantidad').keyup(function(){
      var Cant_Modal = $('#cantidad').val();
      var Prec_Modal = $('#precio').val();
      var Sub_Modal = Prec_Modal * Cant_Modal;  
      $('#subtotal_modal').val(Sub_Modal.toFixed(2));
   });

   $('#formProductos').submit(function(e){
      e.preventDefault();
      var insumo = $('#insumos').val();

      $('#detalles tbody').append('<tr id='+"trn"+insumo+'><td style="vertical-align:middle;">'+$('#insumo').val()+'</td><td style="vertical-align:middle;" id='+"p"+insumo+'>'+$('#precio').val()+'</td><td style="vertical-align:middle;"><input type="number" id='+"c"+insumo+' name="insumos['+$('#insumos').val()+'][cantidad]" value="'+$('#cantidad').val()+'" onkeyup="Cantidad('+insumo+')" class="form-control ti text-center" min="1" style="width: 30%; border-radius:40px; margin: auto;" required></td><td style="vertical-align:middle;" id='+"st"+insumo+' name="sub_princ">'+$('#subtotal_modal').val()+'</td><td><div id='+$('#insumos').val()+' class="btn btn-danger" onclick="Eliminar('+insumo+')"><i class="fas fa-trash-alt mr-2"></i>Eliminar</div></td></tr>');
      
      Total();

      $("#CInsumos").modal("hide"); 
      $("#formProductos").trigger('reset');
      $('#btnGuardar').show();
   });

   $('#btnCerrar').on('click',function(){
      $("#formProductos").trigger('reset');
   });

   $("#formulario").submit(function(e){
      e.preventDefault();
      var data = new FormData($('#formulario')[0]);
      console.log(data);

   $.ajax({
      url : '../Ajax/Create.php',
      type : 'POST',
      async : true,
      data : data,
      contentType: false,
      processData: false,
      success: function(data) {   
         if(data.status="FALSE") {
            window.location='../Pedidos/Index.php';
            console.log(data.status);
         }
         else {
            window.location='../Pedidos/Index.php';
            
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
   var Subtotal = Precio * Cantidad;

   $('#st'+id).text(Subtotal.toFixed(2));
   Total();
}
