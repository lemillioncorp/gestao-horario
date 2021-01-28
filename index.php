<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso ao Sistema</title>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="viewport/master/jquery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="viewport/master/css/log.css">
</head>
<body>
  
 <div class="container">
            
    <form action="controller/acess/receber.php" method="post" class="col-lg-4 col-lg-offset-4 my_form">
        <img src="assets/images/login/grupo.png" alt="" class="center-block">
            <h2 class="text-center">Well coming</h2>    
                
                    <label for="inputName" class="sr-only">Nome de Usuário</label>
                    <input type="text" name="login" class="form-control" placeholder="Nome de Usuário" id="inputName" required autofocus>
                         
                    <label for="inputPassword" class="sr-only">Senha</label>
                    <input type="password" name="senha" placeholder="Senha de Acesso" required class="form-control" id="inputPassword">
                    <div class="checkbox">
                        <label >
                            <input type="checkbox" value="Lembra-me"> Lembra-me
                        </label>
                    </div>
                    <input type="submit" name="system" value="Entar" class="btn btn-primary btn-block login-btn" data-loading-text="Logando, Aguarde ...">

        </form>
</div><!-- Fechamento da div container -->
  
</body>
</html>