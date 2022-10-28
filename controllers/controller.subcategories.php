<?php
    if(empty($id) || !is_numeric($id)){
        http_response_code(400);
        require("views/view.error_400.php");
        exit;
    }

    require("models/model.categories.php");

    $model= new Categories();

    $subcategories= $model-> getSubCategories($id);

    if(empty($subcategories)){
        http_response_code(404);
        require("views/view.error_404.php");
        exit;
    }

    $title= $subcategories[0]["parent_name"];

    require("views/view.subcategories.php");
?>