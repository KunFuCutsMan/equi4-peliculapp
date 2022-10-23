<?php 
require_once 'Modelo/CConectaDB.php';

/**
 * CConectable
 */
class CConectable
{
	protected $id;
	protected $con;

	function __construct($id)
	{
		$this->setID($id);
		$this->con = new CConectaDB('root', '', 'equi4_peliculapp', '');
	}

	// Metodos
	protected function obtenOptionsHTML($arr)
	{
		$html = "";
		
		foreach ($arr as $obj) {
			$html .= '<option value="' . $obj[0] . '">'
			. "$obj[1] </option>\n";
		}

		return $html;
	}

	// Getters
	public function getID() { return $this->id; }
	
	// Setters
	public function setID($id) { $this->id = $id; }
}
?>