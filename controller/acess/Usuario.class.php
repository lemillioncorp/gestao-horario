<?php

class recebeRetotna{

        public function validaDados($login, $senha){

            global $pdo;
            $sql = "SELECT * FROM usuario WHERE nome_login = :nome_login AND senha = :senha";
            $sql = $pdo->prepare($sql);

            $sql->bindValue(':nome_login', $login);
            $sql->bindValue(':senha', $senha);
            $sql->execute();

                if ($sql-> rowCount() > 0) {
                   $dado = $sql->fetch();
                  
                   $_SESSION['idUser'] = $dado['IDusuario'];

                   return true;
                }
                else{
                    
                    return false;
                }






        }

}
















?>