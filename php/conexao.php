<?php
//111
    //Abrir conexão com o Banco de Dados
    $conn = mysqli_connect("localhost","root","","sistema_contagem");


    if (!$conn) {
        // Se a conexão falhar, já exibe erro e encerra o script
        echo json_encode(['sucesso' => false, 'erro' => 'Falha na conexão com o banco de dados: ' . mysqli_connect_error()]);
        exit;
    }
?>