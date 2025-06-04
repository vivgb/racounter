<?php
include("conexao.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../painel.php?page=adm");
    exit;
}

$id = intval($_GET['id']);

$sql = "DELETE FROM usuarios WHERE id_usuario = $id";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

header("Location: ../painel.php?page=adm");
exit;
?>
