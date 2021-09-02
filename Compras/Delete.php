<?php
    include "../Libs/Header.php";
?>

<?php
    if (!empty($_GET["iId"]))
        {
          $iIdCompra=$_GET["iId"];
          $sqlb="DELETE FROM DETALLE_COMPRA WHERE iIdCompra=?";
          $cmdb=preparar_query($Conexion,$sqlb,[$iIdCompra]);
          if ($cmdb==true) 
              {
               $sql="DELETE FROM COMPRAS WHERE iIdCompra=?";
               $cmd=preparar_query($Conexion,$sql,[$iIdCompra]);
               echo '<script>
                location.href ="/dbRestaurant/Compras/"; 
               </script>';
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