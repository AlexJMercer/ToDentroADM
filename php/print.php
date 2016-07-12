<?php

include_once "../class/Carrega.class.php";

session_start();

/*if(empty($_SESSION['email']) && empty($_SESSION['senha']) && empty($_SESSION['tipo_usuario']) && empty($_SESSION['nome']) && empty($_SESSION['id']))
{
   header('Location:../login.php');
   exit;
}*/

include 'testesession.php';



  if($_SESSION['tipo_usuario']==3)
  {
    echo "Administrador";
    print_r($_SESSION);
  }
  elseif($_SESSION['tipo_usuario']==2)
  {
    echo "<br>Editor<br>";
    print_r($_SESSION);

  }
  else
  {
    echo "Autor";
    print_r($_SESSION);
  }

  echo "<br>";


?>
