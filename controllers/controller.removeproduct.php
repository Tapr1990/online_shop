<?php
  

    if($_SERVER["REQUEST_METHOD"]=== "POST" && !empty($id) && is_numeric($id)){
        header("Content-Type: application/json");

        unset($_SESSION["cart"][$id]);

        echo '{"message": "Accepted"}';
    }else{
        //405 method Not allowed
        http_response_code(405);
        exit;
    }
?>