<?php
    include "../Libs/Header.php";
?>

<?php
    if (!empty($_GET["iId"]))
        {
          $iIdPedido=$_GET["iId"];
          $sqlb="DELETE FROM DETALLE_PEDIDO WHERE iIdPedido=?";
          $cmdb=preparar_query($Conexion,$sqlb,[$iIdPedido]);
          if ($cmdb==true) 
              {
               $sql="DELETE FROM PEDIDOS WHERE iIdPedido=?";
               $cmd=preparar_query($Conexion,$sql,[$iIdPedido]);

               if ($cmd) {
                echo '<script>
                 location.href ="/dbRestaurant/Pedidos/"; 
                </script>';
               }
               
              }
        }
    else 
       {
         echo "Error";
       }
?>

<?php
      include "../Libs/Footer.php"; 
?>