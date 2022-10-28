<?php
    require("layout/header.php");
?>
            <h1><?php echo $title;?></h1>
            <div class="description"><?php echo $product["description"]; ?></div>
            <figure>
                <img src="<?php echo ROOT ."/images/". $product["image"]; ?>" alt="">
            </figure>
            <div class="info">
                <div class="price"><?php echo $product["price"]; ?>€</div>
<?php
    if(intval($product["stock"])> 0){
?>
                <form method="post" action="<?php echo ROOT;?>/cart">
                    <div>
                        <label>
                            Quantidade
                            <input 
                                type="number" 
                                name="quantity" 
                                min="1" 
                                max="<?php echo$product["stock"]; ?>" 
                                value="1" 
                                required>
                        </label>
                        <input 
                            type="hidden" 
                            name="product_id" 
                            value="<?php echo $product["product_id"];?>"
                        >
                        <button type="submit" name="send">Adicionar</button>
                    </div>
                </form>
<?php
    }else{
        echo '<p>Producto esgotado, tente mais tarde</p>';
    }
?>
            </div>
<?php
    require("layout/footer.php");
?>