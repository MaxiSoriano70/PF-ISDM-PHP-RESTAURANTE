<?php 
      require_once "../Libs/Conexion.php";
      require "../Libs/Funciones.php";
      session_start();
?>

<?php
 if ($_POST['Action']=='AgrPlatillos') {
  $Usuario = $_POST['Usuario'];
  $sqla = "SELECT iIdPlatillo,sNombre,fPrecio FROM Platillos";
  $cmda=preparar_select($Conexion,$sqla);
 }
?>


<?php
 if ($_POST['Action']=='buscar') {
  $sqlb = "SELECT * from PLATILLOS where iIdPlatillo=?";
  $cmdb=preparar_select($Conexion,$sqlb,[$_POST['platillo_id']]);
  $result = $cmdb->fetch_assoc();
  echo json_encode($result);
 }
?>


<?php 
 if ($_POST['Action']=='Formulario') {

  $sqlcj="SELECT iIdApertura FROM Caja WHERE sEstado='Abierto'";
  $cmdcj=preparar_select($Conexion,$sqlcj);
  $rcj=$cmdcj->fetch_assoc();

  if ($cmdcj->num_rows>0) {

  $Usuario = $_POST['iIdUsuario'];
  $Fecha = $_POST['fecha'];
      
  $sqlven = "INSERT INTO Ventas (iIdUsuario,dFecha,sDireccion,iIdApertura) VALUES (?,?,'Sucursal',?)";
  $cmdped = preparar_query($Conexion,$sqlven,[$Usuario,$Fecha,$rcj['iIdApertura']]);
  $venta_id = $cmdped->insert_id;

  if($venta_id) {
   $total = 0;
   foreach($_POST['platillos'] as $platillo_id => $platillo) {
    $price = "select fPrecio from Platillos where iIdPlatillo=?";
    $cmdprice = preparar_select($Conexion,$price,[$platillo_id]);
    $resprice = $cmdprice->fetch_assoc();
    $subdet = $resprice['fPrecio']*$platillo['cantidad'];

    $sqldet = "INSERT INTO detalle_venta (iIdVenta,iIdPlatillo,iCantidad,fPrecio,fSubtotal) VALUES (?,?,?,?,?)";
    $cmddet = preparar_query($Conexion,$sqldet,[$venta_id,$platillo_id,$platillo['cantidad'],$resprice['fPrecio'],$subdet]);  
                
    $total = $total + $subdet;

    $sql_stock_act="SELECT iStock FROM Platillos WHERE iIdPlatillo=?";
    $sql_stock="UPDATE Platillos SET iStock=? WHERE iIdPlatillo=?";

    $sqlMenu="SELECT bMenu FROM platillos WHERE iIdPlatillo=?";
    $cmdMenu=preparar_select($Conexion,$sqlMenu,[$platillo_id]);
    $iIdMenu=$cmdMenu->fetch_assoc();

    if ($iIdMenu['bMenu']==0) {
      $cmd_stock_act=preparar_select($Conexion,$sql_stock_act,[$platillo_id]);
      $stock=$cmd_stock_act->fetch_assoc();
      $stock_act=($stock['iStock']-$platillo['cantidad']);
      $cmd_stock=preparar_query($Conexion,$sql_stock,[$stock_act,$platillo_id]);
    }

    else {
      $sqlmen="SELECT p.sNombre,pm.iIdPlatillo FROM platillos p INNER JOIN platillo_menu pm ON p.iIdPlatillo=pm.iIdPlatillo WHERE pm.iIdMenu=?";
      $cmdmen=preparar_select($Conexion,$sqlmen,[$iIdMenu['bMenu']]);
 
      foreach ($cmdmen as $detmenu) {
       $cmd_stock_act=preparar_select($Conexion,$sql_stock_act,[$detmenu['iIdPlatillo']]);
       $stock=$cmd_stock_act->fetch_assoc();
       $stock_act=($stock['iStock']-$platillo['cantidad']);
       $cmd_stock=preparar_query($Conexion,$sql_stock,[$stock_act,$detmenu['iIdPlatillo']]);
      }
 
      $sql_min="SELECT min(p.iStock) AS Minimo FROM Platillos p INNER JOIN Platillo_Menu pm INNER JOIN Menus m ON p.iIdPlatillo=pm.iIdPlatillo AND pm.iIdMenu=m.iIdMenu WHERE m.iIdMenu=?";
      $cmd_min=preparar_select($Conexion,$sql_min,[$iIdMenu["bMenu"]]);
      $stock_min=$cmd_min->fetch_assoc();
    
      $sqlusp="UPDATE Platillos SET iStock=? WHERE bMenu=?";
      $cmdusp=preparar_query($Conexion,$sqlusp,[$stock_min['Minimo'],$iIdMenu["bMenu"]]);
    }



    /*MAXI*/
     $sql_check_stock="SELECT SUM(iCantidad) AS total_producto,COUNT(iIdCarrito) AS Carritos FROM detalle_carrito WHERE iIdPlatillo=?";
   //AQUI CREAR UNA CONSULTA QUE CONTENGA TODOS LOS ID DE LOS PLATILLOS Y SUS RESPECTIVOS STOCKS ASI LA USAMOS MAS ABAJO EN EL FOR EACH Y MOLESTAMOS A LA BASE DE DATOS UNA SOLA VEZ Y NO TODAS LAS VECES QUE TENGA DETALLES EN CARRITO, AHORRANDO TIEMPO DE PROCESAMIENTO Y CONSULTAS.
    $cmd_check_stock=preparar_select($Conexion,$sql_check_stock,[$platillo_id]);
    $cantidad_p=$cmd_check_stock->fetch_assoc();
    $Total=$cantidad_p['total_producto'];
    $Cant_Carrito=$cantidad_p["Carritos"];//esto estaba como cantidad_c en vez de cantidad_p, por lo que nunca recuperaba la cantidad de carritos para dividir mas abajo y arrojaba NULL.
    $cmd_stock_act_a=preparar_select($Conexion,$sql_stock_act,[$platillo_id]);
    $stock_a=$cmd_stock_act_a->fetch_assoc();
    //var_dump($Cant_Carrito);
    //die;
    
    if ($Cant_Carrito>0) {   
    if ($Total>=$stock_a['iStock']) {
      if ($stock_a['iStock']>=$Cant_Carrito) {
        $aux=($stock_a['iStock']/$Cant_Carrito);
        //var_dump($aux);
        //die;
        $resultado=round($aux, 0, PHP_ROUND_HALF_DOWN);
        //var_dump($det_stock_check["iIdPlatillo"]);
        //die;
        /*ACTUALIZAMOS EL DETALLE DE CARRITO CON LA NUEVA CONTIDAD DE iIdPlatillo*/
        /*TRAEMOS EL PRECIO DEL PLATILLO*/
        $sql_producto="SELECT fPrecio FROM platillos WHERE iIdPlatillo=?";
        $cmd_producto=preparar_select($Conexion,$sql_producto,[$platillo_id]);
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
        $cmd_no_tocar=preparar_select($Conexion,$sql_no_tocar,[$platillo_id]);
        foreach($cmd_no_tocar as $no_tocar)
        {

          if($no_tocar["iCantidad"]>$resultado)
          {
            
            $sql_Update="UPDATE detalle_carrito SET iCantidad=?,fSubtotal=? WHERE iIdPlatillo=? AND iIdCarrito=?";
            $cmd_Update=preparar_query($Conexion,$sql_Update,[$resultado,$fSubtotal,$platillo_id,$no_tocar["iIdCarrito"]]);
            /*Calculamos el total de det_carrito*/
            $sqlTotal="SELECT SUM(fSubtotal) AS Total FROM detalle_carrito WHERE iIdPlatillo=? AND iIdCarrito=?";
            $cmd_Total=preparar_select($Conexion,$sqlTotal,[$platillo_id,$no_tocar["iIdCarrito"]]);
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
        $cmd_DC=preparar_select($Conexion,$sql_DC,[$platillo_id]);
        $iIdCarrito=$cmd_DC->fetch_assoc();
        $sql_delete="DELETE FROM DETALLE_CARRITO WHERE iIdPlatillo=?";
        $cmd_delete=preparar_query($Conexion,$sql_delete,[$platillo_id]);
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
    /*MAXI*/
   }

  $up = "UPDATE Ventas SET fTotal=? where iIdVenta=?";
  $cup = preparar_query($Conexion,$up,[$total,$venta_id]);

  /*SUMAR EL IMPORTE DE LA VENTA*/
  $sql_a_caja="UPDATE caja SET fMontoTotal=fMontoTotal+? WHERE iIdApertura=?";
  $cmd_a_caja=preparar_query($Conexion,$sql_a_caja,[$total,$rcj['iIdApertura']]);

  $mensaje['status'] = TRUE;
  $mensaje['message'] = 'Correcto';
 }
 else {                    
 }
  
 } else {
  $mensaje['status'] = FALSE;
  $mensaje['message'] = 'Ocurrio un errior';
 }

 echo json_encode($mensaje); 
}
?>





