<?php 

/**
 * CConectaDB
 */
class CConectaDB
{

	// Atributos
	private $host;
	private $user;
	private $pass;
	private $data;
	private $cone;

	function __construct($usr, $pas, $db, $host)
	{
		$this->setUser($usr);
		$this->setPass($pas);
		$this->setData($db);
		$this->setHost($host);

		$this->conecta();
	}

	// Métodos
	public function conecta()
	{
		$con = mysqli_connect($this->host, $this->user, $this->pass);
		if ( $con ) {
			
			if ( mysqli_select_db($con, $this->data) )
				$this->setCone($con);
			else
				die("No hay base de datos");
		}
		else
			die("No conecta :(");
	}

	public function consulta($query)
	{
		$prodArr = array();

		$querySQL = mysqli_query( $this->cone, $query );

		if ( $querySQL ) {
			
			$n = 0;
			while ( $res = mysqli_fetch_row($querySQL) ) {
				
				for ($m = 0; $m < mysqli_num_fields($querySQL); $m++)
					$prodArr[$n][$m] = $res[$m];

				$n++;
			}
		}

		return $prodArr;
	}

	public function ejecuta($q)
	{
		$flag = false;

		if ( mysqli_query( $this->cone, $q ) ) {
			$flag = true;
		}

		return $flag;
	}

	// Getters
	public function getHost() { return $this->host; }
	public function getUser() { return $this->user; }
	public function getPass() { return $this->pass; }
	public function getData() { return $this->data; }
	public function getCone() { return $this->cone; }
	
	// Setters
	public function setHost($host = '127.0.0.1') { $this->host = $host; }
	public function setUser($usr) { $this->user = $usr; }
	public function setPass($pas) { $this->pass = $pas; }
	public function setData($db) { $this->data = $db; }
	public function setCone($con) { $this->cone = $con; }
	
}
?>