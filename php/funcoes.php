<?php
include("funcaoTipoUsuario.php");
//Descrição de uma Flag de ativos
function descrFlag($flag){
    if($flag == 'S'){
        return 'Sim';
    }else{
        return 'Não';
    } 
}

//Proximo id e uma tabela
function proximoID($tabela, $campo){
    $id = 0;
    $sql = include("conexao.php");

    $sql = "SELECT MAX($campo) AS ID FROM $tabela;";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        foreach($result as $campo){
            $id = $campo['ID'];
        }
    }
    return $id + 1;
}





?>