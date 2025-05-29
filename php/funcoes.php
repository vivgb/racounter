<?php
    include("funcaoTipoUsuario.php");

    //Descrição de uma Flag de ativos
function descrFlag($flag){
    if($flag == 'S'){
        return 'Sim';
    }else{
        return 'Não';
    } 
}

//Proximo id e uma tabela
function proximoID($tabela, $campo){
    $id = 0;
    $sql = include("conexao.php");

    $sql = "SELECT MAX($campo) AS ID FROM $tabela;";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        foreach($result as $campo){
            $id = $campo['ID'];
        }
    }
    return $id + 1;
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

function adicionarSala($con, $descricao, $lotacao_maxima) {
    $stmt = $con->prepare("INSERT INTO salas (descricao, lotacao_maxima, ativo) VALUES (?, ?, 1)");
    $stmt->bind_param("si", $descricao, $lotacao_maxima);
    return $stmt->execute();
}
?>