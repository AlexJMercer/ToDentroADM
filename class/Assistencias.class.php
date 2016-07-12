<?php
/**
 *
 */

include_once 'Carrega.class.php';

  class Assistencias
  {
    private $id;
    private $assist;
    private $texto;
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

    public function InserirAssistencias()
    {
      $sql    = "INSERT INTO assistencias (assist, texto) VALUES ('$this->assist', '$this->texto')";
      $return = pg_query($sql);

      if ($return)
      {
        echo "<script> alert('Assistência estudantil cadastrada com sucesso!');</script>";
      }
      else
      {
        echo "<script> alert('Erro ao tentar cadastrar!');</script>";
      }
    }

    public function ListarAssistencias()
    {
      $sql    = "SELECT * FROM assistencias ORDER BY id_assist";
      $result = pg_query($sql);

      while ($reg    = pg_fetch_assoc($result))
      {
        $obj         = new Assistencias();
        $obj->id     = $reg['id_assist'];
        $obj->assist = $reg['assist'];
        $obj->texto  = $reg['texto'];

        $retorno[]   = $obj;
      }
      return $retorno;
    }

    public function AtualizarAssistencias()
    {
        $sql     = "UPDATE assistencias set assist ='$this->assist', texto ='$this->texto' where id_assist =$this->id";
        $retorno = pg_query($sql);
        return $retorno;
    }

    public function ExcluirAssistencias()
    {
        $sql     = "DELETE from assistencias where id_assist =$this->id";
        $retorno = pg_query($sql);
        return $retorno;
    }

    public function EditarAssistencias($id='')
    {
      $sql    = "SELECT * FROM assistencias WHERE assistencias.id_assist=$id";
      $result = pg_query($sql);

      while ($reg = pg_fetch_assoc($result))
      {
        $obj         = new Assistencias();
        $obj->id     = $reg['id_assist'];
        $obj->assist = $reg['assist'];
        $obj->texto  = $reg['texto'];

        $retorno     = $obj;
      }
      return $retorno;
    }

  }
?>
