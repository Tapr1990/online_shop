<?php
    require("layout/header.php"); 
    
    if(!empty($_SESSION["cart"])){
        ?>
                <table>
                    <caption>Atualmente no carrinho</caption>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Subtotal</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        
        <?php
            $total= 0;
            foreach($_SESSION["cart"] as $item){
                echo '
                        <tr data-product_id="'.$item["product_id"].'">
                            <td>'.$item["name"].'</td>
                            <td>
                                <input 
                                    type="number" 
                                    class="change-quantity" 
                                    value="'.$item["quantity"].'" 
                                    min="1" 
                                    max="'.$item["stock"].'"
                                >
                            </td>
                            <td>'.$item["price"].'€</td>
                            <td>'.($item["price"]*$item["quantity"]).'€</td>
                            <td>
                                <button class="remove-button" type="button">X</button>
                            </td>
                        </tr>
                ';
                $total= $total+ ($item["price"]*$item["quantity"]);
            }     
        ?>                  
                        <tr>
                            <td colspan="3">Total</td>
                            <td colspan="2"><?php echo $total;?>€</td>
                        </tr>
                    </tbody>
                </table>
                <div class="checkout">
                    <a href="<?php echo ROOT;?>/checkout">Efetuar encomenda</a>
                </div>
        <?php
    }
    else{
        echo '<p role="alert">Ainda não escolheu nenhum produto</p>';
    }
    require("layout/footer.php"); 
?>