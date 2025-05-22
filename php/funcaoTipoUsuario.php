<?php

function descrTipoUsuario($id){

    $descricao = "";

    include("conexao.php");
    $sql = "SELECT descricao FROM tipo_usuario 
            WHERE id_tipo_usuario = $id;"; 

    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        $array = array();
        
        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array,$linha);
        }
        
        foreach ($array as $coluna) {            
            $descricao = $coluna["descricao"];
        }        
    } 

    return $descricao;
}
function optionTipoUsuario(){

    $option = "";

    include("conexao.php");
    $sql = "SELECT id_tipo_usuario, descricao FROM tipo_usuario ORDER BY descricao;";        
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {                       
            $option .= '<option value="'.$coluna['id_tipo_usuario'].'">'.$coluna['descricao'].'</option>';
        }        
    } 
    return $option;
}

function descrTipoUsuarioBarras(){

    $descricao = "";

    include("conexao.php");
    $sql = "SELECT descricao FROM tipo_usuario;";        
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);


    if (mysqli_num_rows($result) > 0) {
        $i = 1;
        foreach ($result as $coluna) {            
           
            if($i < 3){
                $descricao .= "'".$coluna["descricao"]."',";
            }else{
                $descricao .= "'".$coluna["descricao"]."'";
            }
            
        }        
    } 
    return $descricao;
}

?>