<?php

include_once 'Carrega.class.php';

/**
 *
 */
class Noticias
{
   private $id;
   private $titulo;
   private $linha_apoio;
   private $noticia;
   private $categoria;
   private $status;
   private $data;
   private $hora;
   private $imagem;
   private $url;
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

      public function transacao($valor)
      {
         $sql = $valor;
         $retorno = pg_query($sql);
         return $retorno;
      }

      public function InserirNoticias()
      {
         $this->transacao("BEGIN");

         $sql    = "INSERT INTO noticias (autor, data, hora, titulo, linha_apoio, status_id, texto, url)
                    VALUES ('$this->autor', '$this->data', '$this->hora', '$this->titulo', '$this->linha_apoio', '$this->status', '$this->noticia', '$this->url')";
         $return = pg_query($sql);

           if($return)
           {
             $sql_id_not = "SELECT CURRVAL('noticias_id_not_seq')";
             $last       = pg_query($sql_id_not);
             $idnot      = pg_fetch_array($last);

             $this->id = $idnot[0];

             foreach ($this->categoria as $value)
             {
               $sql2    = "INSERT INTO categorias_noticias (not_id, cat_id) VALUES ('$this->id', '$value')";
               $return2 = pg_query($sql2);
             }

             if ($return2)
             {
              $this->transacao("COMMIT");
              return $return2;
             }
             else
             {
               $this->transacao("ROLLBACK");
             }
           }
           $this->transacao("ROLLBACK");
      }

      public function ListarNoticias()
      {
         $sql    = "SELECT n.id_not, n.titulo, n.data, n.status_id, s.id_sta FROM noticias n, status s WHERE n.status_id=s.id_sta ORDER BY id_not DESC";
         $result = pg_query($sql);

         while ($reg = pg_fetch_assoc($result))
         {
            $object         = new Noticias();
            $object->id     = $reg["id_not"];
            $object->titulo = $reg["titulo"];
            $object->data   = $reg["data"];
            $object->status = $reg["status_id"];

            $return[] = $object;
         }
         return $return;
      }

      public function ExcluirNoticias()
      {
         $sql    = "DELETE from noticias where id_not = $this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function AtualizarNoticias()
      {
        $this->transacao("BEGIN");

        $sql         = "UPDATE noticias set autor = '$this->autor',
                                      data        = '$this->data',
                                      hora        = '$this->hora',
                                      titulo      = '$this->titulo',
                                      linha_apoio = '$this->linha_apoio',
                                      status_id   = '$this->status',
                                      texto       = '$this->noticia',
                                      url         = '$this->url'
                                WHERE id_not      =  $this->id";
        $return = pg_query($sql);

          if($return)
          {
            $sql2    = "DELETE FROM categorias_noticias WHERE not_id = $this->id";
            $return2 = pg_query($sql2);

            if ($return2)
            {
              foreach ($this->categoria as $value)
              {
                $sql3    = "INSERT INTO categorias_noticias (not_id, cat_id) VALUES ('$this->id', '$value')";
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

      public function EditarNoticias($id='')
      {
         $sql    = "SELECT * FROM noticias n, status s, imagens_noticias ino, usuarios u, categorias_noticias cn
                     WHERE n.id_not = ino.noticia AND n.status_id = s.id_sta AND n.autor = u.id_user AND cn.not_id = n.id_not AND n.id_not = $id";
         $sql2   = "SELECT c.id_cat FROM categorias c, categorias_noticias cn WHERE cn.not_id = $id AND c.id_cat = cn.cat_id";

         $result  = pg_query($sql);
         $result2 = pg_query($sql2);
         $retorno = NULL;

         while ($reg = pg_fetch_assoc($result))
         {
            $object              = new Noticias();
            $object->id          = $reg['id_not'];
            $object->autor       = $reg['id_user'];
            $object->titulo      = $reg['titulo'];
            $object->linha_apoio = $reg['linha_apoio'];
            $object->status      = $reg['id_sta'];
            $object->texto       = $reg['texto'];
            $object->url         = $reg['url'];
            $object->imagem      = $reg['imagem'];

            foreach (pg_fetch_assoc($result2) as $value)
            {
              $temp[] = $value;
            }
            $object->categoria = $temp;

            $retorno = $object;
         }
         return $retorno;
      }

      public function noImageUp()
      {
        $noImage  = "../../dist/img/todentro_logo.png";
        $sqlNot   = "SELECT CURRVAL('noticias_id_not_seq')";
        $last     = pg_query($sqlNot);
        $idnot    = pg_fetch_array($last);
        $this->id = $idnot[0];
        $sql      = "INSERT INTO imagens_noticias (imagem, noticia) VALUES ('$noImage', '$this->id')";
        $return   = pg_query($sql);
        return $return;
      }

      public function ShowNoticias($id="")
      {
        $sql     = "SELECT * FROM noticias n, status s, imagens_noticias ino, usuarios u, categorias_noticias cn
                    WHERE n.id_not = ino.noticia AND n.status_id = s.id_sta AND n.autor = u.id_user AND cn.not_id = n.id_not AND n.id_not = $id";
        $sql2    = "SELECT c.id_cat FROM categorias c, categorias_noticias cn WHERE cn.not_id = $id AND c.id_cat = cn.cat_id";
        $result  = pg_query($sql);
        $result2 = pg_query($sql2);
        $retorno = NULL;

        while ($reg = pg_fetch_assoc($result))
        {
           $object              = new Noticias();
           $object->id          = $reg['id_not'];
           $object->autor       = $reg['nome'];
           $object->titulo      = $reg['titulo'];
           $object->linha_apoio = $reg['linha_apoio'];
           $object->status      = $reg['status'];
           $object->texto       = $reg['texto'];
           $object->url         = $reg['url'];
           $object->imagem      = $reg['imagem'];
           $object->data        = $reg['data'];
           $object->hora        = $reg['hora'];

           foreach (pg_fetch_assoc($result2) as $value)
           {
             $temp[] = $value;
           }

           $object->categoria = $temp;

           $retorno = $object;
        }
        return $retorno;
      }

      public function numNoticias()
      {
        $sql    = "SELECT * FROM noticias";
        $result = pg_query($sql);
        $num    = pg_num_rows($result);

        if ($num!=0)
        {
          $total = $num;
          return $total;
        }
        else
        {
          $total = 0;
          return $total;
        }
      }
}
?>
