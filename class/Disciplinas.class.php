<?php

  include_once 'Carrega.class.php';


  class Disciplinas
  {
    private $id;
    private $disciplina;
    private $curso;
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

    public function InserirDisciplinas()
    {
      $sql    = "INSERT INTO disciplinas (disciplina, curso) VALUES ('$this->disciplina', '$this->curso')";
      $return = pg_query($sql);
      return $return;
    }

    public function ListarEspecifyDisciplinas($curso="")
    {
      $sql    = "SELECT * FROM disciplinas as d, cursos as c WHERE d.curso =c.id_curso AND d.curso =$curso";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object             = new Disciplinas();
         $object->id         = $reg["id_disc"];
         $object->disciplina = $reg["disciplina"];

         $return[] = $object;
      }
      return $return;
    }

    public function ExcluirDisciplinas()
    {
      $sql    = "DELETE from disciplinas where id_disc =$this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function AtualizarDisciplinas()
    {
      $sql    = "UPDATE disciplinas SET disciplina ='$this->disciplina', curso ='$this->curso' WHERE id_disc =$this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function EditarDisciplinas($id = "")
    {
      $sql    = "SELECT * FROM disciplinas as d, cursos as c WHERE d.curso =c.id_curso AND d.id_disc =$id";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
         $object             = new Disciplinas();
         $object->id         = $reg["id_disc"];
         $object->disciplina = $reg["disciplina"];
         $object->curso      = $reg["curso"];

         $return = $object;
      }
      return $return;
    }

    public function ShowDisciplinas($id='')
    {
      $sql    = "SELECT * FROM disciplinas as d, cursos as c WHERE d.curso =c.id_curso AND d.id_disc =$id";
      $result = pg_query($sql);
      $return = null;

      while ($reg = pg_fetch_assoc($result))
      {
        $object             = new Disciplinas();
        $object->id         = $reg["id_disc"];
        $object->disciplina = $reg["disciplina"];
        $object->curso      = $reg["nome"];

        $return = $object;
      }
      return $return;
    }
}
?>
