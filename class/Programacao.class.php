<?php
/**
 *
 */

include_once 'Carrega.class.php';

  class Programacao
  {
    private $id;
    private $evento;
    private $dataInicio;
    private $dataFim;
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

    public function Inserir()
    {
      $sql    = "INSERT INTO programacao (evento_id, datainicio, datafim) VALUES ('$this->evento', '$this->dataInicio', '$this->dataFim')";
      $return = pg_query($sql);
      return $return;
    }

    public function Listar()
    {
      $sql    = "SELECT p.id_prog, p.evento_id, p.datainicio, e.id_event, e.evento FROM programacao p, eventos e WHERE p.evento_id=e.id_event";
      $result = pg_query($sql);
      $return = null;

      while ($reg=pg_fetch_assoc($result))
      {
        $object             = new Programacao();
        $object->id         = $reg["id_prog"];
        $object->evento     = $reg["evento"];
        $object->dataInicio = $reg["datainicio"];

        $return[] = $object;
      }
      return $return;
    }

    public function Atualizar()
    {
      $return = false;
      $sql = "UPDATE
                set ,

                where ";

      $return = pg_query($sql);

      return $return;
    }

    public function Excluir($id='')
    {
      $sql = "DELETE from programacao where id_prog = $id";
      $return = pg_query($sql);
      return $return;
    }

    public function Editar($value='')
    {
      $sql = "";
      $result = pg_query($sql);
      $return = null;

      while ($reg=pg_fetch_assoc($result))
      {
        $object = new Disciplinas();
        $object->id = $reg[""];
        $object->nome = $reg[""];
        $object->texto = $reg[""];


        $return[] = $object;
      }
      return $return;
    }

  }

?>
