<?php
    include('funcoes.php');

<<<<<<< HEAD
    //$idUsuario   = 1;
    //var_dump($id);
    $tipoUsuario = 1; //$_POST["nTipoUsuario"];
    //var_dump($tipoUsuario);
    $nome        = $_POST["nNome"];
    //var_dump($nome);
    $email       = $_POST["nLogin"];
    //var_dump($email);
=======
    $tipoUsuario = $_POST["nTipoUsuario"];
    $nome        = $_POST["nNome"];
    $login       = $_POST["nLogin"];
    $email       = $_POST["nEmail"];
>>>>>>> 59391f24843ce1662c86ca0881e639a28ceeee6f
    $senha       = $_POST["nSenha"];
    $funcao      = $_GET["funcao"];

    if($_POST["nAtivo"] == "on") $ativo = "S"; else $ativo = "N";

    include("conexao.php");

    if($funcao == "I"){
<<<<<<< HEAD
        $idUsuario = proxIdUsuario();
        //var_dump();
        //die();

        $sql = "INSERT INTO usuarios (id,nome,email,senha,flg_ativos) VALUES (".$idUsuario.",'".$nome."','".$email."', md5('".$senha."'),'".$ativo."');";

        //var_dump($sql);
        //die();
=======
        $sql = "INSERT INTO usuarios (id_usuario,id_tipo_usuario,nome,email,senha,flg_ativos)"
                ." VALUES (".$idUsuario.","
                .$tipoUsuario.","
                ."'$nome',"
                ."'$login',"
                ."md5('$senha'),"
                ."'$ativo');";
>>>>>>> 59391f24843ce1662c86ca0881e639a28ceeee6f


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