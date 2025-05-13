<?php

    include('funcoes.php');

    //$idUsuario   = 1;
    //var_dump($id);
    $tipoUsuario = 1; //$_POST["nTipoUsuario"];
    //var_dump($tipoUsuario);
    $nome        = $_POST["nNome"];
    //var_dump($nome);
    $email       = $_POST["nLogin"];
    //var_dump($email);
    $senha       = $_POST["nSenha"];
    //var_dump($senha);
    $funcao      = $_GET["funcao"];
    //var_dump($funcao);
    //die();

    if($_POST["nAtivo"] == "on") $ativo = "S"; else $ativo = "N";
    //var_dump($ativo);
    //die();

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
            $setSenha = ''; 
        }else{ 
            $setSenha = " Senha = md5('".$senha."'), ";
        }

        $sql = "UPDATE usuarios "
                ." SET id_tipo_usuario = $tipoUsuario, "
                    ." nome = '$nome', "
                    ." email = '$email', "
                    ." senha '.$setSenha.';"; 
    }elseif($funcao == "D"){

        $sql = "DELETE FROM usuarios "
                ." WHERE id_usuario = $idUsuario;";
    }

    $result = mysqli_query($conn,$sql);
    //var_dump($result);
    //die();
    mysqli_close($conn);


    if($_FILES['Foto']['tmp_name'] != ""){


        $extensao = pathinfo($_FILES['Foto']['name'], PATHINFO_EXTENSION);
        $novoNome = md5($_FILES['Foto']['name']).'.'.$extensao;        
        
        if(is_dir('../dist/img/')){

            $diretorio = '../dist/img/';
        }else{

            $diretorio = mkdir('../dist/img/');
        }
        move_uploaded_file($_FILES['Foto']['tmp_name'], $diretorio.$novoNome);

        $dirImagem = 'dist/img/'.$novoNome;

        include("conexao.php");

        $sql = "UPDATE usuarios "
                ." SET foto = '$dirImagem' "
                ." WHERE id_usuario = $idUsuario;";

        var_dump(sql);
        die();
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
    }

    header("location: ../inicial.php");

?>