<?php
    require("layout/header.php");
?>
            <h1><?php echo $products[0]["parent_name"];?></h1>
            <ul>
<?php
    foreach($products as $product){
        echo '
            <li>
                <a href="'.ROOT.'/productdetail/'.$product["product_id"].'">
                    '.$product["name"].'
                </a>
            </li>
        ';
    }
?>
            </ul>
<?php
    require("layout/footer.php");
?>