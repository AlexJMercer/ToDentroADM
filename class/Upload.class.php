<?php
/*
* Classe para upload de arquivos simples.
* @autor Vin�cius Louren�o
* @since 13/08/2012
* @version 0.1
* http://blog.vilourenco.com.br
*/

class Upload {

	// Constante respons�vel por guardar a pasta de onde os arquivos estar�o.
	const _FOLDER_DIR = "files/";

	// Vari�vel para guardar o array relacionado ao arquivo.
	public $_file;
	private $id;
	public $bd;
	// M�todo construtor que recebe o array com os arquivos via POST
	// Verifica se j� existe diret�rio, caso n�o; � criado.
	function __construct($curFile){


		if(!file_exists(self::_FOLDER_DIR)){
			mkdir(self::_FOLDER_DIR);
		}
		$this->_file = $curFile;
		$this->bd    = new BD();
	}

	//Met�do para:
	//Verificar se existe arquivo;
	//Setar nome aleat�rio para evitar repeti��o e substiui��o de arquivos;
	//Cria nome de arquivo concatenando DIRET�RIO + NOME ALEAT�RIO + NOME DO ARQUIVO ENVIADO.
	//Verifica se o arquivo foi realizado o upload
	//Move o arquivo para o diret�rio escolhido, inserido na concatena��o realizada.
	//Retorna true em casos de upload com sucesso e false com erro.
	function noticiaUpload()
	{
		if(isset($this->_file))
		{
			$randomName = rand(00,9999);
			$fileName   = self::_FOLDER_DIR . "_" . $randomName . "_" . $this->_file["name"];
			if(is_uploaded_file($this->_file["tmp_name"]))
			{
				if(move_uploaded_file($this->_file["tmp_name"], $fileName))
				{
					$sql_id_not = "SELECT CURRVAL('noticias_id_not_seq')";
					$last       = pg_query($sql_id_not);
					$idnot      = pg_fetch_array($last);
					$this->id   = $idnot[0];
					//print_r($idnot[0]);
					$sqlImg    = "INSERT INTO imagens_noticias (imagem, noticia) VALUES ('$fileName', '$this->id')";
          $returnImg = pg_query($sqlImg);

					if ($returnImg)
					{
						return $returnImg;
					}
				}
			}
		}
	}

	function eventoUpload()
	{
		if(isset($this->_file))
		{
			$randomName = rand(00,9999);
			$fileName   = self::_FOLDER_DIR . "_" . $randomName . "_" . $this->_file["name"];
			if(is_uploaded_file($this->_file["tmp_name"]))
			{
				if(move_uploaded_file($this->_file["tmp_name"], $fileName))
				{
					$sql_id_event = "SELECT CURRVAL('eventos_id_event_seq')";
					$last         = pg_query($sql_id_event);
					$ideve        = pg_fetch_array($last);
					$this->id     = $ideve[0];
					//print_r($ideve[0]);
					$sqlImg    = "UPDATE eventos set imagem = '$fileName' WHERE id_event = $this->id";
					$returnImg = pg_query($sqlImg);

					return true;
				}
				else
				{
					echo "Erro, problemas no envio.";
					return false;
				}
			}
		}
	}

	function cursoUpload()
	{
		if(isset($this->_file))
		{
			$randomName = rand(00,9999);
			$fileName   = self::_FOLDER_DIR . "_" . $randomName . "_" . $this->_file["name"];
			if(is_uploaded_file($this->_file["tmp_name"]))
			{
				if(move_uploaded_file($this->_file["tmp_name"], $fileName))
				{
					$sql_id_curso = "SELECT CURRVAL('cursos_id_curso_seq')";
					$last         = pg_query($sql_id_curso);
					$idcur        = pg_fetch_array($last);
					$this->id     = $idcur[0];
					//print_r($ideve[0]);
					$sqlImg    = "UPDATE cursos set logo = '$fileName' WHERE id_curso = $this->id";
					$returnImg = pg_query($sqlImg);

					return true;
				}
				else
				{
					echo "Erro, problemas no envio.";
					return false;
				}
			}
		}
	}

	function cursoUploadUpdate($id = "")
	{
		if(isset($this->_file))
		{
			$randomName = rand(00,9999);
			$fileName   = self::_FOLDER_DIR . "_" . $randomName . "_" . $this->_file["name"];
			if(is_uploaded_file($this->_file["tmp_name"]))
			{
				if(move_uploaded_file($this->_file["tmp_name"], $fileName))
				{
					$this->id = $id;
					//print_r($ideve[0]);
					$sqlImg    = "UPDATE cursos set logo = '$fileName' WHERE id_curso = $this->id";
					$returnImg = pg_query($sqlImg);

					return true;
				}
				else
				{
					echo "Erro, problemas no envio.";
					return false;
				}
			}
		}
	}

	function noticiaUploadUpdate($id = "")
	{
		if(isset($this->_file))
		{
			$randomName = rand(00,9999);
			$fileName   = self::_FOLDER_DIR . "_" . $randomName . "_" . $this->_file["name"];
			if(is_uploaded_file($this->_file["tmp_name"]))
			{
				if(move_uploaded_file($this->_file["tmp_name"], $fileName))
				{
					$this->id = $id;
					//print_r($this->id);
					$sqlImg    = "UPDATE imagens_noticias SET imagem = '$fileName' WHERE noticia = $this->id";
          $returnImg = pg_query($sqlImg);
					//print_r($sqlImg);
					//print_r($returnImg);
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}

	function eventoUploadUpdate($id="")
	{
		if(isset($this->_file))
		{
			$randomName = rand(00,9999);
			$fileName   = self::_FOLDER_DIR . "_" . $randomName . "_" . $this->_file["name"];
			if(is_uploaded_file($this->_file["tmp_name"]))
			{
				if(move_uploaded_file($this->_file["tmp_name"], $fileName))
				{
					$this->id = $id;

					$sqlImg    = "UPDATE eventos set imagem = '$fileName' WHERE id_event = $this->id";
					$returnImg = pg_query($sqlImg);

					return true;
				}
				else
				{
					echo "Erro, problemas no envio.";
					return false;
				}
			}
		}
	}

}
?>
