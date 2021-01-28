<?php
session_start();
   
            if(isset($_POST["login"]) && !empty($_POST["login"]) && isset($_POST["senha"]) && !empty($_POST["senha"])){

                include_once "../dataset/data/dataset.php";
                include_once "Usuario.class.php";


                $recebeClass = new recebeRetotna(); 
        

                    $login = addslashes($_POST["login"]);
                    $senha = addslashes($_POST["senha"]);

                    if($recebeClass->validaDados($login, $senha) == true){
                        if (isset($_SESSION['idUser'])) {
                            header("location: ../../login-true/index.php");
                        }else{
                            header("location: ../../index.php");
                        }
                    }else{
                        header("location: ../../index.php");
                    }

    }
    else{ header("location: ../../index.php"); }









?>
