<?php

     require_once("Config.php");

       $Conexion= new mysqli(HOST,USER,PASSWORD,DATABASE);
        
        if ($Conexion->connect_errno)
            {
              echo "<br><i><b>Error al Intentar conectar con la Base de Datos</i></b>";
            }

?>