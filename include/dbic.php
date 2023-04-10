<?php
/* START DATABASE CLASS - dbic */

class dbic {

	public $conn = null;
	private $encoding = "utf8";

	/* Class constructor override */
	public function __construct($debug = false) {
		include_once "conf.php";

		// $this->conn = mysqli_connect(DBI_SERVER, DBI_USER, DBI_PASS, DBI_NAME);
        try {
			//connect as appropriate as above
			$this->conn = new PDO('mysql:host='.DBI_SERVER.';dbname='.DBI_NAME.';charset='.$this->encoding.'mb4', DBI_USER, DBI_PASS,array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch(PDOException $ex) {
			echo "An Error occured!"; //user friendly message
			exit();
		}
	}

	/* Class deconstructor override */
	public function __destruct() {
		$this->CloseDB();
	}

	/* runs a sql query */
	public function runQuery($qry,$params) {
		$stmt = $this->conn->prepare($qry);
		$stmt->execute($params);
		return $stmt;
	}
	
	/* Fetch record as object or array */
	public function fetch_data($qry,$params,$errcont=false) {
		$stmt = $this->conn->prepare($qry);
		$stmt->execute($params);
		return $stmt->fetch();	
	}	

    /* Fetch tables fields as array */
	public function fetch_fields($tbl) {
		$stmt = $this->conn->query("SHOW FIELDS FROM $tbl");
		$columns = array();
		while ($row = $stmt->fetch()) {
			$columns[] = $row[0];
		}
		return array_flip($columns);
	}

	/* Close database connection */
	public function CloseDB() {
		$this->conn = null;
	}

	/* Escape the string get ready to insert or update */
	// public function clearText($text) {
	// 	$text = trim($text);
	// 	return $this->conn->real_escape_string($text);
	// }

	/* Gets the total count and returns integer */
	// public function totalCount($fieldname, $tablename, $where = "")
	// {
	// 	$q = "SELECT count(".$fieldname.") FROM "
	// 	. $tablename . " " . $where;
		 
	// 	$result = $this->conn->query($q);
	// 	$count = 0;
	// 	if ($result) {
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$count = $row[0];
	// 		}
	// 	}
	// 	return $count;
	// }
	
	// function totalRows($stmt){
	// 	return $stmt->rowCount();
	// }
	
	/* sql insert */
	public function insert_data($tbl,$data) {
		$lastid = 0;
		if ('object' == gettype($data) || 'array' == gettype($data)) {
			$value="";
			$dataarr = array();
			$query="INSERT INTO $tbl (";
			foreach ($data as $key => $item) {
				$query.=$key.",";
				$value.="? , ";
				$dataarr[] = $item;
			}
			$query = substr($query,0,-1).") VALUES(".substr($value,0,-2).")";
			$stmt = $this->conn->prepare($query);
			$stmt->execute($dataarr);
			$lastid = $this->conn->lastInsertId();
		}
		return $lastid;
	}

	/* sql edit */
	public function edit_data($tbl,$data, $fld,$prm) {
		if ('object' == gettype($data) || 'array' == gettype($data)) {
			$dataarr = array();
			$query="UPDATE $tbl SET ";
			foreach ($data as $key => $item) {
				$query.=$key."=? , ";
				$dataarr[] = $item;
			}
			$query = substr($query,0,-2);
			$query.="WHERE $fld=? ";
			$dataarr[] = $prm;
			$stmt = $this->conn->prepare($query);
			$stmt->execute($dataarr);
		}
	}
	
	/* sql delete */
	public function delete_data($tbl, $fld,$prm) {
		$query="DELETE FROM $tbl ";
		$query.="WHERE $fld=? ";
		$stmt = $this->conn->prepare($query);
		$stmt->execute(array($prm));
	}
	
	
}
/* END CLASS dbic_class */
?>