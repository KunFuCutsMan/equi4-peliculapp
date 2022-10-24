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

	public function creaGeneroDB()
	{
		// Que no exista una copia
		if ( $this->existeEnDB() ) {
			return false;
		}

		$q = "INSERT INTO `equi4_peliculapp`.`peliculagenero`
			(`Genero`) VALUES ('$this->Genero')";

		return $this->con->ejecuta($q);
	}

	public function existeEnDB()
	{
		$q =
		"SELECT CASE WHEN EXISTS (
			SELECT * FROM equi4_peliculapp.peliculagenero
			WHERE Genero='$this->Genero'
			)
			THEN TRUE ELSE FALSE
		END";

		// El resultado se obtiene en un arreglo bidensional
		// De un solo espacio, [0][0]
		$bool = $this->con->consulta($q);

		if ( $bool[0][0] == true ) {
			return true;
		}
		else return false;
	}

	public function obtenTodosGenerosHTML()
	{
		$html = "";

		$q = "SELECT * FROM peliculagenero";
		$arrGeneros = $this->con->consulta($q);

		if ( count($arrGeneros) >= 1 ) {
			$html = $this->obtenOptionsHTML($arrGeneros);
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