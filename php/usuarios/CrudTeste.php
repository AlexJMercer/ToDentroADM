<?php

include_once '../../class/Carrega.class.php';

  if (isset($_POST['enviar']))
  {
    $object               = new Permissions();
    $object->usuario      = $_POST['usuario'];
    $object->noticias     = $_POST['noticias'];
    $object->cardapios    = $_POST['cardapios'];
    $object->cardapios    = $_POST['cardapios'];
    $object->cursos       = $_POST['cursos'];
    $object->monitorias   = $_POST['monitorias'];
    $object->estagios     = $_POST['estagios'];
    $object->eventos      = $_POST['eventos'];
    $object->categorias   = $_POST['categorias'];
    $object->locais       = $_POST['locais'];
    $object->assistencias = $_POST['assistencias'];
    $object->setores      = $_POST['setores'];

    $object->InserirPermissions();
  }
?>
