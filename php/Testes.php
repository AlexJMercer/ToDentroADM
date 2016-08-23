<?php
echo "<meta charset='UTF-8'>";
include_once "../class/Carrega.class.php";

echo "<h1>Página de testes</h1><br>";
//$n = new Select();
$n = new Connection();
echo "<pre>";
//$n->ShowAvaliacao();
//$n->getAllEstagios();
//$n->getAllEventos();
//$n->getEventosById(2);
//$n->getProcessoSeletivo();
//$n->ShowEstagiosById(1);
//$pesquisa = "Fenadoce";
//$n->searchAllNoticias($pesquisa);
//$n->getAllCategorias();
$n->getAllNoticias();
//$n->ShowNoticiaById(3);
//$n->getAllMonitoriasByCurso(1);
//$n->getMonitoriaById(1);
//$n->getAllCursos();
//$n->getCursoById(1);
//$n->getAllAssistencias();
//$n->getAllSetores();

/*
echo "<pre>";
$segunda = new Connection();
echo "</pre><br>";
$segunda->ShowAllCardapios(1);
echo "</pre><br>";
$terca = new Connection();
echo "<pre>";
$terca->ShowAllCardapios(2);
echo "</pre><br>";
$quarta = new Connection();
echo "<pre>";
$quarta->ShowAllCardapios(3);
echo "</pre><br>";
$quinta = new Connection();
echo "<pre>";
$quinta->ShowAllCardapios(4);
echo "</pre><br>";
$sexta = new Connection();
echo "<pre>";
$sexta->ShowAllCardapios(5);
*/
echo "</pre><br>";
?>
