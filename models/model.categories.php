<?php
    require_once("models/model.base.php");

    class Categories extends Base{

        public function getCategories(){
            $query= $this-> db-> prepare("
                SELECT  category_id, name
                FROM    categories
                WHERE   parent_id= 0 OR parent_id IS NULL
            ");

            $query-> execute();

            return $query-> fetchAll();
        }

        public function getSubCategories($id){
            $query= $this-> db-> prepare("
                SELECT  
                    c1.category_id,
                    c1.name,
                    c2.name AS parent_name
                FROM    
                    categories AS c1
                INNER JOIN
                    categories AS c2 ON(c1.parent_id= c2.category_id)
                WHERE   
                    c1.parent_id= ?
            ");

            $query-> execute([$id]);

            return $query->fetchAll();
        }
    }
?>