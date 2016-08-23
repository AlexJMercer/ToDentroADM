<?php

include_once "../../class/Carrega.class.php";

if (isset($_POST['entrar']) && !empty($_POST['login']) && !empty($_POST['senha']))
{
  $object = new Logar();
  $login = addslashes($_POST['login']);
  $senha = addslashes($_POST['senha']);

  //var_dump($login);
  //var_dump($senha);
  if ($object->Login($login, $senha))
  {
    header('Location:index.php');
    //echo "Ok";
    //return true;
  }
  else
  {
    //echo "Error";
    header('Location:../../?error');
    //return false;
  }
}
?>
