<?php

/**
 * Criando Variaveis que vaõ armazerna valores dos 
 * dados da conexão para a conexão com o Banco de Dados.
 * 
 * Depois vamos criar um formulario para a conficuração do Banco de dados
 */
//********************************************************************* */
//Variaveis
//Nome do Banco de Dados
$dbname = "gestaodp";

//Senha do Servidor do Banco de dados
$senha ="";

//Nome do Usuario do Servidor
$username = "root";

//Servidor do Site
$host = "localhost";

//********************************************************************* */

//********************************************************************* */
//Variavel Global Acessivel por todos os Documentos
global $pdo;

// Connection 
$dsn = 'mysql:dbname='.$dbname. ';host='.$host;

//Variavel de Conexão de Dominio //************************ */
/************************************************************************ */
/* Tentando Conectar-se com o Banco de Dados***************** */
    try {

        $pdo = new PDO($dsn, $username, $senha);
       // echo " <h1 > Connection Sucess</h1>";
    
    } 
    /******************************************************************* */
    /** Caso de Erro na Conexão Moster esta Mensagem */

    catch (PDOException $erroBanco) {
        echo "Erro ao conectar-se com o Banco <br> ".$erroBanco->getMessage();
    }


//********************************************************************* */
//FIMCONEXTION

?>