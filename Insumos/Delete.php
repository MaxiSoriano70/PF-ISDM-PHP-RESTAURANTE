<?php
    include "../Libs/Header.php";
?>


<?php

    if (!empty($_GET))
        {
          $iIdInsumo=$_GET["iId"];
          $sql="update Insumos set bEliminado=1 where iIdInsumo=?";
          $cmd=preparar_query($Conexion,$sql,[$iIdInsumo]);

          if ($cmd) 
              {
               echo '<script>
                location.href ="/dbRestaurant/Insumos/"; 
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