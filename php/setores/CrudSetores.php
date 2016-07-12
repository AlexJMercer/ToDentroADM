<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
    $object        = new Setores();
    $object->setor = $_POST['setor'];
    $object->texto = $_POST['texto'];

    $object->Inserir();

    header("Location:ViewSetoresObj.php");
  }

  else if (isset($_POST['excluir']))
  {
    $object     = new Setores();
    $object->id = $_POST['id'];

    $object->Excluir();

    header("Location:ViewSetoresObj.php");
  }

  else if (isset($_POST['atualizar']))
  {
    $object        = new Setores();
    $object->id    = $_POST['id'];
    $object->setor = $_POST['setor'];
    $object->texto = $_POST['texto'];

    $object->Atualizar();

    header("Location:ViewSetoresObj.php");
  }

 ?>
