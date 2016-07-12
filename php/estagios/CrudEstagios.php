<?php

include_once "../../class/Carrega.class.php";

    if (isset($_POST['enviar']))
    {
      $object             = new Estagios();
      $object->titulo     = $_POST['titulo'];
      $object->atividades = $_POST['atividades'];
      $object->salario    = $_POST['salario'];
      $object->condicoes  = $_POST['condicoes'];
      $object->exigencias = $_POST['exigencias'];
      $object->curso      = $_POST['curso'];
      $object->info       = $_POST['info'];
      //print_r($object);
      $object->Inserir();

      header("Location:ViewEstagiosObj.php");
    }

    else if (isset($_POST['atualizar']))
    {
      $object             = new Estagios();
      $object->id         = $_POST['id'];
      $object->titulo     = $_POST['titulo'];
      $object->atividades = $_POST['atividades'];
      $object->salario    = $_POST['salario'];
      $object->condicoes  = $_POST['condicoes'];
      $object->exigencias = $_POST['exigencias'];
      $object->curso      = $_POST['curso'];
      $object->info       = $_POST['info'];

      $object->atualizar();

      header("Location:ViewEstagiosObj.php");
    }

    else if (isset($_POST['excluir']))
    {
      $object     = new Estagios();
      $object->id = $_POST['id'];

      $object->excluir();

      header("Location:ViewEstagiosObj.php");
    }
?>
