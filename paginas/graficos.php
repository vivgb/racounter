<?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
}
?>

    <h1>Graficos</h1>

    <div id="grafico" style="max-width: 800px; margin: auto;"></div>