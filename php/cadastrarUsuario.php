<?php
include("conexao.php");
include("funcoes.php");

session_start();
header('Content-Type: application/json');

try {
    $tipoUsuario = $_POST["nTipoUsuario"] ?? '';
    $nome        = $_POST["nNome"] ?? '';
    $login       = $_POST["nEmail"] ?? '';
    $senha       = $_POST["nSenha"] ?? '';
    $ativo       = isset($_POST['nAtivo']) ? '1' : '0';
    $nasc        = $_POST["nDataN"] ?? null;

    if (!$tipoUsuario || !$nome || !$login || !$senha) {
        throw new Exception("Dados obrigatórios ausentes.");
    }

    $id = proximoID('usuarios', 'id_usuario');
    $sql = "INSERT INTO usuarios (id_usuario, id_tipo_usuario, nome, email, senha, data_nasc, flg_ativos)
            VALUES ($id, $tipoUsuario, '$nome', '$login', md5('$senha'), " . ($nasc ? "'$nasc'" : "NULL") . ", '$ativo')";
    
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        throw new Exception("Erro SQL: " . mysqli_error($conn));
    }

    echo json_encode(['success' => true]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

mysqli_close($conn);
exit;
?>
