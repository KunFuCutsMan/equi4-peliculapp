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

	public function obtenPeliculasEnDB()
	{
		$pelis = array();

		// Busquemos primero las peliculas relacionadas con el director
		$q1 =
		"SELECT PeliculaID FROM equi4_peliculapp.directorpelicula
		WHERE `DirectorID`=$this->id";

		$res = $this->con->consulta($q1);

		// Si encontramos al menos una pelicula, entonces obtengamos
		// sus nombres para regresarlas en el arreglo
		if ( count($res) >= 1 ) {
			foreach ($res as $peliculaID) {
				// Obten la película con dicha ID
				$q2 =
				"SELECT Nombre, PeliculaGeneroID FROM equi4_peliculapp.pelicula
				WHERE `PeliculaID`=$peliculaID[0]";

				$resP = $this->con->consulta($q2)[0];

				// Y Obten su género
				$q3 =
				"SELECT Genero FROM equi4_peliculapp.peliculagenero
				WHERE `PeliculaGeneroID`=$resP[1]";

				$resG = $this->con->consulta($q3)[0];

				// Y juntemos las respuestas a $pelis
				array_push($pelis, array( $resP[0], $resG[0] ) );
			}
		}

		return $pelis;
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