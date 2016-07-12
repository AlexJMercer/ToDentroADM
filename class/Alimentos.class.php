<?php

  include_once 'Carrega.class.php';

   class Alimentos
   {
      private $id;
      private $alimento;
      private $bd;


      function __construct()
      {
         $this->bd = new BD();
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

      public function InserirAlimentos()
      {
        $sql    = "INSERT INTO alimentos (alimento) VALUES ('$this->alimento')";
        $return = pg_query($sql);

        return $return;
      }

      function ListarAlimentos()
      {
         $sql              = "SELECT * from alimentos Order by id_ali";
         $result           = pg_query($sql);

         while ($reg       = pg_fetch_assoc($result))
         {
            $obj           = new Alimentos();
            $obj->id       = $reg["id_ali"];
            $obj->alimento = $reg["alimento"];

            $return[]      = $obj;
         }
         return $return;
      }

      public function ExcluirAlimentos()
      {
         $sql    = "DELETE from alimentos where id_ali = $this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function AtualizarAlimentos()
      {

         $sql    = "UPDATE alimentos set alimento ='$this->alimento' where id_ali =$this->id";
         $return = pg_query($sql);

         return $return;
      }

      public function EditarAlimentos($id = "")
      {
        $sql    = "SELECT * FROM alimentos WHERE alimentos.id_ali =$id";
        $result = pg_query($sql);
        $return = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
           $obj           = new Alimentos();
           $obj->id       = $reg["id_ali"];
           $obj->alimento = $reg["alimento"];

           $return = $obj;
        }
        return $return;
      }

      public function labelAlimentos($alimento = "")
      {
        $sql    = "SELECT * from alimentos";
        $result = pg_query($sql);
        $ln     = pg_num_rows($result);

        if ($ln==0)
        {
           echo "<small class='label bg-red'>ERRO</small>";
        }
        else
        {
           while ($a = pg_fetch_assoc($result))
           {
             $this->id       = $a['id_ali'];
             $this->alimento = $a['alimento'];


            if(in_array($this->id, $alimento))
            {
              print "<small class='label btn-info'>{$this->alimento}</small>  ";
            }
           }
        }
      }
}
?>
