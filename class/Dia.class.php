<?php

  include_once 'Carrega.class.php';

   class Dia
   {
      private $id;
      private $dia;
      private $bd;
      private $tabel;

      function __construct()
      {
         $this->bd = new BD();
         $this->tabel = "dia";
      }

      function __destruct()
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

      function listar()
      {
         $sql = "SELECT * from this->tabel Order by id";
         $result = pg_query($sql);

         while ($reg = pg_fetch_assoc($result))
         {
            $obj = new Dia();
            $obj->id = $reg["id_dia"];
            $obj->dia = $reg["dia"];

            $retorno[] = $obj;
         }
         return $retorno;
      }

      public function diaSelect($dia ="")
      {
         $sql = "SELECT * from dia Order by id_dia";
         $result = pg_query($sql);

         $ln=pg_num_rows($result);

        if ($ln==0)
        {
           echo "<option value=''>Nada Encontrado!!</option>";
        }
        else
        {
          while ($a = pg_fetch_array($result))
          {
            $this->id = $a['id_dia'];
            $this->dia = $a['dia'];

            if ($dia==$this->id)
            {
              print "<option selected value='{$this->id}'>{$this->dia}</option>";
            }
            else
            {
              print "<option value='{$this->id}'>{$this->dia}</option>";
            }
          }
        }
      }
   }
?>
