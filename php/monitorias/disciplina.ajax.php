<?php

	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$infobd = "host =localhost port =5432 dbname =todentro user =postgres password =senha5";
	$con    = pg_connect($infobd);

	//$curso = mysql_real_escape_string( $_REQUEST['curso'] );
  $curso       = pg_escape_string( $_REQUEST['curso'] );
	$disciplinas = array();

	$sql    = "SELECT * FROM disciplinas as d WHERE d.curso = $curso ORDER BY d.disciplina";
	$return = pg_query( $sql );
	while ( $line = pg_fetch_assoc( $return ) )
	{
		$disciplinas[] = array
		(
			'id_disc'	=> $line['id_disc'],
			'disciplina'	=> $line['disciplina'],
		);
	}

	echo(json_encode($disciplinas));
?>
