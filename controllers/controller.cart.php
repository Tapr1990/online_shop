<?php
    if(isset($_POST["send"])){

        require("models/model.products.php");

        $model= new Products();

        $product= $model-> getProduct($_POST["product_id"]);

      
        if(
            !empty($product) &&
            $product["stock"]>= $_POST["quantity"]
        ){   
            $_SESSION["cart"][$product["product_id"]]= [
                "product_id"=> $product["product_id"], 
                "quantity"=> intval($_POST["quantity"]),
                "name"=> $product["name"],
                "price"=> $product["price"],
                "stock"=> $product["stock"],
            ];

            
            header("Location: ".ROOT. "/cart");
        }
    }
    
    $title= "Carrinho";

    require("views/view.cart.php");
?>