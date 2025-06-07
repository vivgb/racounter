<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once 'conexao.php';
function adicionarSala($con, $descricao, $lotacao_maxima, $id_empresa, $id_usuario) {
    $stmt = $con->prepare("INSERT INTO salas (descricao, lotacao_maxima, ativo, id_empresa, id_usuario) VALUES (?, ?, 1, ?, ?)");
    $stmt->bind_param("siii", $descricao, $lotacao_maxima, $id_empresa, $id_usuario);
    return $stmt->execute();
    
}

function editarSala($con, $id_sala, $descricao, $lotacao_maxima, $id_empresa, $id_usuario) {
    $stmt = $con->prepare("UPDATE salas 
                           SET descricao = ?, 
                               lotacao_maxima = ?, 
                               id_empresa = ?, 
                               id_usuario = ?
                           WHERE id_salas = ?");
    $stmt->bind_param("siiii", $descricao, $lotacao_maxima, $id_empresa, $id_usuario, $id_sala);
    return $stmt->execute();
}

function excluirSala($con, $id_sala) {
    $stmt = $con->prepare("DELETE FROM salas WHERE id_salas = ?");
    $stmt->bind_param("i", $id_sala);
    return $stmt->execute();
}

//busca todos os usuarios
function buscarTodosUsuarios($con) {
    return $con->query("SELECT id_usuario, nome FROM usuarios WHERE flg_ativos = 1");
}

//procura o id do usuario pelo nome
function buscarUsuarioPorNome($con, $nome) {
    $stmt = $con->prepare("SELECT id_usuario FROM usuarios WHERE nome = ?");
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_assoc();
}

//buscar todas as empresas
function buscarTodasEmpresas($conn) {
    return $conn->query("SELECT id_empresa, nome FROM empresa");
}

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = trim($_POST['descricao'] ?? '');
    $lotacao_maxima = intval($_POST['lotacao_maxima'] ?? 0);
    $id_empresa = intval($_POST['id_empresa'] ?? 0);
    $id_usuario = intval($_POST['id_usuario'] ?? 0); // Vem do select

    if ($descricao === '') {
        $mensagem = "Por favor, informe a descrição da sala.";
    } elseif ($lotacao_maxima <= 0) {
        $mensagem = "Informe uma lotação máxima válida.";
    } elseif ($id_empresa <= 0) {
        $mensagem = "Selecione uma empresa válida.";
    } elseif ($id_usuario <= 0) {
        $mensagem = "Selecione um usuário válido.";
    } else {
        if (adicionarSala($conn, $descricao, $lotacao_maxima, $id_empresa, $id_usuario)) {
            header("Location: ../painel.php?page=salas");
            exit;
        } else {
            $mensagem = "Erro ao adicionar sala. Tente novamente.";
        }
    }
}

//buscar ID sala
function buscarTodasSalas($con) {
    return $con->query("SELECT id_salas, descricao, lotacao_atual, lotacao_maxima, agendamento FROM salas WHERE ativo = 1");
}


function buscarSalaPorId($con, $idSala) {
    $stmt = $con->prepare("
        SELECT s.descricao, s.lotacao_atual, s.lotacao_maxima, s.agendamento, s.id_usuario, u.nome AS nome_usuario
        FROM salas s
        LEFT JOIN usuarios u ON s.id_usuario = u.id_usuario
        WHERE s.id_salas = ?
    ");
    $stmt->bind_param("i", $idSala);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
    
}


function alterarLotacao($conn, $idSala, $operacao) {
    if ($operacao === 'mais') {
        $sql = "UPDATE salas SET lotacao_atual = lotacao_atual + 1 WHERE id_salas = ? AND lotacao_atual < lotacao_maxima";
    } elseif ($operacao === 'menos') {
        $sql = "UPDATE salas SET lotacao_atual = lotacao_atual - 1 WHERE id_salas = ? AND lotacao_atual > 0";
    } else {
        return false;
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idSala);
    return $stmt->execute();
}

function registrarMovimentacao($conn, $id_usuario, $id_sala, $tipo) {
    $stmt = $conn->prepare("INSERT INTO movimentacao (id_usuario, id_salas, tipo, data_hora) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iis", $id_usuario, $id_sala, $tipo);
    return $stmt->execute();
}

// Função para buscar usuário vinculado à sala
function buscarUsuarioVinculadoSala($conn, $idSala) {
    $stmt = $conn->prepare("SELECT id_usuario FROM salas WHERE id_salas = ?");
    $stmt->bind_param("i", $idSala);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $sala = $resultado->fetch_assoc();
    return $sala['id_usuario'];
}
$con = null;
?>