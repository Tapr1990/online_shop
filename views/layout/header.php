<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?> - Candy Shop</title> 
        <style>
                html{
                    font-family:"Lucida Sans";
                }
                table{
                    width:100%;
                }
                table, tr, th, td{
                    border: 3px solid #000;
                    text-align: center;
                    border-collapse: collapse;
                }
                th{
                    background: #666;
                }
                caption{
                    font-size: 3vw;
                }
                a{
                    text-decoration: none;
                    color: #AAA;
                }
                nav{
                    background: #AAA;
                    color: #000;
                    margin-top: 5px;
                    border:3px solid #000;
                    display: flex;
                    justify-content: space-around;
                }
                nav a{
                    color:#000;
                }
                nav a:hover{
                    background: #CCC;
                }
                .message{
                    border:3px solid #000;
                    background: #A10;
                }
                .checkout{
                    border:3px solid #000;
                    margin-top: 5px;
                    text-align: center;
                    width: 25%;
                }
                .checkout:hover{
                    background: #333;
                }
                figure{
                    display: flex;
                    justify-content: center;
                    border: 3px solid #000;
                }
                figure img{
                    width: 30%;
                    max-height: 300px;
                }
                .remove-button{  
                    cursor: pointer;
                    color: #A10;
                    background: none;
                    border: none;
                }
                .remove-button:hover{
                    font-weight: 700;
                }
                .change-quantity{
                    border: none;
                    text-align: center;
                    width:20%;
                }
        </style>
        <script>
            document.addEventListener("DOMContentLoaded", ()=>{
                const root= document.querySelector("body").dataset.root;

                const removeButtons= document.querySelectorAll(".remove-button");
                const quantityInputs= document.querySelectorAll(".change-quantity");

                removeButtons.forEach(button=>{
                    button.addEventListener("click", ()=>{
                        const tr= button.parentNode.parentNode;
                        const product_id=tr.dataset.product_id;


                        fetch(root+ "/removeproduct/"+ product_id, {
                            "method":"POST",
                            "headers":{
                                "Content-Type":"application/x-www-form-urlencoded"
                            }
                        })
                        .then(response=> response.json())
                        .then(result=> {
                            tr.remove();
                        })
                        .catch(err=> alert("Ocorreu um erro, tente mais tarde"));
                    });
                })

                quantityInputs.forEach(input=>{
                    input.addEventListener("change", ()=> {
                        const tr= input.parentNode.parentNode;
                        const product_id= tr.dataset.product_id;

                        fetch(root+ "/changequantity/"+ product_id, {
                            "method":"POST",
                            "headers":{
                                "Content-Type":"application/x-www-form-urlencoded"
                            },
                            "body":"quantity="+ input.value
                        })
                        .then(response=> response.json())
                        .then(result=> {
                            console.log(result);
                        })
                        .catch(err=> alert("Coloque uma quantidade válida"));
                    });
                });
            });
        </script>
    </head>
    <body data-root="<?php echo ROOT; ?>">
        <main>