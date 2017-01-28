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

    function formatSuggestions($gene_name, $keyword) {
    	$keyword = strtoupper($keyword); 
		$initial_pos = strpos($gene_name, $keyword);
		$prefix = substr($gene_name,0,$initial_pos);
		$suffix = substr($gene_name, $initial_pos + strlen($keyword));
		return $prefix . "<strong>" . $keyword . "</strong>" . $suffix; 
    }

	$conn = makeConnection(); 
	
	if (!empty($_POST['keyword'])) {
		$keyword = $_POST['keyword'];
		$sql_common_name = "select * from genes where common_name like '%" . $keyword . "%' order by common_name";  
		$sql_gene_id = "select * from genes where gene_id like '%" . $keyword . "%' order by gene_id"; 
		
		$result_common_name = $conn->query($sql_common_name); 
		$result_gene_id = $conn->query($sql_gene_id);


		if (!empty($result_common_name)) {

			foreach($result_common_name as $gene) {
				?>
				<span class="element" onClick="selectGene('<?php echo $gene["common_name"]; ?>');"><?php echo formatSuggestions($gene["common_name"],$keyword) ?></span>
			<?php
			}
		}

		if (!empty($result_gene_id)) {

			foreach($result_gene_id as $gene) {
				?>
				<span class="element" onClick="selectGene('<?php echo $gene["gene_id"]; ?>');"><?php echo formatSuggestions($gene["gene_id"],$keyword); ?></span>
			<?php
			}
		}

	}	
?>
