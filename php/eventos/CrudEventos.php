<?php

//include 'Upload.class.php';
include_once "../../class/Carrega.class.php";

   if (isset($_POST['enviar']))
   {
      $object             = new Eventos();
      $object->evento     = $_POST['evento'];
      $object->dataInicio = $_POST['dataInicio'];
      $object->dataFim    = $_POST['dataFim'];
      $object->horario    = $_POST['horario'];
      $object->categoria  = $_POST['categoria'];
      $object->texto      = $_POST['texto'];
      /*echo "<pre>";
      print_r($object);
      //$object->Inserir();
      echo "</pre>";*/

      if ($object->InserirEventos())
      {
         if (!empty($_FILES["imagem"]["name"]))
         {
            $myUpload = new Upload($_FILES["imagem"]);
            $Up       = $myUpload->eventoUpload();
             /*echo "<pre>";
             print_r($myUpload);
             echo "</pre>";*/
         }
         else
         {
            $noImage = new Eventos();
            $noImage->noImageUp();
             /*echo "<pre>";
             print_r($noImage);
             echo "</pre>";*/
         }
      }
      header("Location:ViewEventosObj.php");
   }

   else if (isset($_POST['excluir']))
   {
      $object     = new Eventos();
      $object->id = $_POST['id'];

      //print_r($object);
      $object->Excluir();

      header("Location:ViewEventosObj.php");
   }

   else if (isset($_POST['atualizar']))
   {
      $object             = new Eventos();
      $object->id         = $_POST['id'];
      $object->evento     = $_POST['evento'];
      $object->dataInicio = $_POST['dataInicio'];
      $object->dataFim    = $_POST['dataFim'];
      $object->horario    = $_POST['horario'];
      $object->categoria  = $_POST['categoria'];
      $object->texto      = $_POST['texto'];

      $object->Atualizar();

      if (!empty($_FILES["imagem"]["name"]))
      {
        $myUpload = new Upload($_FILES["imagem"]);
        $Up       = $myUpload->eventoUploadUpdate($_POST['id']);
      }

      header("Location:ViewEventosObj.php");
   }
?>
