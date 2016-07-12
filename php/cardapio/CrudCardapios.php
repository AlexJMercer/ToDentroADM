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
      //realiza recadastramento
      $object        = new Cardapios();
      $object->id    = $_POST['id'];

      $object->ExcluirCardapios();

      $obj           = new Cardapios();
      $obj->dia      = $_POST['dia'];
      $obj->data     = $_POST['data'];
      $obj->alimento = $_POST['alimento'];

      $obj->InserirCardapios();

      header("Location:ViewCardapiosObj.php");
  }
?>
