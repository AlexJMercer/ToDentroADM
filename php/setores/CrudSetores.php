<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
    $object        = new Setores();
    $object->setor = $_POST['setor'];
    $object->texto = $_POST['texto'];

    $object->InserirSetores();

    header("Location:ViewSetoresObj.php");
  }

  else if (isset($_POST['excluir']))
  {
    $object     = new Setores();
    $object->id = $_POST['id'];

    $object->ExcluirSetores();

    header("Location:ViewSetoresObj.php");
  }

  else if (isset($_POST['atualizar']))
  {
    $object        = new Setores();
    $object->id    = $_POST['id'];
    $object->setor = $_POST['setor'];
    $object->texto = $_POST['texto'];

    $object->AtualizarSetores();

    header("Location:ViewSetoresObj.php");
  }

 ?>
