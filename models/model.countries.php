<?php
    require("models/model.base.php");

    class Countries extends Base{
        public function get(){
            $query= $this-> db-> prepare("
                SELECT code, name
                FROM countries
            ");

            $query-> execute();

            return $query-> fetchAll();
        }
    }
?>