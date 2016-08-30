<?php

include_once "Carrega.class.php";

  class Cardapios
  {
    private $id;
    private $dia;
    private $data;
    private $alimento;
    private $bd;

      public function __construct()
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

      public function transacao($valor)
      {
         $sql     = $valor;
         $retorno = pg_query($sql);
         return $retorno;
      }

      public function InserirCardapios()
      {

        $this->transacao("BEGIN");

        $sql    = "INSERT INTO cardapios (dia, data) VALUES ('$this->dia', '$this->data')";
        $return = pg_query($sql);

          if($return)
          {
            $sql_id_card = "SELECT CURRVAL('cardapios_id_card_seq')";
            $last        = pg_query($sql_id_card);
            $idcard      = pg_fetch_array($last);

            $this->id    = $idcard[0];

            foreach ($this->alimento as $value)
            {
              $sql2    = "INSERT INTO alimentos_cardapios (card_id, ali_id) VALUES ('$this->id', '$value')";
              $return2 = pg_query($sql2);
            }
            if ($return2)
            {
             $this->transacao("COMMIT");
            }
            else
            {
              $this->transacao("ROLLBACK");
            }
          }
          $this->transacao("ROLLBACK");
      }

      public function AtualizarCardapios()
      {
           $this->transacao("BEGIN");

           $sql         = "UPDATE cardapios SET data = '$this->data',
                                    WHERE id_card    =  $this->id";
           $return = pg_query($sql);

          if($return)
          {
            $sql2    = "DELETE FROM alimentos_cardapios WHERE card_id = $this->id";
            $return2 = pg_query($sql2);

            if ($return2)
            {
              foreach ($this->alimento as $value)
              {
                $sql3    = "INSERT INTO alimentos_cardapios (card_id, ali_id) VALUES ('$this->id', '$value')";
                $return3 = pg_query($sql3);
              }
              if ($return3)
              {
                $this->transacao("COMMIT");
              }
              else
              {
                $this->transacao("ROLLBACK");
              }
            }
          }
          else
          {
            $this->transacao("ROLLBACK");
          }
          $this->transacao("ROLLBACK");
      }

      public function ListarCardapios()
      {
         $sql     = "SELECT * FROM cardapios c, dia d WHERE d.id_dia =c.dia ORDER BY d.id_dia";
         $result  = pg_query($sql);
         $retorno = null;

         while ($reg = pg_fetch_assoc($result))
         {
            $obj       = new Cardapios();
            $obj->id   = $reg["id_card"];
            $obj->dia  = $reg["dia"];
            $obj->data = $reg["data"];

            $retorno[] = $obj;
         }
        return $retorno;
      }

      public function ExcluirCardapios()
      {
         $sql     = "DELETE from cardapios where id_card = $this->id";
         $retorno = pg_query($sql);
         return $retorno;
      }

      public function EditarCardapios($id = "")
      {
        $sql     = "SELECT * FROM cardapios c JOIN dia d ON d.id_dia=c.dia JOIN alimentos_cardapios ac ON ac.card_id =c.id_card WHERE c.id_card =$id";
        $sql2    = "SELECT a.id_ali FROM alimentos a, alimentos_cardapios ac WHERE ac.card_id = $id AND a.id_ali = ac.ali_id";

        $result  = pg_query($sql);
        $result2 = pg_query($sql2);
        $retorno = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
           $obj       = new Cardapios();
           $obj->id   = $reg["id_card"];
           $obj->dia  = $reg["dia"];
           $obj->data = $reg["data"];

           foreach (pg_fetch_assoc($result2) as $value)
           {
              $temp[] = $value;
           }
           $obj->alimento = $temp;

           $retorno       = $obj;
        }
        return $retorno;
      }


      public function ShowCardapios($id = "")
      {
        $sql     = "SELECT * FROM cardapios c JOIN dia d ON d.id_dia=c.dia JOIN alimentos_cardapios ac ON ac.card_id =c.id_card WHERE c.id_card =$id";
        $sql2    = "SELECT a.id_ali FROM alimentos a, alimentos_cardapios ac WHERE ac.card_id = $id AND a.id_ali = ac.ali_id";
        $result  = pg_query($sql);
        $result2 = pg_query($sql2);
        $retorno = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
          $obj       = new Cardapios();
          $obj->id   = $reg["id_card"];
          $obj->dia  = $reg["dia"];
          $obj->data = $reg["data"];

          foreach (pg_fetch_assoc($result2) as $value)
          {
             $temp[] = $value;
          }
          $obj->alimento = $temp;

          $retorno = $obj;
          //print_r($obj);
       }
       return $retorno;
      }
   }
?>
