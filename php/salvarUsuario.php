<?php
include("funcoes.php");

$tipoUsuario = $_POST["nTipoUsuario"];
$nome        = $_POST["nNome"];
$login       = $_POST["nEmail"];
$senha       = $_POST["nSenha"];
$funcao      = $_GET['funcao'];
$id          = $_GET['id'];
$setSenha    = '';
$nasc        = $_POST['nDataN'];

if ($senha != ''){
    $setSenha = "senha = md5('$senha'),";
}

$ativo = ($_POST['nAtivo'] == "on") ? '1' : '0';

include("conexao.php");

if($funcao == 'I'){
    $id = proximoID('usuarios','id_usuario');
    $sql = "INSERT INTO usuarios (id_usuario,id_tipo_usuario,nome,email,senha,data_nasc,flg_ativos)
            VALUES($id,$tipoUsuario,'$nome','$login',md5('$senha'),'$nasc','$ativo');";
}elseif($funcao == 'A'){
    $sql = "UPDATE usuarios
            SET nome = '$nome',
                email = '$login',
                $setSenha
                data_nasc = '$nasc',
                flg_ativos = '$ativo',
                id_tipo_usuario = $tipoUsuario
            WHERE id_usuario = $id;";
}elseif($funcao == 'E'){
    $sql = "DELETE FROM usuarios WHERE id_usuario = $id;";
}

$result = mysqli_query($conn,$sql);

// ✅ FOTO
if ($_FILES['nFoto']['tmp_name'] != "") {
    $extensao = pathinfo($_FILES['nFoto']['name'], PATHINFO_EXTENSION);
    $novoNome = md5($_FILES['nFoto']['name']) . '.' . $extensao;

    $diretorio = '../img/';
    if (!is_dir($diretorio)) {
        mkdir($diretorio);
    }

    move_uploaded_file($_FILES['nFoto']['tmp_name'], $diretorio . $novoNome);

    $dirImagem = 'img/' . $novoNome;

    // Atualiza a imagem
    $sql = "UPDATE usuarios SET foto = '$dirImagem' WHERE id_usuario = $id;";
    mysqli_query($conn, $sql);
}

mysqli_close($conn); // 


header('Content-Type: application/json');
echo json_encode(['success' => true]);
exit;



?>