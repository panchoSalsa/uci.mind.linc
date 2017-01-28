$("#SearchForm").submit(function(e) {
	e.preventDefault();
	$("#ImageContainer").html("<div id='GeneImageContainer'><img id='GeneImage' src='/linc/images/loading.gif'></div>");
	ajaxCall();
});

function ajaxCall() {
	$.ajax({
	type: "GET",
	url: "rna_seq.php",
	data:"gene_name="+$("#search").val(),
		success: function(data) {
			
			// Update Image
			// $("#ImageContainer").html("<div id='GeneImageContainer'><img id='GeneImage' src='temp.png'></div>");
			var d = new Date();
			$("#GeneImage").attr("src", "temp.png?"+d.getTime());
			

			// Update Gene Online Reference
			$("#Misc").html("<div id='GeneName'>GeneName</div>");

			var common_name = data; 
			$("#GeneName").html('<a href="https://www.ncbi.nlm.nih.gov/gene/?term=' + common_name + '" target="_blank">' + common_name + " @NCBI" + '</a>');
		}
	});
}
