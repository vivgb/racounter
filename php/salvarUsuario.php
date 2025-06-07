<?php
include("funcoes.php");
include("conexao.php");
session_start();

$funcao = $_POST['funcao'] ?? '';
$id = $_POST['id'] ?? '';


header('Content-Type: application/json');

try {
    $tipoUsuario = $_POST["nTipoUsuario"] ?? '';
    $nome        = $_POST["nNome"] ?? '';
    $login       = $_POST["nEmail"] ?? '';
    $senha       = $_POST["nSenha"] ?? '';
    $funcao      = $_GET['funcao'] ?? '';
    $id          = $_GET['id'] ?? '';
    $nasc        = $_POST['nDataN'] ?? '';
    $ativo       = isset($_POST['nAtivo']) ? '1' : '0';

    $setSenha = '';
    if ($senha !== '') {
        $setSenha = "senha = md5('$senha'),";
    }

    if ($funcao == 'I') {
        $id = proximoID('usuarios', 'id_usuario');
        $sql = "INSERT INTO usuarios (id_usuario, id_tipo_usuario, nome, email, senha, data_nasc, flg_ativos)
                VALUES ($id, $tipoUsuario, '$nome', '$login', md5('$senha'), '$nasc', '$ativo');";
    } elseif ($funcao == 'A') {
        $sql = "UPDATE usuarios
                SET nome = '$nome',
                    email = '$login',
                    $setSenha
                    data_nasc = '$nasc',
                    flg_ativos = '$ativo',
                    id_tipo_usuario = $tipoUsuario
                WHERE id_usuario = $id;";
    } elseif ($funcao == 'E') {
        $sql = "DELETE FROM usuarios WHERE id_usuario = $id;";
    } else {
        throw new Exception("Função inválida.");
    }

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        throw new Exception("Erro SQL: " . mysqli_error($conn));
    }


    if (!empty($_FILES['nFoto']['tmp_name'])) {
        // salvar a foto
        $extensao = pathinfo($_FILES['nFoto']['name'], PATHINFO_EXTENSION);
        $novoNome = md5($_FILES['nFoto']['name'] . time()) . '.' . $extensao;
        $diretorio = '../img/';

        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0755, true);
        }

        if (move_uploaded_file($_FILES['nFoto']['tmp_name'], $diretorio . $novoNome)) {
            $dirImagem = 'img/' . $novoNome;

            $sqlFoto = "UPDATE usuarios SET foto = '$dirImagem' WHERE id_usuario = $id;";
            $resultFoto = mysqli_query($conn, $sqlFoto);
            if (!$resultFoto) {
                throw new Exception("Erro ao salvar foto: " . mysqli_error($conn));
            }

            $_SESSION['fotoPerfil'] = $dirImagem; // atualiza sessão
        } else {
            throw new Exception("Erro ao mover a imagem.");
        }
    }

    // para foto pré-definida (caso use)
    if (isset($_POST['fotoEscolhida']) && $_POST['fotoEscolhida'] != '') {
        $dirImagem = $_POST['fotoEscolhida'];
        $sqlFoto = "UPDATE usuarios SET foto = '$dirImagem' WHERE id_usuario = $id;";
        $resultFoto = mysqli_query($conn, $sqlFoto);
        if (!$resultFoto) {
            throw new Exception("Erro ao salvar foto pré-definida: " . mysqli_error($conn));
        }
        $_SESSION['fotoPerfil'] = $dirImagem; // atualiza sessão
    }

    echo json_encode(['success' => true, 'foto' => $_SESSION['fotoPerfil']]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

mysqli_close($conn);
exit;
?>
