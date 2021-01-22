<?php    
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $bd = "banco";

    $connect = new mysqli($host, $user, $password, $bd);

    if($connect->connect_error){        
        echo "Falha ao tentar conectar no banco: {$conexao->connect_error}";
        exit();
    }    