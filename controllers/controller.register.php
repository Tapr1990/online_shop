<?php
    $title="Criar conta";

    require("models/model.countries.php");

    $modelCountries= new Countries();
    $countries= $modelCountries-> get();

    foreach($countries as $country){
        $countryCodes[]= $country["code"];
    }

    if(
        isset($_POST["send"])
    ){
        if(
            filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)  &&
            $_POST["password"]=== $_POST["password_repeated"]   &&
            mb_strlen($_POST["name"])>= 3                       &&
            mb_strlen($_POST["name"])<= 64                      &&
            mb_strlen($_POST["password"])>= 8                   &&
            mb_strlen($_POST["password"])<= 1000                &&
            mb_strlen($_POST["street"])>= 8                     &&
            mb_strlen($_POST["street"])<= 120                   &&
            mb_strlen($_POST["postal_code"])>= 4                &&
            mb_strlen($_POST["postal_code"])<= 32               &&
            mb_strlen($_POST["city"])>= 4                       &&
            mb_strlen($_POST["city"])<= 32                      &&
            in_array($_POST["country"], $countryCodes)
        ){
            require("models/model.users.php");
            $modelUsers= new Users();

            $user_id= $modelUsers-> create($_POST);

            //registo válido, efetuar login automaticamente
            if(!empty($user_id)){
                $_SESSION["user_id"]= $user_id;
                header("Location: ".ROOT."/");
            }
            else{
                $message= "Este utilizador já existe";
            }
        }
        else{
            $message= "Por favor preencha todos os campos corretamente";
        }
    }
    
    require("views/view.register.php");
?>