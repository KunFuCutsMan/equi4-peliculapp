<?php
/**
 * CActor
 */
class CActor extends CConectable
{
	// Atributos
	private $Nombre;
	private $ApePrimero;
	private $ApeSegundo;
	private $PaisID;

	function __construct( $id, $nom, $ap1, $pai)
	{
		parent::__construct($id);
		$this->setNombre($nom);
		$this->setApePrimero($ap1);
		$this->setPaisID($pai);
	}

	public function creaActorDB()
	{
		$q =
		"INSERT INTO equi4_peliculapp.actor
		(`Nombre`, `ApePrimero`, `ApeSegundo`, `PaisesID`)
			VALUES ('$this->Nombre', '$this->ApePrimero',
			'$this->ApeSegundo', $this->PaisID)";

		print_r2($q);

		return $this->con->ejecuta($q);
	}

	public function existeEnDB()
	{
		$q =
		"SELECT CASE WHEN EXISTS(
			SELECT * FROM equi4_peliculapp.actor
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

	public function obtenTodosActoresHTML()
	{
		$html = "";

		$q = "SELECT * FROM actor";
		$arrActor = $this->con->consulta($q);

		if ( count($arrActor) >= 1 ) {
			$html = $this->obtenOptionsHTML($arrActor);
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
	public function setPaisID($pai) { $this->PaisID = $pai; }
	
}
?>