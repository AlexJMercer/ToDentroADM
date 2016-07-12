<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
      $object             = new Programacao();
      $object->evento     = $_POST['evento'];
      $object->dataInicio = $_POST['dataInicio'];
      $object->dataFim    = $_POST['dataFim'];

      $object->Inserir();

      header("Location:ViewProgramacaoObj.php");
  }

  else if (isset($_POST['excluir']))
  {
      $object     = new Programacao();
      $object->id = $_POST['id'];

      $object->Excluir();

      header("Location:ViewProgramacaoObj.php");

    }  


  else if (isset($_POST['atualizar']))
  {
      $object             = new Programacao();
      $object->id         = $_POST['id'];
      $object->evento     = $_POST['evento'];
      $object->dataInicio = $_POST['dataInicio'];
      $object->dataFim    = $_POST['dataFim'];

      $object->Atualizar();

      header("Location:ViewProgramacaoObj.php");
  }

?>
