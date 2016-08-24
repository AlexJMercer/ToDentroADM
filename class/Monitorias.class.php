<?php
include_once 'Carrega.class.php';
/**
 *
 */
 class Monitorias
 {

   private $id;
   private $sala;
   private $disciplina;
   private $info;
   private $curso;
   private $semestre;
   private $status;
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

   public function InserirMonitorias()
   {
      $sql    = "INSERT INTO monitorias (curso_m, disciplina_m, status_id, semestre_m, sala_m, info_m) VALUES ('$this->curso', '$this->disciplina', '$this->status', '$this->semestre', '$this->sala', '$this->info')";
      $return = pg_query($sql);
      return $return;
   }

   public function ListarMonitoriasEspecify($curso="")
   {
      $sql    = "SELECT * FROM monitorias as m, disciplinas as d, cursos as c WHERE m.curso_m =c.id_curso AND m.disciplina_m =d.id_disc AND m.curso_m =$curso";
      $result = pg_query($sql);

     while ($reg = pg_fetch_assoc($result))
     {
        $object             = new Monitorias();
        $object->id         = $reg["id_monit"];
        $object->disciplina = $reg["disciplina"];
        $object->status     = $reg["status_id"];

        $return[] = $object;
     }
      return $return;
   }

   public function ExcluirMonitorias()
   {
     $sql    = "DELETE FROM monitorias WHERE id_monit =$this->id";
     $return = pg_query($sql);
     return $return;
   }

   public function AtualizarMonitorias()
   {
       $sql    = "UPDATE monitorias SET semestre_m ='$this->semestre', sala_m ='$this->sala', info_m ='$this->info', status_id='$this->status' WHERE id_monit =$this->id";
       $return = pg_query($sql);
       return $return;
   }

   public function EditarMonitorias($id="")
   {
    $sql    = "SELECT * FROM monitorias as m, disciplinas as d, cursos as c WHERE m.curso_m =c.id_curso AND m.disciplina_m =d.id_disc AND m.id_monit =$id";
    $result = pg_query($sql);
    $return = null;

    while ($reg = pg_fetch_assoc($result))
    {
      $object             = new Monitorias();
      $object->id         = $reg["id_monit"];
      $object->curso      = $reg["nome"];
      $object->disciplina = $reg["disciplina"];
      $object->semestre   = $reg["semestre_m"];
      $object->status     = $reg["status_id"];
      $object->sala       = $reg["sala_m"];
      $object->info       = $reg["info_m"];

      $return = $object;
    }
    return $return;
  }

  public function ShowMonitorias($id='')
  {
    $sql    = "SELECT * FROM monitorias as m, disciplinas as d, cursos as c, local as l, semestre as s WHERE m.curso_m =c.id_curso AND m.disciplina_m =d.id_disc AND s.id_sem =m.semestre_m AND l.id_lo =m.sala_m AND m.id_monit =$id";
    $result = pg_query($sql);
    $return = null;

    while ($reg = pg_fetch_assoc($result))
    {
      $object             = new Monitorias();
      $object->id         = $reg['id_monit'];
      $object->curso      = $reg['nome'];
      $object->disciplina = $reg['disciplina'];
      $object->semestre   = $reg['semestre'];
      $object->status     = $reg['status_id'];
      $object->sala       = $reg['sala'];
      $object->info       = $reg['info_m'];

      $return = $object;
    }
    return $return;
  }
}
?>
