<?php
 session_start(); 
 require_once "../libs/Conexion.php";
 require_once "../libs/Funciones.php";
?>

<?php 
 if (!empty($_SESSION['iIdUsuario'])) { 
 $iIdUsuario=$_SESSION['iIdUsuario'];

 $sqlc="SELECT COUNT(dc.iIdCarrito) AS CantCarrito FROM carrito c INNER JOIN detalle_carrito dc ON c.iIdCarrito=dc.iIdCarrito WHERE c.iIdUsuario=? AND c.sEstado='En Curso'";
 $cmdc=preparar_select($Conexion,$sqlc,[$iIdUsuario]);
 $rc=$cmdc->fetch_assoc();
 $Cantidad=$rc['CantCarrito'];

 if ($Cantidad!=0) {
 $sqlv="SELECT i.sNombreArchivo, p.sNombre, dc.iCantidad, dc.fSubtotal FROM Platillos p INNER JOIN Imagenes i INNER JOIN platillo_imagen PI INNER JOIN detalle_carrito dc INNER JOIN carrito c ON p.iIdPlatillo = PI.iIdPlatillo AND i.iIdImagen = PI.iIdImagen AND p.iIdPlatillo = dc.iIdPlatillo AND dc.iIdCarrito = c.iIdCarrito WHERE PI.iOrden = 1 AND c.sEstado='En Curso' AND c.iIdUsuario = ?";
 $cmdv=preparar_select($Conexion,$sqlv,[$iIdUsuario]);

 $sinfo="SELECT sNombre,sApellido,sEmail,iDocumento,iContacto,sDireccion FROM Usuarios where iIdUsuario=?";
 $cinfo=preparar_select($Conexion,$sinfo,[$iIdUsuario]);
 $rinfo=$cinfo->fetch_assoc();
 }
 else {
  header('Location:/dbRestaurant/');
 }
}
 else {
  header('Location:/dbRestaurant/');
 }

?>

<?php

?>
<?php
 include "../Libs/Head.html";
 include "../Libs/Menu.php";
?>

<style><?php include 'css/Shipping.css';?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Carrito/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Comprar</h1>
 </div>
 <div class="boxin">
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
 </div>
</div>

<div class="Cont-Cards">
 <div class="Cont-Izq">

 <form name="ship" method="POST" action="Shipping.php">
 <input type="hidden" name="iIdUsuario" value="<?php echo $iIdUsuario; ?>">
  <div id="Card-a" class="Card-abc">
   <div class="Header">
    <div class="Header-Izq">1 - Datos Personales</div> 
    <a href="" id="ha" class="Header-Der"><i class="ic fas fa-edit"></i></a>
   </div>

   <div class="Inputs-a">
    <div class="form__div">
     <input type="email" id="Email" name="sEmail" class="form__input" placeholder=" " value="<?php echo $rinfo['sEmail']; ?>" required>
     <label for="" class="form__label">Email</label>
    </div>
    <div class="Flexible">
     <div class="form__div-div">
      <input type="text" id="Nombre" name="sNombre" class="form__input-div" placeholder=" " value="<?php echo $rinfo['sNombre']; ?>" required>
      <label for="" class="form__label">Nombre</label>
     </div>
     <div class="form__div-div">
      <input type="text" id="Apellido" name="sApellido" class="form__input-div" placeholder=" " value="<?php echo $rinfo['sApellido']; ?>" required>
      <label for="" class="form__label">Apellido</label>
     </div>
    </div>
    <div class="Flexible">
     <div class="form__div-div">
      <input type="number" id="Dni" name="iDni" class="form__input-div" placeholder=" " value="<?php echo $rinfo['iDocumento']; ?>" required>
      <label for="" class="form__label">DNI</label>
     </div>
     <div class="form__div-div">
      <input type="number" id="Contacto" name="iContacto" class="form__input-div" placeholder=" " value="<?php echo $rinfo['iContacto']; ?>" required>
      <label for="" class="form__label">Contacto</label>
     </div>
    </div>
    <div class="Boton">
     <div class="btn btn-primary b-a">Continuar</div>
    </div>
   </div>

   <div class="Oculto-a">
    <p id="pe" class="p-oculto-a"><b>Email:</b> <span id="sn-a"></span></p>
    <p id="pna" class="p-oculto-a"><b>Nombre y Apellido:</b> <span id="sn-b"></span></</p>
    <p id="pto" class="p-oculto-a"><b>Telefono:</b> <span id="sn-c"></span></</p>
   </div>

  </div>


  <div id="Card-b" class="Card-abc">
   <div class="Header">
    <div class="Header-Izq">2 - Entrega - Retiro</div> 
    <a href="" id="hb" class="Header-Der"><i class="ic fas fa-edit"></i></a>
   </div>

   <div class="Inputs-b">
    <div class="form__div">
     <input type="text" name="sDireccion" id="Direccion" class="form__input" placeholder=" " value="<?php echo $rinfo['sDireccion']; ?>" required>
     <label for="" class="form__label">Direccion</label>
    </div>
    <div class="Flexible">
     <div class="form__div-div">
      <input type="number" name="iCodigo_Postal" id="Postal" class="form__input-div" placeholder=" " value="4400" required disabled>
      <label for="" class="form__label">Codigo Postal</label>
     </div>
     <div class="form__div-div">
      <input type="text" id="Ciudad" name="sCiudad" class="form__input-div" placeholder=" " value="Salta" required disabled>
      <label for="" class="form__label">Ciudad</label>
     </div>
    </div>

    <div class="Boton">
     <button type="submit" class="bp btn btn-primary">Comprar</button>
    </div>
   </div>

   <div class="Oculto-b">
    <p class="p-oculto-b"><b>Direccion:</b> <span id="sn-d"></span></</p>
    <p class="p-oculto-b"><b>Ciudad:</b> <span id="sn-e"></span></</p>
    <p class="p-oculto-b"><b>Codigo Postal:</b> <span id="sn-f"></span></</p>
   </div>

   <div class="Vacio-b">
    <p class="p-vacio-b"><b class="text-warning">¡Atencion!</b> No hay Datos Seleccionados</p>
   </div>

  </div>

 </form>
 </div>


<div class="Cont-Der">
 <div class="Card-d">
  <div class="Head">Resumen de Compra</div>
  <?php $t=0; ?>
  <?php foreach ($cmdv as $Platillos) { ?>
  <div class="Mini-Card">
   <div class="Presentacion">
    <img src="../Imagenes/<?php echo $Platillos['sNombreArchivo']?>" alt="" class="img-min">
    <p class="Desc-min"><?php echo $Platillos['sNombre']?></p>
   </div>
   <?php $can=$Platillos["iCantidad"];?>
   <p class="Unidad-min text-center"><?php echo $Platillos['iCantidad']; if ($can>1) {echo ' Unidades';} else {echo ' Unidad';}?></p>
   <p class="Subt-min">$ <?php echo $Platillos['fSubtotal']?></p>
   <?php $t=$t+$Platillos['fSubtotal']?>
  </div>
  <?php } ?>
  <div class="Subtotal">
   <div class="Sub-Izq">Subtotal</div>
   <div class="Sub-Der">$ <?php echo $t; ?></div>
  </div>
  <div class="Total">
   <div class="Tot-Izq">TOTAL</div>
   <div class="Tot-Der">$ <?php echo $t; ?></div>
  </div>
 </div>
</div>
</div>

<?php include '../Libs/Footer.php'; ?>
<script><?php include 'js/Shipping.js'; ?></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
 if(!empty($_POST["sDireccion"])) {

  $sqlcj="SELECT iIdApertura FROM Caja WHERE sEstado='Abierto'";
  $cmdcj=preparar_select($Conexion,$sqlcj);
  $rcj=$cmdcj->fetch_assoc();

  if ($cmdcj->num_rows>0) {

  $Usuario=$_SESSION['iIdUsuario'];
  $sEmail=$_POST['sEmail'];
  $sNombre=$_POST['sNombre'];
  $sApellido=$_POST['sApellido'];
  $iDni=$_POST['iDni'];
  $sDireccion=$_POST['sDireccion'];
  $iContacto=$_POST['iContacto'];
 
  $sqlus="UPDATE Usuarios SET sEmail=?,sNombre=?,sApellido=?,iDocumento=?,iContacto=?,sDireccion=? WHERE iIdUsuario=?";
  $cmdus=preparar_query($Conexion,$sqlus,[$sEmail,$sNombre,$sApellido,$iDni,$iContacto,$sDireccion,$Usuario]);

  $sql="SELECT iIdCarrito FROM carrito c WHERE c.sEstado='En Curso' AND c.iIdUsuario=?";
  $cmd=preparar_select($Conexion,$sql,[$Usuario]);
  $control=$cmd->fetch_assoc();
  $iIdCarrito=$control['iIdCarrito'];
    
  $sql_carrito_general="SELECT iIdUsuario,fTotal FROM CARRITO WHERE iIdCarrito=?";
  $cmdu=preparar_select($Conexion,$sql_carrito_general,[$iIdCarrito]);
  $venta=$cmdu->fetch_assoc();
    
  $sql_venta="INSERT INTO VENTAS (iIdUsuario,dFecha,fTotal,sDireccion,iIdApertura) VALUES (?,now(),?,?,?)";
  $cmd_venta=preparar_query($Conexion,$sql_venta,[$venta["iIdUsuario"],$venta["fTotal"],$sDireccion,$rcj['iIdApertura']]);

  /*SUMAR EL IMPORTE DE LA VENTA*/
  $sql_a_caja="UPDATE caja SET fMontoTotal=fMontoTotal+? WHERE iIdApertura=?";
  $cmd_a_caja=preparar_query($Conexion,$sql_a_caja,[$venta['fTotal'],$rcj['iIdApertura']]);
      
  if($cmd_venta) {
   $iIdVenta=$cmd_venta->insert_id;
   $sql_carrito_detalles="SELECT iIdPlatillo,iCantidad,fPrecio,fSubtotal FROM DETALLE_CARRITO WHERE iIdCarrito=?";
   $cmd_carrito_detalles=preparar_select($Conexion,$sql_carrito_detalles,[$iIdCarrito]);
    
   $sql_d_venta="INSERT INTO DETALLE_VENTA (iIdVenta,iIdPlatillo,iCantidad,fPrecio,fSubtotal) VALUES (?,?,?,?,?)";
    
   foreach ($cmd_carrito_detalles as $det_venta) {
    $cmd_detalle_venta=preparar_query($Conexion,$sql_d_venta,[$iIdVenta,$det_venta["iIdPlatillo"],$det_venta["iCantidad"],$det_venta["fPrecio"],$det_venta["fSubtotal"]]);
   }
  
   $sql_stock_act="SELECT iStock FROM Platillos WHERE iIdPlatillo=?";
   $sql_stock="UPDATE Platillos SET iStock=? WHERE iIdPlatillo=?";
    
   foreach ($cmd_carrito_detalles as $det_stock) {

    $sqlMenu="SELECT bMenu FROM platillos WHERE iIdPlatillo=?";
    $cmdMenu=preparar_select($Conexion,$sqlMenu,[$det_stock['iIdPlatillo']]);
    $iIdMenu=$cmdMenu->fetch_assoc();

    if ($iIdMenu['bMenu']==0) {
     $cmd_stock_act=preparar_select($Conexion,$sql_stock_act,[$det_stock["iIdPlatillo"]]);
     $stock=$cmd_stock_act->fetch_assoc();
     $stock_act=($stock['iStock']-$det_stock['iCantidad']);
     $cmd_stock=preparar_query($Conexion,$sql_stock,[$stock_act,$det_stock["iIdPlatillo"]]);
    }
    else {
     $sqlmen="SELECT p.sNombre,pm.iIdPlatillo FROM platillos p INNER JOIN platillo_menu pm ON p.iIdPlatillo=pm.iIdPlatillo WHERE pm.iIdMenu=?";
     $cmdmen=preparar_select($Conexion,$sqlmen,[$iIdMenu['bMenu']]);

     foreach ($cmdmen as $detmenu) {
      $cmd_stock_act=preparar_select($Conexion,$sql_stock_act,[$detmenu['iIdPlatillo']]);
      $stock=$cmd_stock_act->fetch_assoc();
      $stock_act=($stock['iStock']-$det_stock['iCantidad']);
      $cmd_stock=preparar_query($Conexion,$sql_stock,[$stock_act,$detmenu['iIdPlatillo']]);
     }

     $sql_min="SELECT min(p.iStock) AS Minimo FROM Platillos p INNER JOIN Platillo_Menu pm INNER JOIN Menus m ON p.iIdPlatillo=pm.iIdPlatillo AND pm.iIdMenu=m.iIdMenu WHERE m.iIdMenu=?";
     $cmd_min=preparar_select($Conexion,$sql_min,[$iIdMenu["bMenu"]]);
     $stock_min=$cmd_min->fetch_assoc();
   
     $sqlusp="UPDATE Platillos SET iStock=? WHERE bMenu=?";
     $cmdusp=preparar_query($Conexion,$sqlusp,[$stock_min['Minimo'],$iIdMenu["bMenu"]]);
    }
   }

    $sql_delete="DELETE FROM DETALLE_CARRITO WHERE iIdCarrito=?";
    $cmd_delete=preparar_query($Conexion,$sql_delete,[$iIdCarrito]);
    if($cmd_delete) {
     $sql_delete_2="DELETE FROM CARRITO WHERE iIdCarrito=?";
     $cmd_delete_2=preparar_query($Conexion,$sql_delete_2,[$iIdCarrito]);
     }

   $sql_check_stock="SELECT SUM(iCantidad) AS total_producto,COUNT(iIdCarrito) AS Carritos FROM detalle_carrito WHERE iIdPlatillo=?";
   //AQUI CREAR UNA CONSULTA QUE CONTENGA TODOS LOS ID DE LOS PLATILLOS Y SUS RESPECTIVOS STOCKS ASI LA USAMOS MAS ABAJO EN EL FOR EACH Y MOLESTAMOS A LA BASE DE DATOS UNA SOLA VEZ Y NO TODAS LAS VECES QUE TENGA DETALLES EN CARRITO, AHORRANDO TIEMPO DE PROCESAMIENTO Y CONSULTAS.
   foreach ($cmd_carrito_detalles as $det_stock_check){
    $cmd_check_stock=preparar_select($Conexion,$sql_check_stock,[$det_stock_check["iIdPlatillo"]]);
    $cantidad_p=$cmd_check_stock->fetch_assoc();
    $Total=$cantidad_p['total_producto'];
    $Cant_Carrito=$cantidad_p["Carritos"];//esto estaba como cantidad_c en vez de cantidad_p, por lo que nunca recuperaba la cantidad de carritos para dividir mas abajo y arrojaba NULL.
    
    $cmd_stock_actd=preparar_select($Conexion,$sql_stock_act,[$det_stock_check["iIdPlatillo"]]);
    $stock=$cmd_stock_actd->fetch_assoc();
    //var_dump($Cant_Carrito);
    //die;
    if ($Cant_Carrito>0) {
      
    if ($Total>=$stock['iStock']) {
      
      if ($stock['iStock']>=$Cant_Carrito) {
        
        $aux=($stock['iStock']/$Cant_Carrito);
        //var_dump($aux);
        //die;
        $resultado=round($aux, 0, PHP_ROUND_HALF_DOWN);
        //var_dump($det_stock_check["iIdPlatillo"]);
        //die;
        /*ACTUALIZAMOS EL DETALLE DE CARRITO CON LA NUEVA CONTIDAD DE iIdPlatillo*/
        /*TRAEMOS EL PRECIO DEL PLATILLO*/
        $sql_producto="SELECT fPrecio FROM platillos WHERE iIdPlatillo=?";
        $cmd_producto=preparar_select($Conexion,$sql_producto,[$det_stock_check["iIdPlatillo"]]);
        $precio_p=$cmd_producto->fetch_assoc();
        $precio=$precio_p["fPrecio"];
        $fSubtotal=($resultado*$precio);
        //var_dump($resultado);
        //var_dump($fSubtotal);
        //var_dump($det_stock_check["iIdPlatillo"]);
        //var_dump($Cant_Carrito);
        //die;
        /*Actualizamos el det_carrito donde se encuentra platillo*/
        $sql_no_tocar="SELECT iCantidad,iIdCarrito FROM detalle_carrito WHERE iIdPlatillo=?";
        $cmd_no_tocar=preparar_select($Conexion,$sql_no_tocar,[$det_stock_check["iIdPlatillo"]]);
        foreach($cmd_no_tocar as $no_tocar)
        {

        	if($no_tocar["iCantidad"]>$resultado)
        	{
        		
        		$sql_Update="UPDATE detalle_carrito SET iCantidad=?,fSubtotal=? WHERE iIdPlatillo=? AND iIdCarrito=?";
        		$cmd_Update=preparar_query($Conexion,$sql_Update,[$resultado,$fSubtotal,$det_stock_check["iIdPlatillo"],$no_tocar["iIdCarrito"]]);
        		/*Calculamos el total de det_carrito*/
        		$sqlTotal="SELECT SUM(fSubtotal) AS Total FROM detalle_carrito WHERE iIdPlatillo=? AND iIdCarrito=?";
        		$cmd_Total=preparar_select($Conexion,$sqlTotal,[$det_stock_check["iIdPlatillo"],$no_tocar["iIdCarrito"]]);
        		$Total_algo=$cmd_Total->fetch_assoc();
        		/*Actualizamos el total del carrito de compras*/
        		$sqlTotal_p="UPDATE carrito SET fTotal=? WHERE iIdCarrito=?";
        		$cmd_Total=preparar_query($Conexion,$sqlTotal_p,[$Total_algo['Total'],$no_tocar['iIdCarrito']]);
        	}
        	else
        	{
        	
        	}
    	}

      }
      else
      {

        $sql_DC="SELECT iIdCarrito FROM detalle_carrito WHERE iIdPlatillo=?";
        $cmd_DC=preparar_select($Conexion,$sql_DC,[$det_stock_check["iIdPlatillo"]]);
        $iIdCarrito=$cmd_DC->fetch_assoc();
        $sql_delete="DELETE FROM DETALLE_CARRITO WHERE iIdPlatillo=?";
        $cmd_delete=preparar_query($Conexion,$sql_delete,[$det_stock_check["iIdPlatillo"]]);
        /*Calculamos el total de det_carrito*/
        $sqlTotal="SELECT SUM(fSubtotal) AS Total FROM detalle_carrito WHERE iIdCarrito=?";
        $cmd_Total=preparar_select($Conexion,$sqlTotal,[$iIdCarrito["iIdCarrito"]]);
        $Total=$cmd_Total->fetch_assoc();
        /*Uctualizamos el total del carrito de compras*/
        $sqlTotal_p="UPDATE carrito SET fTotal=? WHERE iIdCarrito=?";
        $cmd_Total=preparar_query($Conexion,$sqlTotal_p,[$Total['Total'],$iIdCarrito["iIdCarrito"]]);
      }
    }

   }
   else {}
   }

      echo '<script>
       swal({
         title: "¡Gracias por Tu Compra!",
         text: "¡Esperamos que lo disfutes!",
         icon: "success",
         button: "Aceptar",
        })
        .then((value) => {
         switch (value) {
          default:
          location.href ="/dbRestaurant/";
        }
       });
      </script>';
  }

 } else {
  echo '<script>
  swal({
   title: "¡Compra Incorrecto!",
   text: "¡El Horario de Atencion es de 08:00 a 01:00!",
   icon: "warning",
   button: true,
   dangerMode: true,
  })
  .then((value) => {
   switch (value) {
    default:
     location.href ="/dbRestaurant/"; 
    }
  });
 </script>';
 }

 }
?>