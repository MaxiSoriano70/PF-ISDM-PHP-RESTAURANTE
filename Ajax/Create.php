<?php 
      require_once "../Libs/Conexion.php";
      require "../Libs/Funciones.php";
      session_start();
?>

<?php
        if ($_POST['Action']=='AgrInsumos') 
            {
            $Proveedor = $_POST['Proveedor'];
            $sqla = "SELECT i.iIdInsumo,i.sNombre,i.fPrecio FROM Insumos i INNER JOIN provxins pi INNER JOIN proveedores p ON i.iIdInsumo=pi.iIdInsumo AND p.iIdProveedor=pi.iIdProveedor WHERE p.iIdProveedor=?";
            $cmda=preparar_select($Conexion,$sqla,[$Proveedor]);
            }
?>


<?php
        if ($_POST['Action']=='buscar') 
           {
            $sqlb = "SELECT * from INSUMOS where iIdInsumo=?";
            $cmdb=preparar_select($Conexion,$sqlb,[$_POST['insumo_id']]);
            $result = $cmdb->fetch_assoc();
            echo json_encode($result);
           }
?>


<?php 
        if ($_POST['Action']=='Formulario') 
           {
            $Proveedor = $_POST['iIdproveedor'];
            $Fecha = $_POST['fecha'];
            $FechaEntrega = $_POST['fecha_entrega']; 
      
            $sqlped = "INSERT INTO Pedidos (iIdProveedor,dFecha,dFecha_Entrega) VALUES (?,?,?)";
            $cmdped = preparar_query($Conexion,$sqlped,[$Proveedor,$Fecha,$FechaEntrega]);
            $pedido_id = $cmdped->insert_id;

            if($pedido_id) {
                $total = 0;
               foreach($_POST['insumos'] as $insumo_id => $insumo) {
                $price = "select fPrecio from Insumos where iIdInsumo=?";
                $cmdprice = preparar_select($Conexion,$price,[$insumo_id]);
                $resprice = $cmdprice->fetch_assoc();
                $subdet = $resprice['fPrecio']*$insumo['cantidad'];

                $sqldet = "INSERT INTO detalle_pedido (iIdPedido,iIdInsumo,iCantidad,fPrecio,fSubtotal) VALUES (?,?,?,?,?)";
                $cmddet = preparar_query($Conexion,$sqldet,[$pedido_id,$insumo_id,$insumo['cantidad'],$resprice['fPrecio'],$subdet]);  
                
                $total = $total + $subdet;
                }

               $up = "UPDATE Pedidos SET fTotal=? where iIdPedido=?";
               $cup = preparar_query($Conexion,$up,[$total,$pedido_id]);

                   $mensaje['status'] = TRUE;
                   $mensaje['message'] = 'Correcto';
            }
            else {
                 $mensaje['status'] = FALSE;
                 $mensaje['message'] = 'Ocurrio un errior en la bd';                    
            }
              echo json_encode($mensaje);  
           }
?>





