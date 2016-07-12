<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
      $object       = new Local();
      $object->sala = $_POST['sala'];

      $object->Inserir();

      header("Location:ViewLocalObj.php");
  }

  else if (isset($_POST['excluir']))
  {
      $object     = new Local();
      $object->id = $_POST['id'];

      $object->Excluir();

      header("Location:ViewLocalObj.php");
  }

  else if (isset($_POST['atualizar']))
  {
      $object       = new Local();
      $object->id   = $_POST['id'];
      $object->sala = $_POST['sala'];

      $object->Atualizar();

      header("Location:ViewLocalObj.php");
  }

?>
