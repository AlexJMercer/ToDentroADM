<?php

ini_set('session.save_path', '../tmp');

session_start();

if(empty($_SESSION['email']) && empty($_SESSION['tipo_usuario']) && empty($_SESSION['nome']) && empty($_SESSION['id_user']))
{
   header('Location:../../?notlogged');
   exit;
}

?>
