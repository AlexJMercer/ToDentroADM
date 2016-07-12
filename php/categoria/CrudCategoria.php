<?php

include_once "../../class/Carrega.class.php";

  if (isset($_POST['enviar']) && !empty($_POST['categoria']))
  {
      $object            = new Categorias();
      $object->categoria = $_POST['categoria'];

      if ($object->InserirCategorias())
      {
        header("Location:ViewCategoriasObj.php?success=1");
      }
      else
      {
        header("Location:ViewCategoriasObj.php?erro=1");
      }

  }

  else if (isset($_POST['excluir']))
  {
      $object     = new Categorias();
      $object->id = $_POST['id'];

      $object->ExcluirCategorias();

      header("Location:ViewCategoriasObj.php?success=1");
  }

  else if (isset($_POST['atualizar']) && !empty($_POST['categoria']))
  {
      $object            = new Categorias();
      $object->id        = $_POST['id'];
      $object->categoria = $_POST['categoria'];

      $object->AtualizarCategorias();

      header("Location:ViewCategoriasObj.php");
  }
?>
