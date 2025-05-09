<?php

    include('funcoes.php');

    $tipoUsuario = $_POST["nTipoUsuario"];
    $nome        = $_POST["nNome"];
    $login       = $_POST["nLogin"];
    $senha       = $_POST["nSenha"];

    if($_POST["nAtivo"] == "on") $ativo = "S"; else $ativo = "N";

    include("conexao.php");

    if($funcao == "I"){

        $sql = "INSERT INTO usuarios (id_usuario,id_tipo_usuario,nome,email,senha,flg_ativos) "
                ." VALUES (".$idUsuario.","
                .$tipoUsuario.","
                ."'$nome',"
                ."'$login',"
                ."md5('$senha'),"
                ."'$ativo');";

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
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
    }

    header("location: ../usuarios.php");

?>