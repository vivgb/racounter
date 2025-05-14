<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    include("funcoes.php");

    $_SESSION['logado'] = 0;

    $email = stripslashes($_POST["nEmail"]);
    $senha =  ($_POST["nSenha"]);

    include("conexao.php");
    
    $sql = "SELECT * FROM usuarios "
            ." WHERE email = '$email' "
            ." AND senha = md5('$senha');";
            
    $resultLogin = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if (mysqli_num_rows($resultLogin) > 0) {  
        foreach ($resultLogin as $coluna) {
            $_SESSION['id_tipo_usuario'] = $coluna['id_tipo_usuario'];
            $_SESSION['logado']        = 1;
            $_SESSION['idLogin']       = $coluna['id_usuario'];
            $_SESSION['NomeLogin']     = $coluna['nome'];
            $_SESSION['AtivoLogin']    = $coluna['flg_ativos'];

<<<<<<< HEAD
            header('location: ../painel.php');
=======
            header('location: ../inicial.php');
>>>>>>> 1aa3134611a58819dc7b80ce1803e24308d80d68
        }
    }else {
        header('location: ../');
    }
?>