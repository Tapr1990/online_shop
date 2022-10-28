<?php
    if(empty($id) || !is_numeric($id)){
        http_response_code(400);
        require("views/view.error_400.php");
        exit;
    }

    require("models/model.products.php");

    $model= new Products();

    $products= $model-> getProducts($id);

    if(empty($products)){
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }

    $title= $products[0]["parent_name"];

    require("views/view.products.php");
?>