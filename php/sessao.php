<?php

session_start();

if(empty($_SESSION['email']) && empty($_SESSION['senha']) && empty($_SESSION['tipo']) && empty($_SESSION['nome']) && empty($_SESSION['id']))
{
   header('Location:../login.php');
   exit;
}

?>
