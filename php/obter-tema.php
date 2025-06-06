<?php
// obter-tema.php

session_start();
require_once 'conexao.php'; // Arquivo de conexão com o banco de dados
include 'funcaoObterTema.php';

echo json_encode(obterTema($conn));
?>
