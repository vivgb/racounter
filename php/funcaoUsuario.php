<?php

function proxIdUsuario(){

    $id = "";

    include("conexao.php");
    $sql = "SELECT MAX(id) AS Maior FROM usuarios;";      
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    //var_dump(mysqli_num_rows($result));
    //die();

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
                
        $array = array();

        //var_dump($array);
        //die();
        
        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array,$linha);
        }
        
        foreach ($array as $coluna) {            
            $id = $coluna["Maior"] + 1;
        }        
    }else{
        $id = 1;
    }

    return $id;
}

?>