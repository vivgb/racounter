<?php

    //Abrir conexão com o Banco de Dados

    $conn = mysqli_connect("172.16.46.130","raccounter","s3v3n14","raccounter");

    try{
        $conn = mysqli_connect("172.16.46.130","raccounter","s3v3n14","sistema_contagem");
        #var_dump($conn);
        #var_dump(mysqli_connect_error());
    } catch (Exception $e){
        var_dump("Falha: ".mysqli_connect_error());
    }
    #$conn = mysqli_connect("localhost","raccounter","s3v3n14","sistema_contagem") or die ("Falha: ".mysqli_connect_error());

/*class Database {

    protected $connection;

    function __construct(){
        $this->start()
    }

    private function start(){
        $error = Null;
        try{
            $this->connection = mysqli_connect("172.16.46.130","raccounter","s3v3n14","raccounter");
            if ($error = mysqli_connect_error()){ throw Exception($error); }
        }catch(Excaption $e){
            #TODO: realizar o tratamento
            echo "<pre>";
            var_dump($e);
            echo "</pre>";
        }
    }

    public function exec($query){
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }


    function __destruct(){
        if ($this->connection)
            mysqli_close($this->connection);
    }

}*/

?>