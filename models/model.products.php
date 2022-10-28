<?php
    require_once("models/model.base.php");

    class Products extends Base{
        
        public function getProducts($category_id){

            $query= $this-> db-> prepare("
                SELECT
                    products.product_id, 
                    products.name, 
                    categories.name AS parent_name
                FROM
                    products
                INNER JOIN 
                    categories USING(category_id)
                WHERE 
                    products.category_id= ?
            ");

            $query-> execute([$category_id]);

            return $query-> fetchAll();
        }

        public function getProduct($id){
            $query= $this-> db-> prepare("
                SELECT  
                    product_id, name, description, 
                    image, stock, price
                FROM
                    products
                WHERE
                   product_id= ?
            ");

            $query-> execute([$id]);

            return $query-> fetch();
        }

        public function updateStock($id, $quantity){
            $query= $this->db -> prepare("
                UPDATE products
                SET stock= stock- ?
                WHERE product_id= ?
            ");

            return $query-> execute([
                $quantity,
                $id
            ]);
        }
    }
?>