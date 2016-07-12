<?php

if(empty($_SESSION['email']) && empty($_SESSION['senha']) && empty($_SESSION['tipo_usuario']) && empty($_SESSION['nome']) && empty($_SESSION['id']))
{
   header('Location:login_page.php?notlogged');
   exit;
}

?>
