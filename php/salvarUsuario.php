<?php
    include('funcoes.php');

    //$idUsuario   = 1;
    //var_dump($id);
    $tipoUsuario = 1; //$_POST["nTipoUsuario"];
    //var_dump($tipoUsuario);
    $nome        = $_POST["nNome"];
    //var_dump($nome);
    $email       = $_POST["nEmail"];
    //var_dump($email);
    $senha       = $_POST["nSenha"];
    //var_dump($senha);
    $funcao      = $_GET["funcao"];
    //var_dump($funcao);
    //die();

    if($_POST["nAtivo"] == "on") $ativo = "S"; else $ativo = "N";

    include("conexao.php");

    if($funcao == "I"){
        $idUsuario = proxIdUsuario();
        //var_dump();
        //die();

        $sql = "INSERT INTO usuarios (id,nome,email,senha,flg_ativos) VALUES (".$idUsuario.",'".$nome."','".$email."', md5('".$senha."'),'".$ativo."');";

        //var_dump($sql);
        //die();


    }elseif($funcao == "A"){

        if($senha == ''){ 
        $sql = "DELETE FROM usuarios "
                ." WHERE id_usuario = $idUsuario;";
    }

    }

    $result = mysqli_query($conn,$sql);
    //var_dump($result);
    //die();
    mysqli_close($conn);

    header("location: ../inicial.php");

?>