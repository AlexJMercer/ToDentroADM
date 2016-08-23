<?php
session_start();
include_once "../../class/Carrega.class.php";


if (isset($_POST['enviar']))
{
    $object        = new Usuarios();
    $object->nome  = $_POST['nome'];
    $object->email = $_POST['email'];
    $object->senha = $_POST['senha'];
    $object->tipo  = $_POST['tipo'];

    $object->InserirUsuarios();

    if ($object->tipo==2)
    {
      $_SESSION['novo_usuario'] = $object->email;
      header("Location:UsersPermissionsObj.php");
    }
    else
    {
      header("Location:ViewUsersObj.php");
    }
}
elseif (isset($_POST['atualizar']))
{
  $object        = new Usuarios();
  $object->id    = $_POST['id'];
  $object->nome  = $_POST['nome'];
  $object->email = $_POST['email'];
  $object->tipo  = $_POST['tipo'];

  if (!empty($_POST['senha']))
  {
    $object->senha = $_POST['senha'];
  }
  else
  {
    $object->senha = $_POST['senha_old'];
  }

  $object->AtualizarUsuarios();
  header("Location:ViewUsersObj.php");
}

?>
