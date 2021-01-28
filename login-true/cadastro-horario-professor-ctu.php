

</body>
<!DOCTYPE html>
<html lang="pt">

<?php
session_start();
    include_once("controller/control/menu/links-rel.php");
    include_once ("../controller/dataset/data/dataset.php");
    global $pdo;
    ?>
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Cadastrar Horario dos Professores - Ensino Geral</title>
    <link rel="stylesheet" href="assets/master/css/def.css">
    </head>
<body>
  <?php //include_once("controller/control/menu/tabs-ctu.php"); ?>
<div style="margin-top:2%; padding:2em;">

<form  class="form-horizontal form-control" action="cadastro-horario.php" method="post">
  <fieldset>
    <legend>Cadastro de Horário dos Professores do Ensino Geral</legend>
<div class="fieldset-primario">
  <label for="">Qual <b>Professor</b> desejas Cadastrar neste Horário?</label>
  <select name="selecione_professor" id="" class="form-control">
        <option value="Selecione">--Selecione--</option>
      <?php
      $buscar_professor = "SELECT * FROM professor";
      $resultado_professor = $pdo ->prepare($buscar_professor);
      $resultado_professor->execute();
      //Laço de Repetição para cada linha traz um resultado

      while ($cada_linha_traz_professor = $resultado_professor->fetch(PDO::FETCH_ASSOC)) {  ?>

        <option value="<?php echo $cada_linha_traz_professor['Id_professor'];?>">
          <?php echo $cada_linha_traz_professor['nomeProfessor']; ?></option>
      <?php } ?>
  </select><i class="fa fa-face">Nota: Se o Professor Não Estiver na Lista Clique <a href="#"> Aqui!</a></i> <br> <br>


<!-- ################################################################-->
    <label for="">Em qual <b>Disciplina</b> Este Professor Dará aulas?</label>
      <select name="selecione_disciplina" id="" class="form-control">
        <option value="Selecione">--Selecione--</option>
          <?php

          $buscar_disciplina = "SELECT * FROM disciplina";
          $resultado_discplina = $pdo ->prepare($buscar_disciplina);
          $resultado_discplina->execute();
          //Laço de Repetição para cada linha traz um resultado

          while ($cada_linha_traz_disciplina = $resultado_discplina->fetch(PDO::FETCH_ASSOC)) {  ?>

            <option value="<?php echo $cada_linha_traz_disciplina['IdDisciplina'];?>">
              <?php echo $cada_linha_traz_disciplina['Disciplina']; ?></option>
          <?php } ?>
      </select>

      </div>
<!-- ##################### CICLO###########################################-->
    <div class="fieldset-borda">

    <label for="">Em qual <b>Ciclo</b> Este Professor Dará aulas?</label>
    <select name="selecione_ciclo" id="" class="form-control">
          <option value="Selecione">--Selecione--</option>
        <?php
        $buscar_ciclo = "SELECT * FROM gest_ciclo";
        $resultado_ciclo = $pdo ->prepare($buscar_ciclo);
        $resultado_ciclo->execute();
        //Laço de Repetição para cada linha traz um resultado

        while ($cada_linha_traz_ciclo = $resultado_ciclo->fetch(PDO::FETCH_ASSOC)) {  ?>

          <option value="<?php echo $cada_linha_traz_ciclo['Id_ciclo'];?>">
            <?php echo $cada_linha_traz_ciclo['nome_ciclo']; ?></option>
        <?php } ?>
    </select>


<!-- ########################CLASSE########################################-->
      <label for="">Em qual<b> Classe </b> Este Professor Dará aulas?</label>
      <select name="selecione_classe" id="" class="form-control">
          <option value="Selecione">--Selecione--</option>
          <?php

          $buscar_classe = "SELECT * FROM classe";
          $resultado_classe = $pdo ->prepare($buscar_classe);
          $resultado_classe->execute();
          //Laço de Repetição para cada linha traz um resultado

          while ($cada_linha_traz_classe = $resultado_classe->fetch(PDO::FETCH_ASSOC)) {  ?>

            <option value="<?php echo $cada_linha_traz_classe['id_classe'];?>">
              <?php echo $cada_linha_traz_classe['nome_classe']; ?></option>
          <?php } ?>
      </select>

<!-- ################################################################-->
          <label for="">Em qual <b>Turma</b> Este Professor Dará aulas?</label>
          <select name="selecione_turma" id="" class="form-control" >
              <option value="Selecione">--Selecione--</option>
              <?php

              $buscar_turno = "SELECT * FROM turma";
              $resultado_turno = $pdo ->prepare($buscar_turno);
              $resultado_turno->execute();
              //Laço de Repetição para cada linha traz um resultado

              while ($cada_linha_traz_turno = $resultado_turno->fetch(PDO::FETCH_ASSOC)) {  ?>

                <option value="<?php echo $cada_linha_traz_turno['id_turma'];?>">
                  <?php echo $cada_linha_traz_turno['nome_turma']; ?></option>
              <?php } ?>
          </select>
<!--##################################DIA#################################-->
          <label for="">Em qual <b> dia</b> Este Professor Dará aulas?</label>
          <select name="selecione_dia" id="" class="form-control" >
              <option value="Selecione">--Selecione--</option>
              <?php

              $buscar_dia_aula = "SELECT * FROM dia_semana";
              $resultado_dia_aula = $pdo ->prepare($buscar_dia_aula);
              $resultado_dia_aula->execute();
              //Laço de Repetição para cada linha traz um resultado

              while ($cada_linha_traz_dia_aula = $resultado_dia_aula->fetch(PDO::FETCH_ASSOC)) {  ?>

                <option value="<?php echo $cada_linha_traz_dia_aula['IdDia'];?>">
                  <?php echo $cada_linha_traz_dia_aula['Dia']; ?></option>
              <?php } ?>
          </select>
          <fieldset>
            <legend>TEMPO DE AULA</legend>
            <label for="">Hora de Entrada</label>

            <input type="time" name="tempo_entrada" required >

            <label for="">Hora de Saída</label>
            <input type="time" name="tempo_saida" required>
          </fieldset>
              <div class="">
                <button type="submit" name="btn-associar-horario" class=" btn btn-primary">Cadastrar Horário</button>
              </div>
    </div>

</form>
</div>
</fieldset>
  <section >

<?php
$sql = "SELECT us.nome_usuario, cg.nome_cargo FROM usuario us JOIN cargo cg ON cg.id_cargo = us.id_cargo WHERE IDusuario = :identificacao";

$prepara = $pdo ->prepare($sql);
//Informe qual e' o dados
$cod = $_SESSION['idUser'];

$prepara  ->bindParam(':identificacao', $cod);
$prepara->execute();

$result = $prepara->fetchAll();

foreach ($result as  $value) {
echo '<div class="dados-login"> <fieldset> <legend>Usuário</legend> Nome do Usuário: '.$value['nome_usuario'].'<br> Cargo: ' .$value['nome_cargo'].'<br></fieldset></div><br>';


}
 ?>
  </section>


</body>
</html>
