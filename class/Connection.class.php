<?php
/**
 *
 */
include_once 'Carrega.class.php';

  class Connection
  {
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

    function getAllCursos()
    {
      //Função Ok
      //Listas todos os cursos do Ifsul
      $sql       = "SELECT * FROM cursos c WHERE c.inst_id=1 Order by nome";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
         $object        = new Connection();
         $object->id    = $row['id_curso'];
         $object->curso = $row['nome'];
         array_push($resultado, array("Id"=>$object->id, "Nome do Curso"=>$object->curso));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function getCursoById($id)
    {
      //Função Ok
      //Exibe o curso de acordo com sua Id
      $sql       = "SELECT * FROM cursos c, instituto i WHERE c.inst_id =i.id_inst AND c.id_curso =$id";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
        $object            = new Cursos();
        $object->id        = $row["id_curso"];
        $object->nome      = $row["nome"];
        $object->instituto = $row['instituto'];
        $object->texto     = $row["texto"];
        $object->logo      = $row["logo"];

        array_push($resultado, array("id"=>$object->id, "Nome do Curso"=>$object->nome, "instituto"=>$object->instituto, "texto"=>$object->texto, "logo"=>$object->logo));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function getAllCardapiosByDay($id='')
    {
      //Função Ok
      //Esta função apenas realiza a consulta pelos dados referentes aos cardápios pela id do dia

      //$sql     = "SELECT * FROM cardapios c JOIN dia d ON d.id_dia=c.dia JOIN alimentos_cardapios ac ON ac.card_id =c.id_card";
      $sql     = "SELECT * FROM cardapios c, dia d, alimentos_cardapios ac WHERE d.id_dia=c.dia AND ac.card_id=c.id_card AND c.dia=$id";
      $sql2    = "SELECT a.alimento FROM alimentos a, cardapios c, alimentos_cardapios ac WHERE ac.card_id = c.id_card AND a.id_ali = ac.ali_id AND c.dia=$id";

      $res     = pg_query($sql);
      $res2    = pg_query($sql2);
      $retorno = null;

      while ($row = pg_fetch_assoc($res))
      {
         $obj       = new Cardapios();
         $obj->id   = $row["id_card"];
         $obj->dia  = $row["dia"];
         $obj->data = date('d/m/Y', strtotime($row["data"]));

         foreach (pg_fetch_assoc($res2) as $value)
         {
           $temp[] = $value;
         }
         $obj->alimento = $temp;

         //print_r($obj);
         $retorno = $obj;
         //array_push($resultado, array("id"=>$obj->id, "dia"=>$obj->dia, "data"=>$obj->data, "alimentos"=>$obj->alimento));
      }
      return $retorno;
     //echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function ShowAllCardapios($id='')
    {
      //Função Ok
      //Esta função utiliza os dados retornados pela função getAllCardapiosByDay
      //evitando a geração de multiplos registros de um mesmo cardapio
      $cardapios = new Connection();
      $showAll   = $cardapios->getAllCardapiosByDay($id);
      $resultado = array();
      if ($showAll != null)
      {
        $id        = $showAll->id;
        $dia       = $showAll->dia;
        $data      = $showAll->data;
        $alimentos = $showAll->alimento;

        array_push($resultado, array("id"=>$id, "dia"=>$dia, "data"=>$data, "alimentos"=>$alimentos));

        echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
      }
    }

    function getAllSetores()
    {
      //Função Ok
      $sql       = "SELECT * FROM setores";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
         $object        = new Setores();
         $object->id    = $row['id_set'];
         $object->setor = $row['setor'];
         $object->texto = $row['texto'];
         array_push($resultado, array("id"=>$object->id, "setor"=>$object->setor,"texto"=>$object->texto));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function getAllMonitoriasByCurso($id)
    {
      //Função Ok
      //Realiza uma listagem de todas as monitorias de acordo com a id do curso para melhor filtragem
      $sql       = "SELECT * FROM monitorias as m, disciplinas as d, cursos as c WHERE m.curso_m =c.id_curso AND m.disciplina_m =d.id_disc AND m.status_id IN ('3', '4') AND m.curso_m =$id";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
        $object             = new Monitorias();
        $object->id         = $row['id_monit'];
        $object->curso      = $row['nome'];
        $object->disciplina = $row['disciplina'];
        array_push($resultado, array("id"=>$object->id, "curso"=>$object->curso, "disciplina"=>$object->disciplina));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function getMonitoriaById($id)
    {
      //Função Ok
      // Exibe todas as informações da monitoria de acordo com sua id
      $sql    ="SELECT * FROM monitorias as m, disciplinas as d, cursos as c, local as l, semestre as s WHERE m.curso_m =c.id_curso AND m.disciplina_m =d.id_disc AND s.id_sem =m.semestre_m AND l.id_lo =m.sala_m AND m.id_monit =$id";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
         $object             = new Monitorias();
         $object->id         = $row["id_monit"];
         $object->curso      = $row['nome'];
         $object->disciplina = $row['disciplina'];
         $object->semestre   = $row['semestre'];
         $object->sala       = $row['sala'];
         $object->info       = $row['info_m'];
         array_push($resultado, array("id"=>$object->id, "curso"=>$object->curso, "disciplina"=>$object->disciplina, "semestre"=>$object->semestre, "sala"=>$object->sala, "info"=>$object->info));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function getAllCategorias()
    {
      //Função Ok
      //Realiza uma listagem de todas as categorias
      $sql       = "SELECT * FROM categorias";
      $res       = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_assoc($res))
      {
          $object            = new Categorias();
          $object->id        = $row['id_cat'];
          $object->categoria = $row['categoria'];
          array_push($resultado, array("id"=>$object->id, "categoria"=>$object->categoria));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function getProcessoSeletivo()
    {
      //Função OK
      $sql = "SELECT n.id_not, n.titulo, n.linha_apoio, n.data, cn.not_id, cn.cat_id, c.id_cat, c.categoria FROM noticias n, categorias_noticias cn, categorias c
              WHERE n.id_not=cn.not_id AND cn.cat_id=c.id_cat AND c.categoria='Processo Seletivo' AND n.status_id IN ('3', '4')";
      $res  = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
         $object              = new Noticias();
         $object->id          = $row['id_not'];
         $object->titulo      = $row['titulo'];
         $object->linha_apoio = $row['linha_apoio'];
         $object->data        = date('d/m/Y', strtotime($row['data']));
         array_push($resultado, array("id"=>$object->id, "Texto"=>$object->titulo, "linha_apoio"=>$object->linha_apoio, "Data"=>$object->data));
      }
       echo json_encode(array("result"=>$resultado), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    }

    function getAllNoticias()
    {
      //Função Ok
      //Realiza uma listagem geral das noticias
      $sql = "SELECT * FROM noticias n WHERE n.status_id IN ('3', '4')";
      $res = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
         $object              = new Noticias();
         $object->id          = $row['id_not'];
         $object->titulo      = $row['titulo'];
         $object->linha_apoio = $row['linha_apoio'];
         $object->data        = date('d/m/Y', strtotime($row['data']));
         array_push($resultado, array("id"=>$object->id, "Texto"=>$object->titulo, "linha_apoio"=>$object->linha_apoio, "Data"=>$object->data));
      }
       echo json_encode(array("result"=>$resultado), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    function searchAllNoticias($search)
    {
      //Função OK
      $sql = "SELECT * FROM noticias n WHERE n.titulo ILIKE '%$search%' AND n.status_id IN ('3', '4') ORDER BY n.id_not DESC";
      $res = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
         $object              = new Noticias();
         $object->id          = $row['id_not'];
         $object->titulo      = $row['titulo'];
         $object->linha_apoio = $row['linha_apoio'];
         $object->data        = date('d/m/Y', strtotime($row['data']));
         array_push($resultado, array("id"=>$object->id, "Texto"=>$object->titulo, "linha_apoio"=>$object->linha_apoio, "Data"=>$object->data));
      }
       echo json_encode(array("result"=>$resultado), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    function getObjNoticiaById($id)
    {
      //Função OK
      //Realiza a consulta pelos dados da noticia de acordo com a id da noticia
      $sql    = "SELECT * FROM noticias n, imagens_noticias ino, usuarios u, categorias_noticias cn, status s
                  WHERE n.id_not = ino.noticia AND n.autor = u.id_user AND cn.not_id = n.id_not AND n.id_not = $id AND s.id_sta = n.status_id";
      $sql2   = "SELECT c.categoria FROM categorias c, categorias_noticias cn WHERE cn.not_id = $id AND c.id_cat = cn.cat_id";
      $res  = pg_query($sql);
      $res2 = pg_query($sql2);
      //$resultado = array();
      $retorno = null;

      while($row = pg_fetch_assoc($res))
      {
        $object         = new Noticias();
        $object->autor  = $row['nome'];
        $object->texto  = $row['texto'];
        $object->imagem = $row['imagem'];
        $object->data   = $row['data'];
        $object->hora   = $row['hora'];
        $object->status = $row['status'];
        $object->url    = $row['url'];

        foreach (pg_fetch_assoc($res2) as $value)
        {
          $temp[] = $value;
        }
        $object->categoria = $temp;

        $retorno = $object;
      }
      return $retorno;
    }

    function ShowNoticiaById($id)
    {
      //Função Ok
      //Exibe a noticia sem problemas de exibição de multiplas categorias
      $noticia   = new Connection();
      $show      = $noticia->getObjNoticiaById($id);
      $resultado = array();
      if ($show != null)
      {
        $texto     = $show->texto;
        $autor     = $show->autor;
        $categoria = $show->categoria;
        $imagem    = $show->imagem;
        $data      = date('d/m/Y', strtotime($show->data));
        $hora      = date('H:i', strtotime($show->hora));
        $status = $show->status;
        $url       = $show->url;

        array_push($resultado, array("Imagem"=>$imagem, "hora"=>$hora, "data"=>$data, "Autor"=>$autor, "Categorias"=>$categoria, "Status"=>$status, "url"=>$url, "Texto"=>$texto));

        echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
      }
    }

    function getAllEstagios()
    {
      //Função OK
      $sql       = "SELECT * FROM estagios e WHERE e.status_id IN ('3', '4') ORDER BY id_est DESC";
      $res       = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
        $object         = new Estagios();
        $object->id     = $row['id_est'];
        $object->titulo = $row['titulo'];
        array_push($resultado,
        array('id'=>$object->id,'Titulo'=>$object->titulo));
      }
       echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    }

    function getEstagioById($id = '')
    {
      //Função OK
      //Realiza a consulta dos dados do estágio
      $sql1 = "SELECT * FROM estagios e, estagio_cursos ec WHERE e.id_est=ec.est_id AND e.id_est=$id";
      $sql2 = "SELECT c.nome FROM cursos c, estagio_cursos ec WHERE ec.est_id=$id AND c.id_curso=ec.curso_id";

      $res1 = pg_query($sql1);
      $res2 = pg_query($sql2);

      $retorno = null;

      while ($row = pg_fetch_assoc($res1))
      {
        $object             = new Estagios();
        $object->id         = $row['id_est'];
        $object->titulo     = $row['titulo'];
        $object->atividades = $row['atividades'];
        $object->salario    = $row['salario'];
        $object->condicoes  = $row['condicoes'];
        $object->exigencias = $row['exigencias'];
        $object->info       = $row['info_est'];

        foreach (pg_fetch_assoc($res2) as $value)
        {
          $temp[] = $value;
        }
        $object->curso = $temp;

        $retorno = $object;
      }
      return $retorno;
    }

    function ShowEstagiosById($id='')
    {
       //Função OK
       $estagios  = new Connection();
       $show      = $estagios->getEstagioById($id);
       $resultado = array();

       if($show != null)
       {
          $titulo     = $show->titulo;
          $atividades = $show->atividades;
          $salario    = $show->salario;
          $condicoes  = $show->condicoes;
          $exigencias = $show->exigencias;
          $info       = $show->info;
          $cursos     = $show->curso;

          array_push($resultado, array("titulo"=>$titulo, "atividades"=>$atividades, "salario"=>$salario, "condicoes"=>$condicoes, "exigencias"=>$exigencias, "informacoes"=>$info, "cursos"=>$cursos));

          echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
       }
    }

    function getAllAssistencias()
    {
      //Função Ok
      //
      $sql = "SELECT * FROM assistencias";
      $res = pg_query($sql);
      $resultado = array();

      while($row = pg_fetch_array($res))
      {
        $object         = new Assistencias();
        $object->id     = $row['id_assist'];
        $object->assist = $row['assist'];
        $object->texto  = $row['texto'];
        array_push($resultado,
        array('id'=>$object->id,'Nome'=>$object->assist,'Descricao'=>$object->texto));
      }
     echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    }

    function getAllEventos()
    {
      //Função OK
      // Necessário decidir condições de busca
      //$sql = "SELECT * FROM eventos WHERE data_inicio BETWEEN NOW() AND CURRENT_DATE + INTERVAL '2 MONTH'
      //         OR data_fim BETWEEN NOW() AND CURRENT_DATE + INTERVAL '2 MONTH' AND e.status_id IN ('3', '4') ORDER BY data_inicio ASC";
      $sql = "SELECT * FROM eventos e WHERE e.status_id IN ('3', '4') ORDER BY id_event DESC";
      $res = pg_query($sql);
      $resultado = array();

      while ($row = pg_fetch_array($res))
      {
         $object             = new Eventos();
         $object->id         = $row['id_event'];
         $object->evento     = $row['evento'];
         $object->dataInicio = date('d/m/Y', strtotime($row['data_inicio']));
         $object->dataFim    = date('d/m/Y', strtotime($row['data_fim']));
         array_push($resultado, array('id'=>$object->id, 'evento'=>$object->evento, 'data de inicio'=>$object->dataInicio, 'data de fim'=>$object->dataFim));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    }

    function getEventosById($id='')
    {
      //Função OK
      $sql    = "SELECT * FROM eventos e, categorias c WHERE c.id_cat=e.event_cat AND e.id_event = $id";
      $res = pg_query($sql);
      $resultado = array();

      while ($row=pg_fetch_assoc($res))
      {
        $object             = new Connection();
        $object->id         = $row["id_event"];
        $object->evento     = $row['evento'];
        $object->dataInicio = date('d/m/Y', strtotime($row['data_inicio']));
        $object->dataFim    = date('d/m/Y', strtotime($row['data_fim']));
        $object->horario    = $row['horario'];
        $object->categoria  = $row['categoria'];
        $object->texto      = $row['texto'];
        $object->imagem     = $row['imagem'];
        array_push($resultado, array( "id"=>$object->id,
                                      "evento"=>$object->evento,
                                      "categoria"=>$object->categoria,
                                      "texto"=>$object->texto,
                                      "imagem"=>$object->imagem,
                                      "Data de inicio"=>$object->dataInicio,
                                      "Data de fim"=> $object->dataFim,
                                      "horario"=>$object->horario));
      }
      echo json_encode(array("result"=>$resultado), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

  }
?>
