<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo base_url(); ?>assets/css/core.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
 <style>
    
    body{
    font-family: "Lucida Sans";
    font-size: 12px;
     background-image: url(shopping.jpg);
}
 
#wrap{
    width: 1024px;
}
 
     h2{
         text-align: center;
         color: blueviolet;
         padding-bottom: 20px;
        
     }
     .cart_list{
        padding: 20px;
         font-size: 17px;
         font-weight: bold;
         
     }
     
     .table{
         
         border-color: black;
     }
     #cart_content{
         text-align: left;
     }
ul.products{
    list-style-type: none;
    width: 525px;
    margin: 0;
    padding: 0;
    display: block;
}
 
    ul.products li{
        background: #eeeeee;
        border: 1px solid #d3d3d3;
        padding: 5px;
        width: 150px;
        text-align: center;
        float: left;
        margin-right: 10px;
    }
 
   
     
    ul.products small{
        display: block;
       
    }
     
    ul.products form fieldset{
        border: 0px;
    }
     
    ul.products form label{
        font-size: 12px;
    }
     
    ul.products form input[type=text]{
        width: 18px;
        background: #FFF;
        border: 1px solid #d3d3d3;
        
    }
    
    </style>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    </head>
    
    <body>
   
<div id="wrap">
 
    <?php $this->view($content); ?>
     
    <div class="cart_list ">
        <h2>Your shopping cart</h2>
        <div id="cart_content">
            <?php $this->view('cart/cart.php'); ?>
        </div>
    </div>
</div>   

        
        <ul class="products">
    <?php foreach($products as $p): ?>
    <li>
        <h3><?php echo $p['name']; ?></h3>
        
        <small>&euro;<?php echo $p['price']; ?></small>
        
        <?php echo form_open('cart/add_cart_item'); ?>
            <fieldset>
                <label>Quantity</label>
                <?php echo form_input('quantity', '1', 'maxlength="2"'); ?>
                <?php echo form_hidden('product_id', $p['id']); ?>
                <?php echo form_submit('add', 'Add'); ?>
            </fieldset>
        <?php echo form_close(); ?>
    </li>
            
    <?php endforeach;?>
</ul>

        <div class="total">
            <h1>Total</h1>
        </div>
        
        <script >
    
		
	$(document).ready(function() { 
        var link = ""; // Url to your application (including index.php/)
        
		$("ul.products form").submit(function() {

            // Get the product ID and the quantity 
			var id = $(this).find('input[name=product_id]').val();
			var qty = $(this).find('input[name=quantity]').val();
			
		 	$.post(link + "cart/add_cart_item", { product_id: id, quantity: qty, ajax: '1' },
  				function(data){
                    console.log(data)
 		 			if(data == 'true'){
 		 			
    					$.get(link + "cart/show_cart", function(cart){ // Get the contents of the url cart/show_cart
  							$("#cart_content").html(cart); // Replace the information in the div #cart_content with the retrieved data
                            
                            
                            
						}); 		 
										
 		 			}else{
 		 				alert("Product does not exist");
 		 			}
 			 });
 			 
			return false; // Stop the browser of loading the page defined in the form "action" parameter.
		});
        
        
	
	});
    
    </script>
    </body>
    
</html>