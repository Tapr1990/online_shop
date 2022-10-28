<?php

    if(
        $_SERVER["REQUEST_METHOD"]=== "POST" &&
        !empty($id) &&
        is_numeric($id) &&
        isset($_POST["quantity"]) &&
        intval($_POST["quantity"])> 0 &&
        isset($_SESSION["cart"][$id]) &&
        $_SESSION["cart"][$id]["stock"]>= $_POST["quantity"]

    ){
        header("Content-Type: application/json");

        $_SESSION["cart"][$id]["quantity"]= intval($_POST["quantity"]);

        echo '{"message": "Accepted"}';
    }else{
        //405 method Not allowed
        http_response_code(405);
        exit;
    }
?>