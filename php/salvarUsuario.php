<?php
    include('funcoes.php');

    $tipoUsuario = $_POST["nTipoUsuario"];
    $nome        = $_POST["nNome"];
    $login       = $_POST["nLogin"];
    $email       = $_POST["nEmail"];
    $senha       = $_POST["nSenha"];
    $funcao      = $_GET["funcao"];

    if($_POST["nAtivo"] == "on") $ativo = "S"; else $ativo = "N";

    include("conexao.php");

    if($funcao == "I"){
        $sql = "INSERT INTO usuarios (id_usuario,id_tipo_usuario,nome,email,senha,flg_ativos)"
                ." VALUES (".$idUsuario.","
                .$tipoUsuario.","
                ."'$nome',"
                ."'$login',"
                ."md5('$senha'),"
                ."'$ativo');";


    }elseif($funcao == "A"){

        if($senha == ''){ 
        $sql = "DELETE FROM usuarios "
                ." WHERE id_usuario = $idUsuario;";
    }
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);
    }
    header("location: ../inicial.php");

?>