<?php
    require "bd.php";

    if($_GET["opcao"] == "read"){

        $sql = "SELECT financa.id, financa.lancamento_id, financa.detalhe, 
                financa.valor, financa.data, lancamento.desc1 FROM financa INNER JOIN lancamento ON lancamento.id = financa.lancamento_id";
            
        if($resultado = $connect->query($sql)){
            $financas["financas"] = array();
            
            $financas["financas"] = $resultado->fetch_all(MYSQLI_ASSOC);

            $financas["erro"] = "";
        }else{
           
            $financas["erro"] = $connect->error;
        }
        
        echo json_encode($financas);
    }
    
    if($_GET["opcao"] == "create"){
        $detalhe = $_POST["detalhe"];
        $lancamento_id = $_POST["lancamento_id"];
        $data = $_POST["data"];
        $valor = $_POST["valor"];

        $sql = "INSERT INTO financa (detalhe, lancamento_id, data, valor)
            VALUES ('$detalhe', '$lancamento_id', '$data', '$valor')"; 
        
        $erro['erro'] = ($connect->query($sql))? "":$connect->error;                          
        
        echo json_encode($erro);
    }

    if($_GET["opcao"] == "update"){
        $id = $_POST["id"];
        $detalhe = $_POST["detalhe"];
        $lancamento_id = $_POST["lancamento_id"];
        $data = $_POST["data"];
        $valor = $_POST["valor"];

        $sql = "UPDATE financa SET detalhe='$detalhe', lancamento_id='$lancamento_id', 
        data='$data', valor='$valor' WHERE id = '$id'"; 
        
        $erro['erro'] = ($connect->query($sql))? "":$connect->error;
        
        echo json_encode($erro);
    }

    if($_GET["opcao"] == "delete"){
        $id = $_GET["id"];
        
        $sql = "delete from financa where id = '$id'";
        
        $erro['erro'] = ($connect->query($sql))? "":$connect->error;

        echo json_encode($erro);
    }

    $connect->close();