<?php
	if(isset($_POST['departamentos'])){
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/repositorio_informacion.php';
		$xml="<?xml version=\"1.0\"?>\n";
		$xml.="<consulta>\n";
		foreach (Repositorio::lista_departamentos() as $key => $value) {
			$xml.="<departamento>\n";
			$xml.="<id>$key</id>\n";
			$xml.="<nombre>$value</nombre>\n";
			$xml.="</departamento>\n";
		}
		$xml.="</consulta>\n";
		header('Content-Type: text/xml');
		echo $xml;
	}

	if(isset($_POST['municipios'], $_POST['idDepar'])){
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/repositorio_informacion.php';
		$xml="<?xml version=\"1.0\"?>\n";
		$xml.="<consulta>\n";
		foreach (Repositorio::lista_municipios($_POST['idDepar']) as $key => $value) {
			$xml.="<municipio>\n";
			$xml.="<id>$key</id>\n";
			$xml.="<nombre>$value</nombre>\n";
			$xml.="</municipio>\n";
		}
		$xml.="</consulta>\n";
		header('Content-Type: text/xml');
		echo $xml;
	}
?>