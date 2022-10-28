<?php
    if(!isset($_SESSION["user_id"])){
        header("Location: " .ROOT. "/login");
        exit;
    }
    if(empty($_SESSION["cart"])){
        header("Location: " .ROOT. "/cart");
        exit;
    }

    require("models/model.orders.php");
    require("models/model.products.php");

    $modelOrders= new Orders();
    $modelProducts= new Products();

    $order_id= $modelOrders-> create($_SESSION["user_id"]);

    foreach($_SESSION["cart"] as $item){
        $item["order_id"]= $order_id;
        $modelOrders-> createDetail($item);

        $modelProducts-> updateStock($item["product_id"], $item["quantity"]);
    }

    unset($_SESSION["cart"]);

    $title= "Efetuar pagamento";
    $payment_reference_code= mt_rand(100000000, 999999999);
    
    require("views/view.checkout.php")
?>