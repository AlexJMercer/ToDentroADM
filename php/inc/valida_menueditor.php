<?php

session_start();

$erro = null;

if ($_SESSION['perm_noticias'] != null)
{
  include '/editor/noticias.html';
}
else
{
  $valida_menu = $erro++;
}

if ($_SESSION['perm_cardapios'] != null)
{
  include '/editor/cardapios.html';
}
else
{
  $valida_menu = $erro++;
}

if ($_SESSION['perm_cursos'] != null)
{
  include '/editor/cursos.html';
}
else
{
  $valida_menu = $erro++;
}

if ($_SESSION['perm_monitorias'] != null)
{
  include '/editor/monitorias.html';
}
else
{
  $valida_menu = $erro++;
}

if ($_SESSION['perm_estagios'] != null)
{
  include '/editor/estagios.html';
}
else
{
  $valida_menu = $erro++;
}

if ($_SESSION['perm_eventos'] != null)
{
  include '/editor/eventos.html';
}
else
{
  $valida_menu = $erro++;
}

if ($_SESSION['perm_categorias'] != null)
{
  include '/editor/categorias.html';
}
else
{
  $valida_menu = $erro++;
}

if ($_SESSION['perm_locais'] != null)
{
  include '/editor/locais.html';
}
else
{
  $valida_menu = $erro++;
}

if ($_SESSION['perm_assistencias'] != null)
{
  include '/editor/assistencias.html';
}
else
{
  $valida_menu = $erro++;
}

if ($_SESSION['perm_setores'] != null)
{
  include '/editor/setores.html';
}
else
{
  $valida_menu = $erro++;
}

if($valida_menu==10)
{
  header("Location:../index/erro_permission.php");
  exit;
}
else
{
  unset($valida_menu);
}
?>
