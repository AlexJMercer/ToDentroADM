<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
      $object           = new Cardapios();
      $object->dia      = $_POST['dia'];
      $object->data     = $_POST['data'];
      $object->alimento = $_POST['alimento'];
      /*var_dump($object);*/
      $object->InserirCardapios();

      header("Location:ViewCardapiosObj.php");
  }

  elseif (isset($_POST['excluir']))
  {
      $object     = new Cardapios();
      $object->id = $_POST['id'];

      $object->ExcluirCardapios();

      header("Location:ViewCardapiosObj.php");
  }

  elseif (isset($_POST['atualizar']))
  {
      $object           = new Cardapios();
      $object->id       = $_POST['id'];
      $object->data     = $_POST['data'];
      $object->alimento = $_POST['alimento'];

      $object->AtualizarCardapios();

      header("Location:ViewCardapiosObj.php");
  }
?>
