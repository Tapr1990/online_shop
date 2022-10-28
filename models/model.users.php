<?php
    require_once("models/model.base.php");

    class Users extends Base{
        public function create($data){
            $query= $this-> db-> prepare("
                INSERT INTO users
                (name, email, password, street, postal_code, city, country)
                VALUES(?, ?, ?, ?, ?, ?, ?)
            ");

            $query-> execute([
                $data["name"],
                $data["email"],
                password_hash($data["password"], PASSWORD_DEFAULT),
                $data["street"],
                $data["postal_code"],
                $data["city"],
                $data["country"]
            ]);

            return $this-> db-> lastInsertId();
        }

        public function login($data){
            $query= $this-> db-> prepare("
                SELECT user_id, password
                FROM users
                WHERE email= ?
            ");

            $query-> execute([
                $data["email"]
            ]);

            $user= $query-> fetch();

            if(
                !empty($user) &&
                password_verify($data["password"], $user["password"])
            ){  
                return $user;
            }

            return [];
        }
    }
?>