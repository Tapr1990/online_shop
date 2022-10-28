<?php
    require("layout/header.php");
?>
            <h1>Candy Shop</h1>
            <h2>Compre aqui os seus...</h2>
            <ul>
<?php
    foreach($categories as $category){
        echo '
            <li>
                <a href="'.ROOT.'/subcategories/'.$category["category_id"].'">
                    '.$category["name"].'
                </a>
            </li>
        ';
    }
?>
            </ul>
<?php
    require("layout/footer.php");
?>