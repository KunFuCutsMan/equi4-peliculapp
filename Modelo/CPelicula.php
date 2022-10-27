<?php
require_once 'Modelo/CConectable.php';

/**
 * CPelicula
 */
class CPelicula extends CConectable
{
	private $Nombre;
	private $GeneroID;

	function __construct($id, $nom, $gen)
	{
		parent::__construct($id);
		$this->setNombre($nom);
		$this->setGeneroID($gen);
	}

	public function creaPeliculaDB()
	{
		$q ="INSERT INTO equi4_peliculapp.pelicula
			(`Nombre`, `PeliculaGeneroID`)
			VALUES ('$this->Nombre', $this->GeneroID)";

		return $this->con->ejecuta($q);
	}

	public function creaRelacionActor($arrActores)
	{
		$flag = true;

		// Para actor ingresa su relación a la película
		foreach ($arrActores as $actor) {
			$q = "INSERT INTO equi4_peliculapp.actorpelicula
				(`ActorID`, `PeliculaID`)
				VALUES ($actor, $this->id)";

			// Y checa si fue posible crearla (debería de)
			if ( !$this->con->ejecuta($q) ) {
				$flag = false;
				break;
			}
		}

		return $flag;
	}

	public function creaRelacionDirector($arrDirectores)
	{
		$flag = true;

		// Para cada director ingresa su relación a la película
		foreach ($arrDirectores as $director) {
			$q = "INSERT INTO equi4_peliculapp.directorpelicula
				(`DirectorID`, `PeliculaID`)
				VALUES ($director, $this->id)";

			// Y checa si fue posible crearla (debería de)
			if ( !$this->con->ejecuta($q) ) {
				$flag = false;
				break;
			}
		}

		return $flag;
	}

	public function existeEnDB()
	{
		$q =
		"SELECT CASE WHEN EXISTS(
			SELECT * FROM equi4_peliculapp.pelicula
			WHERE UPPER(Nombre)=UPPER('$this->Nombre')
			AND PeliculaGeneroID=$this->GeneroID
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
	public function getGeneroID() { return $this->GeneroID; }

	public function getIDfromDB()
	{
		// Si no está registrado en la DB regresa 0
		if ( !$this->existeEnDB() ) return 0;

		$q =
		"SELECT PeliculaID FROM equi4_peliculapp.pelicula
		WHERE UPPER(Nombre)=UPPER('$this->Nombre')
		AND PeliculaGeneroID=$this->GeneroID";

		$res = $this->con->consulta($q);

		if ( count($res) == 1 ) {
			return $res[0][0];
		}
		else return 0;
	}
	
	// Setters
	public function setNombre($nom) { $this->Nombre = $nom; }
	public function setGeneroID($gen) { $this->GeneroID = $gen; }
	
}
?>