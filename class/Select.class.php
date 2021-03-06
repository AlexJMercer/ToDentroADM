<?php

  include_once 'Carrega.class.php';
/**
 *
 */
class Select
{
    public $id;
    public $semestre;
    public $dia;
    public $alimento;
    public $status;
    public $estagio;
    public $noticia;
    public $monitoria;
    public $evento;
    public $total;
    public $bd;

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

    public function semestreSelect($semestre="")
    {
      $sql    = "SELECT * from semestre Order by id_sem";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
         $this->id       = $a['id_sem'];
         $this->semestre = $a['semestre'];

         if ($semestre==$this->id)
         {
           print "<option selected value='{$this->id}'>{$this->semestre}</option>";
         }
         else
         {
           print "<option value='{$this->id}'>{$this->semestre}</option>";
         }
       }
      }
    }

    public function localSelect($sala="")
    {
      $sql    = "SELECT * FROM local ORDER BY id_lo";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
          $object       = new Local();
          $object->id   = $a['id_lo'];
          $object->sala = $a['sala'];

         if ($sala==$object->id)
         {
           print "<option selected value='{$object->id}'>{$object->sala}</option>";
         }
         else
         {
           print "<option value='{$object->id}'>{$object->sala}</option>";
         }
       }
     }
    }

    public function diaSelect($dia="")
    {
      $sql    = "SELECT * from dia Order by id_dia";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
          $this->id  = $a['id_dia'];
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

    public function alimentoSelectOFF($alimento="")
    {
      $sql    = "SELECT * from alimentos Order by id_ali";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
       echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
          $this->id       = $a['id_ali'];
          $this->alimento = $a['alimento'];

            if ($alimento==$this->id)
            {
              print "<option selected value='{$this->id}'>{$this->alimento}</option>";
            }
            else
            {
              print "<option value='{$this->id}'>{$this->alimento}</option>";
            }
        }
      }
    }

    public function cursoSelect($curso="")
    {
        $sql    = "SELECT * from cursos c WHERE c.inst_id=1 Order by id_curso";
        $result = pg_query($sql);
        $ln     = pg_num_rows($result);

        if ($ln==0)
        {
          echo "<option value=''>Nada Encontrado!!</option>";
        }
        else
        {

          while ($a = pg_fetch_array($result))
          {
            $this->id    = $a['id_curso'];
            $this->curso = $a['nome'];

            if ($curso==$this->id)
            {
              print "<option selected value='{$this->id}'>{$this->curso}</option>";
            }
            else
            {
              print "<option value='{$this->id}'>{$this->curso}</option>";
            }
          }
        }
    }

    public function cursoGeneralSelect($curso="")
    {
        $sql    = "SELECT * from cursos c Order by id_curso";
        $result = pg_query($sql);
        $ln     = pg_num_rows($result);

        if ($ln==0)
        {
          echo "<option value=''>Nada Encontrado!!</option>";
        }
        else
        {

          while ($a = pg_fetch_array($result))
          {
            $this->id    = $a['id_curso'];
            $this->curso = $a['nome'];

            if ($curso==$this->id)
            {
              print "<option selected value='{$this->id}'>{$this->curso}</option>";
            }
            else
            {
              print "<option value='{$this->id}'>{$this->curso}</option>";
            }
          }
        }
    }

    public function categoriaSelect($categoria='')
    {
      $sql    = "SELECT * from categorias Order by id_cat";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {

        while ($a = pg_fetch_array($result))
        {
          $this->id        = $a['id_cat'];
          $this->categoria = $a['categoria'];

          if ($categoria==$this->id)
          {
            print "<option selected value='{$this->id}'>{$this->categoria}</option>";
          }
          else
          {
            print "<option value='{$this->id}'>{$this->categoria}</option>";
          }
        }
      }
    }

    public function statusSelect($status="")
    {
      $sql    = "SELECT * FROM status Order by id_sta";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
          $this->id     = $a['id_sta'];
          $this->status = $a['status'];

          if ($status==$this->id)
          {
            print "<option selected value='{$this->id}'>{$this->status}</option>";
          }
          else
          {
            print "<option value='{$this->id}'>{$this->status}</option>";
          }
        }
      }
    }

    public function alimentoSelect($alimento ="")
    {
       $sql    = "SELECT * FROM alimentos";
       $result = pg_query($sql);
       $ln     = pg_num_rows($result);

       if ($ln==0)
       {
          echo "<option value=''>Nada Encontrado!!</option>";
       }
       else
       {
          while ($a = pg_fetch_array($result))
          {
            $object           = new Alimentos();
            $object->id       = $a['id_ali'];
            $object->alimento = $a['alimento'];

            if (is_array($alimento))
            {
              if(in_array($object->id, $alimento))
              {
                 print "<option selected value='{$object->id}'>{$object->alimento}</option>";
              }
              else
              {
                 print "<option value='{$object->id}'>{$object->alimento}</option>";
              }
            }
            else
            {
              if($object->id==$alimento)
              {
                 print "<option selected value='{$object->id}'>{$object->alimento}</option>";
              }
              else
              {
                 print "<option value='{$object->id}'>{$object->alimento}</option>";
              }
            }
          }
        }
      }

    public function categoriaMultiSelected($categoria ="")
    {
         $sql    = "SELECT * FROM categorias ORDER BY categoria";
         $result = pg_query($sql);
         $ln     = pg_num_rows($result);

         if ($ln==0)
         {
            echo "<option value=''>Nada Encontrado!!</option>";
         }
         else
         {
            while ($a = pg_fetch_assoc($result))
            {
              $object            = new Categorias();
              $object->id        = $a['id_cat'];
              $object->categoria = $a['categoria'];

              if (is_array($categoria))
              {
                if(in_array($object->id, $categoria))
                {
                   print "<option selected value='{$object->id}'>{$object->categoria}</option>";
                }
                else
                {
                   print "<option value='{$object->id}'>{$object->categoria}</option>";
                }
              }
              else
              {
                if($object->id == $categoria)
                {
                   print "<option selected value='{$object->id}'>{$object->categoria}</option>";
                }
                else
                {
                   print "<option value='{$object->id}'>{$object->categoria}</option>";
                }
              }
            }
          }
      }

   public function eventoSelect($evento='')
   {
      $sql    = "SELECT * FROM eventos ORDER BY id_event";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
         echo "<option value=''> Nada encontrado!! </option>";
      }
      else
      {
         while ($a  = pg_fetch_array($result))
         {
            $object         = new Eventos();
            $object->id     = $a['id_event'];
            $object->evento = $a['evento'];

            if ($evento==$object->id)
            {
               print "<option selected value='{$object->id}'>{$object->evento}</option>";
            }
            else
            {
               print "<option value='{$object->id}'>{$object->evento}</option>";
            }
         }
      }
   }

   public function institutoSelect($id ="")
   {
      $sql    = "SELECT * FROM instituto ORDER BY id_inst";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

     if ($ln==0)
     {
        echo "<option value=''>Nada Encontrado!!</option>";
     }
     else
     {
       while ($a = pg_fetch_array($result))
       {
         $object            = new Instituto();
         $object->id        = $a['id_inst'];
         $object->instituto = $a['instituto'];

         if ($id==$object->id)
         {
           print "<option selected value='{$object->id}'>{$object->instituto}</option>";
         }
         else
         {
           print "<option value='{$object->id}'>{$object->instituto}</option>";
         }
       }
     }
   }

   public function cursoGeneralMultiSelect($curso='')
   {
      $sql    = "SELECT * FROM cursos Order By nome";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
         echo "<option value=''>Nada encontrado!!</option>";
      }
      else
      {
         while ($reg = pg_fetch_assoc($result))
         {
            $object       = new Cursos();
            $object->id   = $reg['id_curso'];
            $object->nome = $reg['nome'];

            if (in_array($object->id, $curso))
            {
               echo "<option selected value='{$object->id}'>{$object->nome}</option>";
            }
            else
            {
               echo "<option value='{$object->id}'>{$object->nome}</option>";
            }
         }
      }
   }

   public function labelCategorias($categoria = "")
   {
     $sql    = "SELECT * FROM categorias";
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
          $object            = new Categorias();
          $object->id        = $a['id_cat'];
          $object->categoria = $a['categoria'];

          if (is_array($categoria))
          {
            if(in_array($object->id, $categoria))
            {
              print "<small class='label bg-blue'>{$object->categoria}</small>  ";
            }
          }
          else
          {
            if($object->id==$categoria)
            {
               print "<small class='label bg-blue'>{$object->categoria}</small>  ";
            }
          }
        }
      }
   }

   public function labelInstituto($instituto = "")
   {
     $sql    = "SELECT * FROM instituto i WHERE i.id_inst=$instituto";
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
          $object            = new Instituto();
          $object->id        = $a['id_inst'];
          $object->instituto = $a['instituto'];

          if($object->id==$instituto)
          {
            print "<small class='label bg-blue'>{$object->instituto}</small>  ";
          }
        }
      }
   }

   public function labelCursos($cursos = "")
   {
      $sql    = "SELECT id_curso, nome FROM cursos ORDER BY nome";
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
            $object       = new Cursos();
            $object->id   = $a['id_curso'];
            $object->nome = $a['nome'];

            if (is_array($cursos))
            {
               if(in_array($object->id, $cursos))
               {
                  print "<small class='label bg-blue'>{$object->nome}</small>  ";
               }
            }
            else
            {
               if($object->id==$cursos)
               {
                  print "<small class='label bg-blue'>{$object->nome}</small>  ";
               }
            }
         }
      }
   }

   public function typeSelect($type="")
   {
      $sql    = "SELECT * FROM usertype ORDER BY id_type";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
          $this->id   = $a['id_type'];
          $this->type = $a['type'];

          if ($type==$this->id)
          {
            print "<option selected value='{$this->id}'>{$this->type}</option>";
          }
          else
          {
            print "<option value='{$this->id}'>{$this->type}</option>";
          }
        }
      }
   }

   public function diaSelectS($dia='')
   {
     $sql_card = "SELECT c.dia FROM cardapios";
     $result_card = pg_query($sql_card);
     $return_card = null;

     while ($teste = pg_fetch_assoc($result_card))
     {
       # code...
     }

     $sql    = "SELECT * FROM dia ORDER BY id_dia";
     $result = pg_query($sql);
     $ln     = pg_num_rows($result);

     if ($ln==0)
     {
       echo "<option value=''>Nada Encontrado!!</option>";
     }
     else
     {
       while ($a = pg_fetch_array($result))
       {
         $this->id  = $a['id_dia'];
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

   public function labelStatus($status = '')
   {
      if ($status==1)
      {
        echo "<small class='label bg-maroon-active'>Sob Avaliação!</small>";
      }
      if ($status==2)
      {
        echo "<small class='label bg-yellow'>Rejeitado!</small>";
      }
      if ($status==3)
      {
        echo "<small class='label bg-green'>Publicado!</small>";
      }
      if ($status==4)
      {
        echo "<small class='label bg-aqua'>Publicado e editado!</small>";
      }
   }

   public function userType($type = '')
   {
      if ($type==1)
      {
        echo "<h6><i class='fa fa-circle text-yellow'></i> Autor </h6>";
      }
      if ($type==2)
      {
        echo "<h6><i class='fa fa-circle text-maroon'></i> Editor </h6>";
      }
      if ($type==3)
      {
        echo "<h6><i class='fa fa-circle text-teal'></i> Administrador </h6>";
      }
      if ($type==4)
      {
        echo "<h6><i class='fa fa-circle text-blue'></i> Revisor </h6>";
      }
   }

   public function labelType($type = '')
   {
      if ($type==1)
      {
        echo "<small class='label bg-yellow'>Autor</small>";
      }
      if ($type==2)
      {
        echo "<small class='label bg-maroon'>Editor</small>";
      }
      if ($type==3)
      {
        echo "<small class='label bg-teal'>Administrador</small>";
      }
      if ($type==4)
      {
        echo "<small class='label bg-blue'>Revisor</small>";
      }
   }

   public function totalNoticias()
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

   public function totalCardapios()
   {
     $sql    = "SELECT * FROM cardapios";
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

   public function totalMonitorias()
   {
     $sql    = "SELECT * FROM monitorias";
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

   public function totalEstagios()
   {
     $sql    = "SELECT * FROM estagios";
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

   public function totalCursos()
   {
     $sql    = "SELECT * FROM cursos";
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

   public function totalLocais()
   {
     $sql    = "SELECT * FROM local";
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

   public function totalEventos()
   {
     $sql    = "SELECT * FROM eventos";
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

   public function totalCategorias()
   {
     $sql    = "SELECT * FROM categorias";
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

   public function totalAssistencias()
   {
     $sql    = "SELECT * FROM assistencias";
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

   public function totalSetores()
   {
     $sql    = "SELECT * FROM setores";
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

   public function totalUsuarios()
   {
     $sql    = "SELECT * FROM usuarios";
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

   public function ShowAvaliacao()
   {
     $sqlnot     = "SELECT n.status_id FROM noticias n WHERE n.status_id ='1'";
     $result_not = pg_query($sqlnot);
     $num_not    = pg_num_rows($result_not);

     $sqlevent     = "SELECT e.status_id FROM eventos e WHERE e.status_id ='1'";
     $result_event = pg_query($sqlevent);
     $num_event    = pg_num_rows($result_event);

     $sqlmonit     = "SELECT m.status_id FROM monitorias m WHERE m.status_id ='1'";
     $result_monit = pg_query($sqlmonit);
     $num_monit    = pg_num_rows($result_monit);

     $sqlestag     = "SELECT e.status_id FROM estagios e WHERE e.status_id ='1'";
     $result_estag = pg_query($sqlestag);
     $num_estag    = pg_num_rows($result_estag);

     $num = $num_estag+$num_not+$num_event+$num_monit;


     $object            = new Select();
     $object->noticia   = $num_not;
     $object->evento    = $num_event;
     $object->monitoria = $num_monit;
     $object->estagio   = $num_estag;
     $object->total     = $num;

     $return = $object;

     return $return;
   }

}
?>
