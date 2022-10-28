<?php
    require("layout/header.php");
?>
            <h1><?php echo $subcategories[0]["parent_name"];?></h1>
            <ul>
<?php
    foreach($subcategories as $subcategory){
        echo '
            <li>
                <a href="'.ROOT.'/products/'.$subcategory["category_id"].'">
                    '.$subcategory["name"].'
                </a>
            </li>
        ';
    }
?>
            </ul>
<?php
    require("layout/footer.php");
?>