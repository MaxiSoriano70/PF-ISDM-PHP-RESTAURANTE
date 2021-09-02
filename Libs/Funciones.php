<?php
    function preparar_query($conexion,$sql,$param=[],$tipo=""){
        $tipo = $tipo ? $tipo : str_repeat("s",count($param));
        $cmd=$conexion->prepare($sql);
        if($param!=[]){
            $cmd->bind_param($tipo, ...$param);
            $cmd->execute();
        }else{
            $cmd->execute();
        }
        
        return $cmd;
    }

    
    function preparar_select($conexion,$sql,$param=[],$tipo=""){
       return preparar_query($conexion,$sql,$param,$tipo="")->get_result();

    }
?>