<?php

  include_once 'Carrega.class.php';


  class Cursos
  {
    private $id;
    private $nome;
    private $texto;
    private $instituto;
    private $logo;
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

    public function InserirCursos()
    {
      $sql    = "INSERT INTO cursos (nome, inst_id, texto, logo) VALUES ('$this->nome', '$this->instituto', '$this->texto', '$this->logo')";
      $return = pg_query($sql);
      return $return;
    }

    public function ListarCursos()
    {
      $sql    = "SELECT * FROM cursos ORDER BY cursos.id_curso";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object            = new Cursos();
         $object->id        = $reg["id_curso"];
         $object->nome      = $reg["nome"];
         $object->instituto = $reg["inst_id"];

         $return[] = $object;
      }
      return $return;
    }

    public function ExcluirCursos()
    {
      $sql    = "DELETE from cursos where id_curso =$this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function AtualizarCursos()
    {
      $sql    = "UPDATE cursos set nome ='$this->nome', inst_id='$this->instituto', texto ='$this->texto' WHERE id_curso =$this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function EditarCursos($id = "")
    {
      $sql    = "SELECT * FROM cursos c WHERE c.id_curso =$id";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object            = new Cursos();
         $object->id        = $reg["id_curso"];
         $object->nome      = $reg["nome"];
         $object->instituto = $reg['inst_id'];
         $object->texto     = $reg["texto"];
         $object->logo      = $reg["logo"];

         $return = $object;
      }
      return $return;
    }

    public function ExibirCursos($id = "")
    {
      $sql    = "SELECT * FROM cursos c WHERE c.id_curso =$id";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object            = new Cursos();
         $object->id        = $reg["id_curso"];
         $object->nome      = $reg["nome"];
         $object->instituto = $reg['instituto'];
         $object->texto     = $reg["texto"];
         $object->logo      = $reg["logo"];

         $return = $object;
      }

      return $return;
    }

}
?>
