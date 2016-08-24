<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']))
  {
     $object             = new Monitorias();
     $object->curso      = $_POST['curso'];
     $object->disciplina = $_POST['disciplina'];
     $object->semestre   = $_POST['semestre'];
     $object->status     = $_POST['status'];
     $object->sala       = $_POST['sala'];
     $object->info       = $_POST['info'];

     $object->InserirMonitorias();

     header("Location:PreviewMonitoriasObj.php");
  }

  else if (isset($_POST['excluir']))
  {
     $object     = new Monitorias();
     $object->id = $_POST['id'];

     $object->ExcluirMonitorias();

     header("Location:PreviewMonitoriasObj.php");
  }

  else if (isset($_POST['atualizar']))
  {
     $object           = new Monitorias();
     $object->id       = $_POST['id'];
     $object->sala     = $_POST['sala'];
     $object->status   = $_POST['status'];
     $object->semestre = $_POST['semestre'];
     $object->info     = $_POST['info'];

     $object->AtualizarMonitorias();

     header("Location:PreviewMonitoriasObj.php");
  }

?>
