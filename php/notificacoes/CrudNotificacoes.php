<?php
include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']) && !empty($_POST['titulo']) && !empty($_POST['texto']))
  {
    $object              = new Notificacoes();
    $object->titulo      = $_POST['titulo'];
    $object->texto       = $_POST['texto'];
    if (isset($_POST['notificar']))
    {
      $object->notificacao = 1;
    }
    else
    {
      $object->notificacao = 0;
    }

    $object->InserirNotificacoes();
    /*if ($object->InserirNotificacoes())
    {
      header("Location:ViewNotificacoesObj.php?success");
    }
    else
    {
      header("Location:ViewNotificacoesObj.php?erro");
    }*/

    /*echo "<pre>";
    var_dump($object);
    echo "</pre>";*/
  }
  elseif (condition)
  {
    # code...
  }
  elseif (isset($_POST['atualizar']) && !empty($_POST['titulo']) && !empty($_POST['texto']))
  {
    # code...
  }

 ?>
