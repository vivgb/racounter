<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/conexao.php';

function adicionarSala($con, $descricao, $lotacao_maxima, $id_empresa) {
    $stmt = $con->prepare("INSERT INTO salas (descricao, lotacao_maxima, ativo, id_empresa) VALUES (?, ?, 1, ?)");
    $stmt->bind_param("sii", $descricao, $lotacao_maxima, $id_empresa);
    return $stmt->execute();
}


//buscar todas as empresas
function buscarTodasEmpresas($conn) {
    return $conn->query("SELECT id_empresa, nome FROM empresa");
}

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $descricao = trim($_POST['descricao'] ?? '');
    $lotacao_maxima = intval($_POST['lotacao_maxima'] ?? 0);
    $id_empresa = intval($_POST['id_empresa'] ?? 0);

    // Validação simples
    if ($descricao === '') {
        $mensagem = "Por favor, informe a descrição da sala.";
    } elseif ($lotacao_maxima <= 0) {
        $mensagem = "Informe uma lotação máxima válida.";
    } elseif ($id_empresa <= 0) {
        $mensagem = "Selecione uma empresa válida.";
    } else {
        // Tenta inserir no banco
        if (adicionarSala($conn, $descricao, $lotacao_maxima, $id_empresa)) {
            // Sucesso: redireciona para página de salas
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
    $stmt = $con->prepare("SELECT descricao, lotacao_atual, lotacao_maxima, agendamento FROM salas WHERE id_salas = ?");
    $stmt->bind_param("i", $idSala);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

?>