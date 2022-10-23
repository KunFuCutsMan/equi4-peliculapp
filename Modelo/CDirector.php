<?php
require_once 'Modelo/CConectable.php';

/**
 * CDirector
 */
class CDirector extends CConectable
{
	// Atributos
	private $Nombre;
	private $ApePrimero;
	private $ApeSegundo;
	private $PaisID;

	function __construct( $id, $nom, $ape1, $pai)
	{
		parent::__construct($id);
		$this->setNombre($nom);
		$this->setApePrimero($ape1);
	}

	public function obtenTodosDirectoresHTML()
	{
		$html = "";

		$q = "SELECT * FROM director";
		$arrDirector = $this->con->consulta($q);

		if ( count($arrDirector) >= 1 ) {
			$html = $this->obtenOptionsHTML($arrDirector);
		}

		return $html;
	}

	protected function obtenOptionsHTML($arr)
	{
		$html = "";
		
		foreach ($arr as $obj) {
			$html .= '<option value="' . $obj[0] . '">'
			. "$obj[1] $obj[2] $obj[3]</option>\n";
		}

		return $html;
	}


	// Getters
	public function getNombre() { return $this->Nombre; }
	public function getApePrimero() { return $this->ApePrimero; }
	public function getApeSegundo() { return $this->ApeSegundo; }
	public function getPaisID() { return $this->PaisID; }
	
	
	// Setters
	public function setNombre($nom) { $this->Nombre = $nom; }
	public function setApePrimero($ap1) { $this->ApePrimero = $ap1; }
	public function setApeSegundo($ap2) { $this->ApeSegundo = $ap2; }
	public function setPaisID($id) { $this->PaisID = $id; }
	
	
	
}

?>