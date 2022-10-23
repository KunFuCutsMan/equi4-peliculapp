<?php
require_once 'Modelo/CConectable.php';

/**
 * CPelicula
 */
class CPelicula extends CConectable
{
	private $Nombre;
	function __construct($id, $nom)
	{
		parent::__construct($id);
		$this->setNombre($nom);
	}

	public function obtenTodasPeliculasHTML()
	{
		$html = "";

		$q = "SELECT * FROM pelicula";
		$arrPelis = $this->con->consulta($q);

		if ( count($arrPelis) >= 1 ) {
			$html = $this->obtenOptionsHTML($arrPelis);
		}

		return $html;
	}

	protected function obtenOptionsHTML($arr)
	{
		$html = "";
		
		foreach ($arr as $obj) {
			$html .= '<option value="' . $obj[0] . '">'
			. "$obj[1]</option>\n";
		}

		return $html;
	}

	// Getters
	public function getNombre() { return $this->Nombre; }
	
	// Setters
	public function setNombre($nom) { $this->Nombre = $nom; }
	
}
?>