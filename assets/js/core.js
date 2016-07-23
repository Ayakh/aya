$(document).ready(function() { 
		/*place jQuery actions here*/ 
		var link = "/localhost/ci/index.php"; // Url to your application (including index.php/)
	
		$("ul.products form").submit(function() {
			// Get the product ID and the quantity 
			var id = $(this).find('input[name=product_id]').val();
			var qty = $(this).find('input[name=quantity]').val();
			
			alert('ID:' + id + '\n\rQTY:' + qty);
			
			return false; // Stop the browser of loading the page defined in the form "action" parameter.
		});
	
	});