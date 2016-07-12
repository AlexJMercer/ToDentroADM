<?php
session_start();

if(empty($_SESSION['email']) && empty($_SESSION['senha']) && empty($_SESSION['nome']))
{
   header('Location:login.php');
   exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Teste de permissoes</title>
  </head>
  <body>
    <h1>Teste com permissoes</h1>
  <?php
    if ($_SESSION['nome']=="Administrador")
    {
      include 'link.html';
      include 'link2.html';
      include 'link3.html';
    }
    elseif ($_SESSION['nome']=="Mercer")
    {
      include 'link.html';
      include 'link2.html';
    }
    elseif ($_SESSION['nome']=="autor")
    {
      include 'link2.html';
    }
  ?>
  </body>
</html>
