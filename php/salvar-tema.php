<?php
// salvar-tema.php
//teste

session_start();
require_once 'conexao.php'; // Arquivo de conexão com o banco de dados
#removi "php/" do require_once

$data = json_decode(file_get_contents("php://input"), true);

// Verifica se o tema foi enviado e se o usuário está logado
if (array_key_exists('tema', $data) && array_key_exists('idLogin', $_SESSION) && isset($_SESSION['idLogin'])) {
    #Mudei de isset para array_key_exists que evita erros e é mais eficiente
    #e corrigi a chave da sessão que estava sendo usada... estava incorreta.

    $usuarioId = $_SESSION['idLogin'];  // ID do usuário logado
    $tema = ($data['tema'] === 'dark' ? 1 : 0);  // Salva 1 para dark, 0 para light
    #Corrigido o ternário

    // Prepara a query para atualizar o tema no banco de dados
    $stmt = $conn->prepare("UPDATE usuarios SET tema = ? WHERE id_usuario = ?");
    $stmt->bind_param('ss', $tema, $usuarioId);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'sucesso']);
    } else {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Erro para atualizar perfil']);
        #Adicionada mensagem para exceção
    }
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Dados inválidos']);
}
?>
