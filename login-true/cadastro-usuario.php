<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php

        include_once("controller/control/menu/links-rel.php");
        include_once ("../controller/dataset/data/dataset.php");
        global $pdo;
        ?>
    <title>Cadastro de Usuário</title>
  </head>
  <body>
    <form class="form-horizontal" action="#" method="post">
      <legend style="text-align:center;">Cadastrar Usuários</legend>

      <div style="margin:1.8em;">
      <label for="">Nome do Usuário</label>
      <input type="text" name="nome_usuario" value="" class="form-control">

      <!--Pegando os dadso que estão a vir da tabela de cargo e inserir na tabela de usuario-->
      <label for="">Tipo do Usuário</label>
        <select class="form-control" name="tipo_usuario">
            <option value="">Normal</option>
            <option value="">Administrativo</option>
        </select>

          <!--Pegando os dadso que estão a vir da tabela de cargo e inserir na tabela de usuario-->
        <label for="" class="control">Cargo Do Usuário</label>
        <select class="form-control" name="cargo_usuario">
          <?php
            $resultado_cargo = "SELECT * FROM cargo";
            $resultado_cargo_usuario = $pdo->prepare($resultado_cargo);
            $resultado_cargo_usuario->execute();
            while ($cada_linha_cargo = $resultado_cargo_usuario->fetch(PDO::FETCH_ASSOC)) {?>
          <option value="<?php echo $cada_linha_cargo['id_cargo']; ?>"> <?php echo $cada_linha_cargo['nome_cargo']; ?></option>
        <?php } ?>
        </select>

        <!--Criação dos campos de senha e login-->
        <fieldset>
          <legend style="text-align:center;">Dados do Conta</legend>
          <label for="">Nome de Login</label>
            <input type="text" name="nome_login" value="" class="form-control">
          <label >Senha</label>
            <input  style="font-size:14pt;" type="password" name="senha_login" value="" class="form-control">
        </fieldset>

      </div>
        <br>
        <div class="">

        </div>
        <button type="submit" name="btn-cadastrar-usuario" class="btn btn-primary form-control ">Cadastrar Usuário</button>
    </form>
  </body>
</html>
