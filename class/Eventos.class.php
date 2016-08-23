<?php
/**
 *
 */

include_once 'Carrega.class.php';

  class Eventos
  {
    private $id;
    private $evento;
    private $categoria;
    private $texto;
    private $dataInicio;
    private $dataFim;
    private $horario;
    private $status;
    private $imagem;
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

    public function InserirEventos()
    {
      $sql    = "INSERT INTO eventos (evento, status_id, data_inicio, data_fim, horario, event_cat, texto)
                  VALUES ('$this->evento', '$this->status', '$this->dataInicio', '$this->dataFim', '$this->horario', '$this->categoria', '$this->texto')";
      $return = pg_query($sql);
      return $return;
    }

    public function ListarEventos()
    {
      $sql    = "SELECT id_event, evento, data_inicio FROM eventos ORDER BY data_inicio ASC";
      $result = pg_query($sql);
      $return = null;

      while ($reg=pg_fetch_assoc($result))
      {
        $object             = new Eventos();
        $object->id         = $reg["id_event"];
        $object->dataInicio = $reg["data_inicio"];
        $object->evento     = $reg["evento"];

        $return[] = $object;
      }
      return $return;
    }

    public function AtualizarEventos()
    {
      $return = false;
      $sql    = "UPDATE eventos SET evento = '$this->evento',
                                    status_id   ='$this->status',
                                    data_inicio = '$this->dataInicio',
                                    data_fim    = '$this->dataFim',
                                    horario     = '$this->horario',
                                    event_cat   = '$this->categoria',
                                    texto       = '$this->texto'
                              WHERE id_event = '$this->id'";
      $return = pg_query($sql);
      return $return;
    }

    public function ExcluirEventos()
    {
      $sql    = "DELETE FROM eventos WHERE id_event = $this->id ";
      $return = pg_query($sql);
      return $return;
    }

    public function EditarEventos($id='')
    {
      $sql    = "SELECT * FROM eventos WHERE id_event = $id";
      $result = pg_query($sql);
      $return = null;

      while ($reg=pg_fetch_assoc($result))
      {
        $object             = new Eventos();
        $object->id         = $reg["id_event"];
        $object->evento     = $reg['evento'];
        $object->categoria  = $reg['event_cat'];
        $object->dataInicio = $reg['data_inicio'];
        $object->dataFim    = $reg['data_fim'];
        $object->horario    = $reg['horario'];
        $object->status     = $reg["status_id"];
        $object->texto      = $reg['texto'];
        $object->imagem     = $reg['imagem'];

        $return = $object;

      }
      return $return;
    }

    public function noImageUp()
    {
      $noImage  = "../../dist/img/todentro_logo.png";
      $sqlEvent = "SELECT CURRVAL('eventos_id_event_seq')";
      $last     = pg_query($sqlEvent);
      $idevent  = pg_fetch_array($last);
      $this->id = $idevent[0];
      $sql      = "UPDATE eventos set imagem = '$noImage' WHERE id_event = $this->id";
      $return   = pg_query($sql);
      return $return;
    }
  }
?>
