<?php
include_once 'Carrega.class.php';
/**
 *
 */
class Local
{
  private $id;
  private $sala;
  private $bd;

    public function __construct()
    {
      $this->bd = new BD();
    }

    public function __destruct()
    {
      unset($this->bd);
    }

    function __get($key)
    {
      return $this->$key;
    }

    function __set($key, $value)
    {
      $this->$key = $value;
    }

    public function InserirLocal()
    {
      $sql    = "INSERT INTO local (sala) VALUES ('$this->sala')";
      $return = pg_query($sql);
      return $return;
    }

    public function ListarLocal()
    {
      $sql    = "SELECT * FROM local";
      $result = pg_query($sql);

      while ($reg = pg_fetch_assoc($result))
      {
        $obj       = new Local();
        $obj->id   = $reg["id_lo"];
        $obj->sala = $reg["sala"];

        $return[] = $obj;
      }
      return $return;
    }

    public function EditarLocal($id = "")
    {
      $sql    = "SELECT * FROM local AS l WHERE l.id_lo =$id";
      $result = pg_query($sql);

      while ($reg = pg_fetch_assoc($result))
      {
        $obj       = new Local();
        $obj->id   = $reg["id_lo"];
        $obj->sala = $reg["sala"];

        $return = $obj;
      }
      return $return;
    }

    public function ExcluirLocal()
    {
      $sql    = "DELETE FROM local WHERE id_lo =$this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function AtualizarLocal()
    {
        $sql    = "UPDATE local set sala = '$this->sala' WHERE id_lo = '$this->id'";
        $return = pg_query($sql);
        return $return;
    }

    public function salaSelect($id ="")
    {
       $sql    = "SELECT * from local Order by id_lo";
       $result = pg_query($sql);
       $ln     =pg_num_rows($result);

      if ($ln==0)
      {
         echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {

        while ($a = pg_fetch_array($result))
        {

          $this->id = $a['id_lo'];
          $this->sala = $a['sala'];

          if ($id==$this->id)
          {
            print "<option selected value='{$this->id}'>{$this->sala}</option>";
          }
          else
          {
            print "<option value='{$this->id}'>{$this->sala}</option>";
          }
        }
      }
    }


}
?>
