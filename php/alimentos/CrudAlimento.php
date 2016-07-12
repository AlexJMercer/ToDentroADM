<?php

include_once "../../class/Carrega.class.php";

    if (isset($_POST['enviar']))
    {
      $object           = new Alimentos();
      $object->alimento = $_POST['alimento'];

      $object->InserirAlimentos();

      header("Location:ViewAlimentosObj.php");
    }

    else if (isset($_POST['atualizar']))
    {
      $object           = new Alimentos();
      $object->id       = $_POST['id'];
      $object->alimento = $_POST['alimento'];

      $object->AtualizarAlimentos();

      header("Location:ViewAlimentosObj.php");
    }

    else if (isset($_POST['excluir']))
    {
      $object     = new Alimentos();
      $object->id = $_POST['id'];

      $object->ExcluirAlimentos();

      header("Location:ViewAlimentosObj.php");
    }
?>
