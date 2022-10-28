<?php
    session_start();

    define("ENV", parse_ini_file(".env"));

    define(
        "ROOT",
        rtrim(
            str_replace(
                "\\", "/", dirname($_SERVER["SCRIPT_NAME"])
            ),
            "/"
        )
    );

    $url_parts= explode("/", $_SERVER["REQUEST_URI"]);

    $controlers=[
        "home", "subcategories", "products", "productdetail", "cart", "checkout", "login", "register", "removeproduct", "changequantity"
    ];


    $controller= $url_parts[3] ?: "home";
    $id= $url_parts[4] ?? "";
    
    if(!in_array($controller, $controlers)){
        http_response_code(404);
        die("Página não encontrada");
    }
    require("controllers/controller.".$controller.".php")
?>