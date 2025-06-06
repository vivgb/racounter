<?php
function obterTema($conn){
    // Verifica se o usuário está logado
    if (array_key_exists('idLogin', $_SESSION) && isset($_SESSION['idLogin'])) {
        $usuarioId = $_SESSION['idLogin'];

        // Prepara a query para buscar o tema do usuário no banco
        $stmt = $conn->prepare("SELECT tema FROM usuarios WHERE id_usuario = ?");
        $stmt->bind_param('i', $usuarioId);
        $stmt->execute();

        $result = $stmt->get_result();

        // Verifica se encontrou o tema
        if ($result->num_rows > 0) {
            $resultado = $result->fetch_assoc();
            $tema = ($resultado['tema'] == 1 ? 'dark' : 'light');  // Converte 1/0 para 'dark' ou 'light'
            return ['tema' => $tema];
        } else {
            return ['tema' => 'light'];  // Se não encontrar, retorna 'light'
        }
    } else {
        return ['tema' => 'light'];  // Se o usuário não estiver logado, retorna 'light'
    }
}
?>
