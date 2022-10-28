<?php
    $title="Efetuar Login";

    if(isset($_POST["send"])){
        if(
            !empty($_POST["email"])&&
            !empty($_POST["password"])&&
            filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)&&
            mb_strlen($_POST["password"])>= 8 &&
            mb_strlen($_POST["password"])<= 1000
        ){
            require("models/model.users.php");
            $model= new Users();

            $user= $model->login($_POST);

            if(!empty($user)){
                $_SESSION["user_id"]= $user["user_id"];
                
                header("Location: ". ROOT. "/");
                exit;
            }
        }
        $message= "Dados incorretos, confirme o preenchimento do email ou password";
    }
    
    require("views/view.login.php");
?>