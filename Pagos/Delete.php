<?php
include "../Libs/Header.php";
?>


<?php

    if (!empty($_GET))
        {
          $iIdPago=$_GET["iId"];
          $sql="DELETE FROM PAGOS WHERE iIdPago=?";
          $cmd=preparar_query($Conexion,$sql,[$iIdPago]);

          if ($cmd=true) 
              {
               echo '<script>
                location.href ="/dbRestaurant/Pagos/"; 
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
