<?php
include("funcoes.php");


$tipoUsuario = $_POST["nTipoUsuario"];
$nome        = $_POST["nNome"];
$login       = $_POST["nEmail"];
$senha       = $_POST["nSenha"];
$funcao      = $_GET['funcao'];
$id          = $_GET['id'];
$setSenha    = '';
$tell        = $_POST['nTelefone'];
$nasc        = $_POST['nDataN'];

if ($senha != ''){
    $setSenha = "senha = md5('$senha'),";
}

if($_POST['nAtivo'] == "on"){
    $ativo = 'S';
}else{
    $ativo = 'N';
}

include("conexao.php");

if($funcao == 'I'){
    $id = proximoID('usuarios','id_usuario');
    $sql = "INSERT INTO usuarios (id_usuario,id_tipo_usuario,nome,email,senha,data_nasc,flg_ativos)
            VALUES($id,$tipoUsuario,'$nome','$login',md5('$senha'),'$nasc','$ativo');";

}elseif($funcao == 'A'){
                            $sql = "UPDATE usuarios
                            SET nome = '$nome',
	                        email = '$login',
                            $setSenha
                            data_nasc = '$nasc',
                            flg_ativos = '$ativo',
                            id_tipo_usuario = $tipoUsuario
                            WHERE id_usuario = $id;";
}elseif($funcao == 'E'){
    $sql = "DELETE FROM usuarios WHERE id_usuario = $id;";
}


//var_dump($sql);
//die();


$result = mysqli_query($conn,$sql);
mysqli_close($conn);

//IMAGEM
if($_FILES['nFoto']['tmp_name'] != ""){
    //Grava a extensão do arquivo
    $extensao = pathinfo ($_FILES['nFoto']['name'], PATHINFO_EXTENSION);

    //Novo nome 
    $novoNome = md5($_FILES['nFoto']['name']).'.'.$extensao;

    if(is_dir('../img')){
        $diretorio = '../img/';
    }else{
        $diretorio = mkdir('../img/');
    }

    move_uploaded_file($_FILES['nFoto']['tmp_name'], $diretorio.$novoNome);

    $dirImagem = 'img/'.$novoNome;
    
    include("conexao.php");
    $sql = "UPDATE usuarios
     SET foto = '".$dirImagem."'
     WHERE id_usuario = $id;";

     $result = mysqli_query($conn, $sql);
     mysqli_close($conn);
}

header('Content-Type: application/json');
echo json_encode(['success' => true]);
exit;

?>