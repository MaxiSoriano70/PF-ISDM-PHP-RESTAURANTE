<?php

include "../Libs/Header.php";

?>


<?php

    if (!empty($_GET))
        {
          $iIdPlatillo=$_GET["iId"];
          $sql="update Platillos set bEliminado=0 where iIdPlatillo=?";
          $cmd=preparar_query($Conexion,$sql,[$iIdPlatillo]);

          if ($cmd=true) 
              {
               echo '<script>
                location.href ="/dbRestaurant/Platillos/"; 
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
