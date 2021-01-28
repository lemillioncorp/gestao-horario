
<?php
    include_once ("../controller/dataset/data/dataset.php");

//VERIFICANDO SE O USUARIO CLICOU NO BOTÃO ASSOCIAR HORARIO OU CADASTRAR HORARIO
    if (isset($_POST['btn-associar-horario'])) {
    global $pdo;
      //CRIANDO VARIAVEIS PARA RECEBER DADOS QUE VIRÃO DO FORMULARIO DE CADASTRO DE HOARARIO
      //ASSOCIANDO OS CAMPOS QUE VEM DO FORMULARIO A VARIAVEIS QUE VÃO EXECUTAR OS SEUS VALAORES
      $NomeProfessor = $_POST['selecione_professor'];
      $NomeDisciplina = $_POST['selecione_disciplina'];
      $NomeCiclo = $_POST['selecione_ciclo'];
      $NomeClasse = $_POST['selecione_classe'];
      $NomeTurma = $_POST['selecione_turma'];
      $NomeDiaAula = $_POST['selecione_dia'];
      $HoraEntrada = $_POST['tempo_entrada'];
      $HoraSaida = $_POST['tempo_saida'];

      //Conversão de data inserida para hora que o banco de dados aceite
      $HoraEntrada = date(" h:i");
      $HoraSaida = date(" h:i");

      //CRIAR A QUERY && CRIANDO METODO DE PREPARACÃO E EXECUÇÃO DO INSERT NO BANCO DE DADOS
      $inserir_horario_bd =
      "INSERT INTO
      horarios(IdDia_aula,IdProfessor,IdDisciplina,IdClasse,IdTurma,Entrada_aula,Saida_aula)
      VALUES (:professor,:disciplina,:ciclo,:classe,:turma,:dia,:entrada_aula,:saida_aula)";
      if ($NomeProfessor == "" || $NomeDisciplina == "" || $NomeCiclo == "" || $NomeClasse == "" || $NomeTurma == "" ) {
            echo "<script> alert('Olá, Precisamos que tu preenchas os campos!')</script>";
        }
      else {
            if ($inserir_horario = $pdo->prepare($inserir_horario_bd)){
             $inserir_horario->bindValue(":professor", $NomeProfessor);
             $inserir_horario->bindValue(":disciplina", $NomeDisciplina);
             $inserir_horario->bindValue(":ciclo", $NomeCiclo);
             $inserir_horario->bindValue(":classe", $NomeClasse);
             $inserir_horario->bindValue(":turma", $NomeTurma);
             $inserir_horario->bindValue(":dia", $NomeDiaAula);
             $inserir_horario->bindValue(":entrada_aula", $HoraEntrada);
             $inserir_horario->bindValue(":saida_aula", $HoraSaida);
             //$inserir_horario->execute();
                $inserir_horario->execute();

             echo "<script> alert('Horário Cadastrado com Sucesso!');</script>";

           header("Location: cadastro-horario-professor-ctu.php");
      }
      else{
          echo"<script> alert('Não foi possivel Cadastrar o Horário! Tente Novamente Mais tarde Obrigodo'); </script>";
        }
      }
    }
else {
        header("Location: index.php");
        }










    ?>
