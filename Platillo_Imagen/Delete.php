<?php

include "../Libs/Header.php";
      
?>


<?php


         if (!empty($_GET['iIdPlaIm']))   
              {
                $iIdPlatillo_Imagen=$_GET['iIdPlaIm'];
                $iIdImagen=$_GET['iIdIm'];
                $iIdPlatillo=$_GET['iId'];

                $sql="update platillo_imagen set bEliminado=1 where iIdPlatillo_Imagen=?";
                $cmd=preparar_query($Conexion,$sql,[$iIdPlatillo_Imagen]);


                if ($cmd=true)
                    {
                      $sqla="update imagenes set bEliminado=1 where iIdImagen=?";
                      $cmda=preparar_query($Conexion,$sqla,[$iIdImagen]);
                    }

                echo '<script>
                 location.href ="Imagenes.php?iId='.$iIdPlatillo.'"; 
                </script>';

              } 


?>





<?php

      include '../Libs/Footer.php';

?>