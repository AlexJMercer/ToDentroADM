<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
      $object            = new Instituto();
      $object->instituto = $_POST['instituto'];

      $object->Inserir();

      header("Location:ViewInstitutosObj.php");
  }

  else if (isset($_POST['excluir']))
  {
      $object     = new Instituto();
      $object->id = $_POST['id'];

      $object->Excluir();

      header("Location:ViewInstitutosObj.php");
  }

  else if (isset($_POST['atualizar']))
  {
      $object            = new Instituto();
      $object->id        = $_POST['id'];
      $object->instituto = $_POST['instituto'];

      $object->Atualizar();

      header("Location:ViewInstitutosObj.php");
  }

?>
