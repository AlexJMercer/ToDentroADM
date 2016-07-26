<?php

include_once '../../class/Carrega.class.php';

  if (isset($_POST['enviar']))
  {
    $object = new Permissions();
    $object->usuario = $_POST['usuario'];

    if (isset($_POST['noticias']))
    {
      $object->noticias = $_POST['noticias'];
    }
    elseif (!isset($_POST['noticias']))
    {
      $object->noticias = null;
    }

    if (isset($_POST['cardapios']))
    {
      $object->cardapios = $_POST['cardapios'];
    }
    elseif (!isset($_POST['cardapios']))
    {
      $object->cardapios = null;
    }

    if (isset($_POST['cursos']))
    {
      $object->cursos = $_POST['cursos'];
    }
    elseif(!isset($_POST['cursos']))
    {
      $object->cursos = null;
    }

    if (isset($_POST['monitorias']))
    {
      $object->monitorias = $_POST['monitorias'];
    }
    elseif(!isset($_POST['monitorias']))
    {
      $object->monitorias = null;
    }

    if (isset($_POST['estagios']))
    {
      $object->estagios = $_POST['estagios'];
    }
    elseif(!isset($_POST['estagios']))
    {
      $object->estagios = null;
    }

    if (isset($_POST['eventos']))
    {
      $object->eventos = $_POST['eventos'];
    }
    elseif(!isset($_POST['eventos']))
    {
      $object->eventos = null;
    }

    if (isset($_POST['categorias']))
    {
      $object->categorias = $_POST['categorias'];
    }
    elseif(!isset($_POST['categorias']))
    {
      $object->categorias = null;
    }

    if (isset($_POST['locais']))
    {
      $object->locais = $_POST['locais'];
    }
    elseif(!isset($_POST['locais']))
    {
      $object->locais = null;
    }

    if (isset($_POST['assistencias']))
    {
      $object->assistencias = $_POST['assistencias'];
    }
    elseif(!isset($_POST['assistencias']))
    {
      $object->assistencias = null;
    }

    if (isset($_POST['setores']))
    {
      $object->setores = $_POST['setores'];
    }
    elseif(!isset($_POST['setores']))
    {
      $object->setores = null;
    }

    //print_r($object);
    //var_dump($object);
    $object->InserirPermissions();
    header('Location:ViewUsersObj.php');
  }

  if (isset($_POST['editar']))
  {
    $object = new Permissions();
    $object->id = $_POST['id'];
    $object->usuario = $_POST['usuario'];

    if (isset($_POST['noticias']))
    {
      $object->noticias = $_POST['noticias'];
    }
    elseif (!isset($_POST['noticias']))
    {
      $object->noticias = null;
    }

    if (isset($_POST['cardapios']))
    {
      $object->cardapios = $_POST['cardapios'];
    }
    elseif (!isset($_POST['cardapios']))
    {
      $object->cardapios = null;
    }

    if (isset($_POST['cursos']))
    {
      $object->cursos = $_POST['cursos'];
    }
    elseif(!isset($_POST['cursos']))
    {
      $object->cursos = null;
    }

    if (isset($_POST['monitorias']))
    {
      $object->monitorias = $_POST['monitorias'];
    }
    elseif(!isset($_POST['monitorias']))
    {
      $object->monitorias = null;
    }

    if (isset($_POST['estagios']))
    {
      $object->estagios = $_POST['estagios'];
    }
    elseif(!isset($_POST['estagios']))
    {
      $object->estagios = null;
    }

    if (isset($_POST['eventos']))
    {
      $object->eventos = $_POST['eventos'];
    }
    elseif(!isset($_POST['eventos']))
    {
      $object->eventos = null;
    }

    if (isset($_POST['categorias']))
    {
      $object->categorias = $_POST['categorias'];
    }
    elseif(!isset($_POST['categorias']))
    {
      $object->categorias = null;
    }

    if (isset($_POST['locais']))
    {
      $object->locais = $_POST['locais'];
    }
    elseif(!isset($_POST['locais']))
    {
      $object->locais = null;
    }

    if (isset($_POST['assistencias']))
    {
      $object->assistencias = $_POST['assistencias'];
    }
    elseif(!isset($_POST['assistencias']))
    {
      $object->assistencias = null;
    }

    if (isset($_POST['setores']))
    {
      $object->setores = $_POST['setores'];
    }
    elseif(!isset($_POST['setores']))
    {
      $object->setores = null;
    }

    //print_r($object);
    //var_dump($object);
    $object->InserirPermissions();
    header('Location:ViewUsersObj.php');
  }
?>
