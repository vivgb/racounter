<?php
    include("funcaoTipoUsuario.php");

    //Descrição de uma Flag de ativo
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


function buscarSalaPorId($con, $id) {
    $stmt = $con->prepare("SELECT descricao, lotacao_atual FROM salas WHERE id_salas = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

?>