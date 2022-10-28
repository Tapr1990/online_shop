<?php
    require("models/model.categories.php");

    $model= new Categories();

    $categories= $model-> getCategories();

    $title= "Home";

    require("views/view.home.php");
?>