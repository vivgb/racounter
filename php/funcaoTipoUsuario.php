<?php

//Função para buscar a descrição do tipo de usuário
function descrTipoUsuario($id){

    $descricao = "";

    include("conexao.php");
    $sql = "SELECT descricao FROM tipo_usuario WHERE id_tipo_usuario = $id;";        
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
                
        $array = array();
        
        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array,$linha);
        }
        
        foreach ($array as $coluna) {            
            //***Verificar os dados da consulta SQL
            $descricao = $coluna["descricao"];
        }        
    } 

    return $descricao;
}

//Função para montar o select/option
function optionTipoUsuario(){

    $option = "";

    include("conexao.php");
    $sql = "SELECT id_tipo_usuario, descricao FROM tipo_usuario ORDER BY descricao;";        
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
                
        $array = array();
        
        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array,$linha);
        }
        
        foreach ($array as $coluna) {            
            //***Verificar os dados da consulta SQL            
            $option .= '<option value="'.$coluna['id_tipo_usuario'].'">'.$coluna['descricao'].'</option>';
        }        
    } 

    return $option;
}

//Descrição para gráfico de barras
function descrTipoUsuarioBarras(){

    $descricao = "";

    include("conexao.php");
    $sql = "SELECT descricao FROM tipo_usuario;";        
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
        $i = 1;
        foreach ($result as $coluna) {            
            //***Verificar os dados da consulta SQL
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