<?php

include_once "../../class/Carrega.class.php";

if (isset($_POST['logout']))
{
  $object = new Logar();
  $object->Logout();
  header('Location:login_page.php');
}

?>
