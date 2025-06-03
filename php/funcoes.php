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

//////////   <FUNÇÕES AINDA EM TESTE>   //////////

//mostrar o total de salas de uma empresa
function mostrarSalas($IDempresa) {
    include('conexao.php');

    $sql = ("SELECT * FROM salas WHERE id_empresa = ".$IDempresa."");

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    //var_dump(mysqli_num_rows($result));
    //die();

    //return (mysqli_num_rows($result));
}

//mostrarSalas(1);

//mostrar o total de salas ATIVAS de uma empresa
function mostrarSalasAtivas($IDempresa) {
    include('conexao.php');

    $sql = ("SELECT * FROM salas WHERE id_empresa = ".$IDempresa." AND ativo = 1");

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    //var_dump(mysqli_num_rows($result));
    //die();

    //return (mysqli_num_rows($result));
}

//mostrarSalasAtivas(1);

//////////   <\FUNÇÕES AINDA EM TESTE>   //////////



?>