    <?php 
    #Conexão do Banco de DADOS com PHP
 
    //*********************************************** */
    try {
      /******************************************************************************** */

      $pdo = new PDO("mysql:host=localhost;dbname=gestaodp","dp","timoteo23");
      
      /******************************************************************************** */
      echo "<script>alert('Sucess Connection to Database')</script>";
    }

    catch (PDOExecption $erroConexao) {
  
     /******************************************************************************** */
     echo "<script>alert('Error to connect database. try agin later')</script>";

     $erroConexao->getMessage();

      /******************************************************************************** */
      
    }

 ?>