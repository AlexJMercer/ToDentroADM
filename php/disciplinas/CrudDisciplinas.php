<?php

include_once "../../class/Carrega.class.php";

    if (isset($_POST['enviar']))
    {
      $object             = new Disciplinas();
      $object->disciplina = $_POST['disciplina'];
      $object->curso      = $_POST['curso'];

      $object->InserirDisciplinas();

      header("Location:PreviewDisciplinasObj.php");
    }

    else if (isset($_POST['atualizar']))
    {
      $object             = new Disciplinas();
      $object->id         = $_POST['id'];
      $object->disciplina = $_POST['disciplina'];
      $object->curso      = $_POST['curso'];

      $object->AtualizarDisciplinas();

      header("Location:PreviewDisciplinasObj.php");
    }

    else if (isset($_POST['excluir']))
    {
      $object     = new Disciplinas();
      $object->id = $_POST['id'];

      $object->ExcluirDisciplinas();

      header("Location:PreviewDisciplinasObj.php");
    }

?>
