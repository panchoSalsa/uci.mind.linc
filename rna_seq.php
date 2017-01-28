<?php

	function makeConnection() {

		// load dbconnect config 
		include '../../dbconnection/dbconfig.php';

    	// Create connection
    	$conn = new mysqli($servername, $username, $password, $dbname);

    	// Check connection
    	if ($conn->connect_error) {
        	die("Connection failed: " . $conn->connect_error);
    	}
		return $conn;
	}

	function fetchData($conn, $name, &$common_name){
    	$sql = "select * from genes where common_name = " . "\"" . $name . "\"" . " or gene_id = " . "\"" . $name . "\"";
    	$result = $conn->query($sql);
    	if ($result->num_rows > 0) {
        	$row = $result->fetch_assoc();
        	$common_name = $row["common_name"];
  			return formatData($row);
     	} else {
        	echo "0 results";
			return "";
    	}	
	}
		
	function formatData($row) {
		$values = array_values($row);
		$data = "";
		for ($i = 3; $i < (count($values) - 1); ++$i) {
			$data = $data . $values[$i] .  ",";
		}
		$data = $data . $values[count($values) - 1]; 
		return $data; 
	}
	
	function renderGraph($data, $name, $common_name) {
	    exec("Rscript test.r $data $name $common_name");
	}

	$conn = makeConnection();
	$name = $_GET["gene_name"];
	$common_name;

	$data = fetchData($conn,$name,$common_name); 
	renderGraph($data, $name,$common_name);

	// when ajax call succeeds the value of data will be set to whatever is echo.
	// in this case we only want to return $common_name
	echo $common_name; 
?>


