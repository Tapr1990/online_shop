<?php
    if(empty($id) || !is_numeric($id)){
        http_response_code(400);
        require("views/view.error_400.php");
        exit;
    }

    require("models/model.products.php");

    $model= new Products();

    $product= $model-> getProduct($id);

    if(empty($product)){
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }

    $title= $product["name"];

    require("views/view.productdetail.php");
?>