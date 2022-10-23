<?php
require_once 'Modelo/CConectable.php';

/**
 * CPeliculaGenero
 */
class CPeliculaGenero extends CConectable
{
	private $Genero;

	function __construct($id, $gen)
	{
		parent::__construct($id);
		$this->setGenero($gen);
	}

	public function obtenTodosGenerosHTML()
	{
		$html = "";

		$q = "SELECT * FROM peliculagenero";
		$arrPaises = $this->con->consulta($q);

		if ( count($arrPaises) >= 1 ) {
			$html = $this->obtenOptionsHTML($arrPaises);
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
	public function getGenero() { return $this->Genero; }
	
	// Setters
	public function setGenero($gen) { $this->Genero = $gen; }
	
}

?>