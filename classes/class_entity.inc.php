<?php

class entity {

	private $formarray = NULL;
	private $tbl = NULL;
	
	public function __construct($formpost, $table) {
		$this->formarray = $formpost;
		$this->tbl = $table;
	}
	
	function add() {	
		$conn = new dbic();
		$fields = $conn->fetch_fields($this->tbl);	
		return $conn->insert_data($this->tbl, array_intersect_key($this->formarray,$fields) ,true);
	}
	
	function edit($fld,$prm) {
	
		$conn = new dbic();
		$fields = $conn->fetch_fields($this->tbl);
		$conn->edit_data($this->tbl, array_intersect_key($this->formarray,$fields), $fld,$prm);
	}
	
	function delete($fld,$prm) {
	
		$conn = new dbic();
		$conn->delete_data($this->tbl, $fld,$prm);
	}

	# End of class
}
?>