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
		$this->setPaisID($pai);
	}

	public function creaDirectorDB()
	{
		$q =
		"INSERT INTO equi4_peliculapp.director
		(`Nombre`, `ApePrimero`, `ApeSegundo`, `PaisesID`)
		VALUES ('$this->Nombre','$this->ApePrimero',
			'$this->ApeSegundo', $this->PaisID)";

		return $this->con->ejecuta($q);
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

	public function obtenDirectoresDePelicula($idPeli)
	{
		$directs = array();

		// Obtengamos los directores relacionados con la película
		$q1 =
		"SELECT * FROM equi4_peliculapp.directorpelicula
		WHERE `PeliculaID`=$idPeli";

		$res = $this->con->consulta($q1);

		// Y añadimos su información a $directs
		foreach ($res as $directorID) {
			$q2 =
			"SELECT * FROM equi4_peliculapp.director
			WHERE `DirectorID`=$directorID[0]";

			$direc = $this->con->consulta($q2);

			array_push($directs, $direc[0]);
		}

		return $directs;
	}

	public function existeEnDB()
	{
		$q =
		"SELECT CASE WHEN EXISTS(
			SELECT * FROM equi4_peliculapp.director
			WHERE UPPER(Nombre)=UPPER('$this->Nombre')
			AND UPPER(ApePrimero)=UPPER('$this->ApePrimero')
			AND UPPER(ApeSegundo)=UPPER('$this->ApeSegundo')
			AND PaisesID=$this->PaisID
			)
			THEN TRUE ELSE FALSE
		END";

		// El resultado se obtiene de un arreglo bidimensional
		// De un solo espacio, [0][0]
		$bool = $this->con->consulta($q);

		if ( $bool[0][0] == true ) {
			return true;
		}
		else return false;
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