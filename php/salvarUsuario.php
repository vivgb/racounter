<?php
include("funcoes.php");
include("conexao.php");
session_start();

header('Content-Type: application/json');

try {
    $funcao = $_POST['funcao'] ?? '';
    $id = $_POST['id'] ?? '';

    $tipoUsuario = $_POST["nTipoUsuario"] ?? '';
    $nome        = $_POST["nNome"] ?? '';
    $login       = $_POST["nEmail"] ?? '';
    $senha       = $_POST["nSenha"] ?? '';
    $ativo       = isset($_POST['nAtivo']) ? '1' : '0';

    // Verificações básicas
    if (!$tipoUsuario || !$nome || !$login || !$senha) {
        throw new Exception("Campos obrigatórios ausentes.");
    }

    if ($funcao === 'I') {
        $id = proximoID('usuarios', 'id_usuario');
        $sql = "INSERT INTO usuarios (id_usuario, id_tipo_usuario, nome, email, senha, flg_ativos)
                VALUES ($id, $tipoUsuario, '$nome', '$login', md5('$senha'), '$ativo')";
    } else {
        throw new Exception("Função inválida.");
    }

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        throw new Exception("Erro SQL: " . mysqli_error($conn));
    }

    // Se o ADM quiser cadastrar com imagem
    if (!empty($_FILES['nFoto']['tmp_name'])) {
        $extensao = pathinfo($_FILES['nFoto']['name'], PATHINFO_EXTENSION);
        $novoNome = md5($_FILES['nFoto']['name'] . time()) . '.' . $extensao;
        $diretorio = '../imagem/';

        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0755, true);
        }

        if (move_uploaded_file($_FILES['nFoto']['tmp_name'], $diretorio . $novoNome)) {
            $dirImagem = 'imagem/' . $novoNome;
            $sqlFoto = "UPDATE usuarios SET foto = '$dirImagem' WHERE id_usuario = $id;";
            $resultFoto = mysqli_query($conn, $sqlFoto);
            if (!$resultFoto) {
                throw new Exception("Erro ao salvar foto: " . mysqli_error($conn));
            }
        } else {
            throw new Exception("Erro ao mover a imagem.");
        }
    }

    echo json_encode(['success' => true]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

mysqli_close($conn);
exit;
?>
