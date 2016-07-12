<?php

include_once "../../class/Carrega.class.php";

if (isset($_POST['entrar']) && !empty($_POST['login']) && !empty($_POST['senha']))
{
  $object = new Logar();

  if ($object->Login($_POST['login'], $_POST['senha']))
  {
    header('Location:index.php');
    //echo "Ok";
    //return true;
  }
  else
  {
    //echo "Error";
    header('Location:login_page.php?error');
    //return false;
  }
}
?>
