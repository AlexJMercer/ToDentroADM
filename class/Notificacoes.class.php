<?php

include_once 'Carrega.class.php';

  class Notificacoes
  {
    private $id;
    private $titulo;
    private $texto;
    private $notificacao;
    private $bd;

    function __construct()
    {
      $this->bd = new BD();
    }

    public function __destruct()
    {
       unset($this->bd);
    }

    public function __get($key)
    {
       return $this->$key;
    }

    public function __set($key, $value)
    {
       $this->$key = $value;
    }

    public function InserirNotificacoes()
    {
      $sql       = "INSERT INTO notificacoes (titulo_notif, texto_notif, notificar) VALUES ('$this->titulo', '$this->texto', '$this->notificacao')";
      $resultado = pg_query($sql);
      print_r($sql);
      print_r($resultado);
      if ($resultado)
      {
        return $resultado;
      }
    }

    public function ListarNotificacoes()
    {
      $sql       = "SELECT * FROM notificacoes ORDER BY id_notif DESC";
      $resultado = pg_query($sql);
      $retorno   = null;

      while ($registro = pg_fetch_assoc($resultado))
      {
        $object              = new Notificacoes();
        $object->id          = $registro['id_notif'];
        $object->titulo      = $registro['titulo_notif'];
        $object->texto       = $registro['texto_notif'];
        $object->notificacao = $registro['notificar'];

        $retorno[] = $object;
      }
      return $retorno;
    }

    public function AtualizarNotificacoes()
    {
      $sql       = "UPDATE notificacoes SET titulo_notif ='$this->titulo', texto_notif = '$this->texto', notificar = '$this->notificacao' WHERE id_notif = $this->id";
      $resultado = pg_query($sql);
      if ($resultado)
      {
        return $resultado;
      }
    }

    public function ExcluirNotificacoes()
    {
      $sql       = "DELETE FROM notificacoes WHERE id_notif = $this->id";
      $resultado = pg_query($sql);
      if ($resultado)
      {
        return $resultado;
      }
    }

    public function EditarNotificacoes($id='')
    {
      $sql       = "SELECT * FROM notificacoes WHERE id_notif = $id";
      $resultado = pg_query($sql);
      $retorno   = null;

      while ($registro = pg_fetch_assoc($resultado))
      {
        $object              = new Notificacoes();
        $object->id          = $registro['id_notif'];
        $object->titulo      = $registro['titulo_notif'];
        $object->texto       = $registro['texto_notif'];
        $object->notificacao = $registro['notificar'];

        $retorno = $object;
      }
      return $retorno;
    }

  }

?>
