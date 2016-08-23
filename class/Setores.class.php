<?php
/**
 *
 */
class Setores
{
  private $id;
  private $setor;
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

  public function InserirSetores()
  {
    $sql    = "INSERT INTO setores (setor, texto) VALUES ('$this->setor', '$this->texto')";
    $return = pg_query($sql);
    return $return;
  }

  public function ListarSetores()
  {
    $sql    = "SELECT * FROM setores ORDER BY id_set";
    $result = pg_query($sql);

    while($reg = pg_fetch_assoc($result))
    {
      $obj        = new Setores();
      $obj->id    = $reg['id_set'];
      $obj->setor = $reg['setor'];
      $obj->texto = $reg['texto'];

      $retorno[]  = $obj;
    }
    return $retorno;
  }

  public function ExcluirSetores()
  {
    $sql     = "DELETE FROM setores WHERE id_set = $this->id";
    $retorno = pg_query($sql);
    return $retorno;
  }

  public function AtualizarSetores()
  {
    $sql     = "UPDATE setores SET setor = '$this->setor', texto = '$this->texto' WHERE id_set = $this->id";
    $retorno = pg_query($sql);
    return $retorno;
  }

  public function EditarSetores($id='')
  {
    $sql    = "SELECT * FROM setores WHERE id_set =$id";
    $result = pg_query($sql);

    while($reg = pg_fetch_assoc($result))
    {
      $obj        = new Setores();
      $obj->id    = $reg['id_set'];
      $obj->setor = $reg['setor'];
      $obj->texto = $reg['texto'];

      $retorno    = $obj;
    }
    return $retorno;
  }

}
?>
