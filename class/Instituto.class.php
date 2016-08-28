<?php
include_once 'Carrega.class.php';
/**
 *
 */
class Instituto
{
  private $id;
  private $instituto;
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

    public function InserirInstituto()
    {
      $sql    = "INSERT INTO instituto (instituto) VALUES ('$this->instituto')";
      $return = pg_query($sql);
      return $return;
    }

    public function ListarInstituto()
    {
      $sql    = "SELECT * FROM instituto";
      $result = pg_query($sql);

      while ($reg = pg_fetch_assoc($result))
      {
        $obj       = new instituto();
        $obj->id   = $reg["id_inst"];
        $obj->instituto = $reg["instituto"];

        $return[] = $obj;
      }
      return $return;
    }

    public function EditarInstituto($id = "")
    {
      $sql    = "SELECT * FROM instituto AS i WHERE i.id_inst =$id";
      $result = pg_query($sql);

      while ($reg = pg_fetch_assoc($result))
      {
        $obj       = new instituto();
        $obj->id   = $reg["id_inst"];
        $obj->instituto = $reg["instituto"];

        $return = $obj;
      }
      return $return;
    }

    public function ExcluirInstituto()
    {
      $sql    = "DELETE FROM instituto WHERE id_inst =$this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function AtualizarInstituto()
    {
        $sql    = "UPDATE instituto set instituto = '$this->instituto' WHERE id_inst = '$this->id'";
        $return = pg_query($sql);
        return $return;
    }

    public function institutoSelect($id ="")
    {
       $sql    = "SELECT * from instituto Order by id_inst";
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

          $this->id        = $a['id_inst'];
          $this->instituto = $a['instituto'];

          if ($id==$this->id)
          {
            print "<option selected value='{$this->id}'>{$this->instituto}</option>";
          }
          else
          {
            print "<option value='{$this->id}'>{$this->instituto}</option>";
          }
        }
      }
    }


}
?>
