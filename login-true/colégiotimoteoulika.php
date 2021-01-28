<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v3.12.1, https://mobirise.com -->
  <title>Direcção Pedagógica do Ensino Geral  - Timóteo Ulika</title>
  <link rel="stylesheet" href="assets/master/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/master/css/def.css">
  <link rel="stylesheet" href="assets/master/css/tabela.css">
<style >

</style>
  <?php
      //iNCLUDES DE CONEXÃ E LINKS DE CHAMADA PARA CSS E JAVASCRIPTS
    include_once ("../controller/dataset/data/dataset.php");
    global $pdo;
    include_once("controller/control/menu/links-rel.php");
    ?>

</head>
<body>

  <?php include_once("controller/control/menu/tabs-ctu.php"); ?>


  <div style="overflow-x:auto; margin-top:10%;" class="dadosPosi">

    <table>
          <tr>
            <th class="texto-centralizado tamanho" >Horários</th>
              <th class="texto-centralizado tamanho" class="texto-centralizado">SEGUNDA FEIRA</th>
              <th class="texto-centralizado tamanho" > TERÇA FEIRA</th>
              <th class="texto-centralizado tamanho" > QUARTA FEIRA</th>
              <th class="texto-centralizado tamanho" >QUINTA FEIRA</th>
              <th class="texto-centralizado tamanho" >SEXTA FEIRA</th>
          </tr>
          <?php

#Adicionando os dados atravez de uma conexao PDO e metodo PREPARE

  //CRIANDO QUERYS PARA VALIDAÇÃO
  //query secundaria que verifica se os dia de aulas existem
  $query2 =
 "SELECT disc.Disciplina, cl.nome_classe, cur.nome_curso, dia_aula.Dia
 FROM horarios h
 JOIN disciplina disc ON disc.IdDisciplina = h.IdDisciplina
 JOIN dia_semana dia_aula ON dia_aula.IdDia =  h.IdDia_aula
 JOIN classe cl ON cl.id_classe = h.Idclasse
 JOIN curso cur ON cur.id_curso = cl.id_curso
 WHERE nome_curso = 'ANÁLISES CLÍNICAS'
 ORDER BY dia_aula ASC ";

//query principal para pegar a dataem que as aulas começã
 $query =
 "SELECT h.Entrada_aula, h.Saida_aula, disc.Disciplina, cl.nome_classe, cur.nome_curso, dia_aula.Dia
 FROM horarios h
 JOIN disciplina disc ON disc.IdDisciplina = h.IdDisciplina
 JOIN dia_semana dia_aula ON dia_aula.IdDia =  h.IdDia_aula
 JOIN classe cl ON cl.id_classe = h.Idclasse
 JOIN curso cur ON cur.id_curso = cl.id_curso
 WHERE nome_curso = 'ANÁLISES CLÍNICAS'
 ORDER BY Entrada_aula ASC ";

 //CRIAÇÃO DE VARIAVEIS QUE SÃO ASSOCIADOS COM OS DADOS QUEM ESTÃO NO BANCO DE DADOS


 // FIM DA ASSOCIAÇÃO E EXEXUTANDO A QUERY USANDO
   $select = $pdo->prepare($query);
   $select2 = $pdo->prepare($query2);
   $select->execute();
   $select2->execute();


   //CONDIÇÃ CASO EXISTE E SE NÃO

   while ($campo = $select ->fetch(PDO::FETCH_ASSOC)){

 $Saida = $campo['Saida_aula'];
 $Entrada = $campo['Entrada_aula'];
 $Disciplina = $campo['Disciplina'];
 $NomeClasse = $campo['nome_classe'];
 $NomeCurso= $campo['nome_curso'];
 $DiaDeAula = $campo['Dia'];


  // Validando se Qual dia da Semana é e Atriuindo as Aulas Automaticamente
      if ($DiaDeAula == "SEGUNDA - FEIRA") {
        echo "<tr><td>".$Entrada."e ".$Saida."</td>";
        echo "<td>".$Disciplina."</td>";
        echo "<td></td>";
        echo "<td></td></tr>";
      }
    elseif ($DiaDeAula == "TERÇA - FEIRA") {
      echo "<td></td><td></td>";
      echo "<td>".$Disciplina."</td>";

      echo "</tr>";
    }
    elseif ($DiaDeAula == "QUARTA - FEIRA") {
      echo "<td></td><td></td><td></td>";
      echo "<td>".$Disciplina."</td>";

      echo "</tr>";
    }
           /*  echo "<tr><td>Pessoa</td>";
              echo "<td>Pessoa 21</td>";
              echo "<td>Pessoa 2</td>";
              echo "<td>Pessoa 2</td>";
              echo "<td>Pessoa 2</td>";
              echo "<td>Pessoa 2</td></tr>";*/
  }

          ?>
      </table>
  </div>
<section class="engine"><a rel="external" href="#">DiREÇÃO PEDAGÓGICA</a>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/theme/js/script.js"></script>


  <input name="animation" type="hidden">
  </body>
</html>
