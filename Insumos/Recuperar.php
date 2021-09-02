<?php
    include "../Libs/Header.php";
?>


<?php
    if (!empty($_GET))
        {
          $iIdInsumo=$_GET["iId"];
          $sql="update Insumos set bEliminado=0 where iIdInsumo=?";
          $cmd=preparar_query($Conexion,$sql,[$iIdInsumo]);

          if ($cmd=true) 
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