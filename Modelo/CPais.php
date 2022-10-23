<?php 
require_once 'Modelo/CConectable.php';

/**
 * CPais
 */
class CPais extends CConectable
{
	private $ISO;
	private $Nombre;

	function __construct($id)
	{
		parent::__construct($id);
	}

	public function obtenTodosPaisesHTML()
	{
		$html = "";

		$q = "SELECT * FROM paises";
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
			. "$obj[1] - $obj[2]</option>\n";
		}

		return $html;
	}

	// Getters
	public function getISO() { return $this->ISO; }
	public function getNombre() { return $this->Nombre; }
	
	// Setters
	public function setISO($iso) { $this->ISO = $iso; }
	public function setNombre($nom) { $this->Nombre = $nom; }
	
}
?>