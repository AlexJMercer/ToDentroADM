<?php

ini_set('session.save_path', '../tmp');

session_start();
//include 'Upload.class.php';
include_once "../../class/Carrega.class.php";


   if (isset($_POST['enviar']))
   {
      $object              = new Noticias();
      $object->autor       = $_POST['autor'];
      $object->data        = $_POST['data'];
      $object->hora        = $_POST['hora'];
      $object->titulo      = $_POST['titulo'];
      $object->linha_apoio = $_POST['linha_apoio'];
      $object->status      = $_POST['status'];
      $object->categoria   = $_POST['categoria'];
      $object->noticia     = $_POST['noticia'];
      $object->url         = $_POST['url'];
      //print_r($object);
      if ($object->InserirNoticias())
      {
        if (!empty($_FILES["imagem"]["name"]))
        {
          $myUpload = new Upload($_FILES["imagem"]);
          //print_r($myUpload);
          $Up = $myUpload->noticiaUpload();
        }
        else
        {
          $noImage = new Noticias();
          $noImage->noImageUp();
        }
        if ($_SESSION['tipo_usuario']==3 || $_SESSION['tipo_usuario']==4)
        {
          header("Location:ViewNoticiasObj.php?success");
        }
        elseif ($_SESSION['tipo_usuario']==2)
        {
          header("Location:ViewMyNoticiasObj.php?success");
        }
        elseif($_SESSION['tipo_usuario']==1)
        {
          header("Location:../index/index.php?success");
        }
      }
      else
      {
        header("Location:NoticiaObj.php?erro");
      }
   }

   elseif (isset($_POST['excluir']))
   {
      $object     = new Noticias();
      $object->id = $_POST['id'];

      //print_r($object);
      $object->ExcluirNoticias();

      header("Location:ViewNoticiasObj.php?excluirOK");
   }

   elseif (isset($_POST['atualizar']))
   {
      $object              = new Noticias();
      $object->id          = $_POST['id'];
      $object->autor       = $_POST['autor'];
      $object->data        = $_POST['data'];
      $object->hora        = $_POST['hora'];
      $object->titulo      = $_POST['titulo'];
      $object->linha_apoio = $_POST['linha_apoio'];
      $object->status      = $_POST['status'];
      $object->categoria   = $_POST['categoria'];
      $object->noticia     = $_POST['noticia'];
      $object->url         = $_POST['url'];

      $object->AtualizarNoticias();

      $myUpload = new Upload($_FILES["imagem"]);

      $Up = $myUpload->noticiaUploadUpdate($_POST['id']);
      header("Location:ViewNoticiasObj.php");
   }

?>
