<!doctype html>
<html lang="en">
  <head>
    <title>Bill Software</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>
		.style_1{
			margin:0px 10px 5px 0px;
			width:20%;
			float:left
		}
		@media print {
		    #myDivToPrint {
		        background-color: white;
		        height: 100%;
		        width: 100%;
		        position: fixed;
		        top: 0;
		        left: 0;
		        margin: 0;
		        padding: 15px;
		        font-size: 14px;
		        line-height: 18px;
		    }
		}
    </style>
  </head>
  <body>

  	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-7 col-12">
				<h4> Payment Document  </h4>
				<form id="form" action="{{ url('generate') }}" method="post">
					<input type="text" name="product1" class="form-control style_1" id="product1" placeholder="Item Name">
		            <input type="text" name="price1" class="form-control style_1" id="price1" placeholder="$$ price">
					<input type="text" name="tax1" class="form-control style_1" id="tax1" placeholder="$$ tax">
					<input type="text" name="discount1" class="form-control style_1" id="discount1" placeholder="$$ discount">
				    
				    <span id="append"></span>
				    <br/><br/>
				    <input type="button" value="ADD MORE" id="plus" class="btn btn-success" />
				    <button type="button" class="btn btn-primary" id="total">Get Total Bill</button> <br/><br/>
				    <input type="text" class="form-control" name="subdiscount" id="subdiscount" placeholder="$$ Enter Sub Total Discount"> <br/>
				    <input type="date" class="form-control" name="date" id="date"> <br/>
				    <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Client Name"> <br/>
				    <input type="submit" class="btn btn-primary btn-lg active" value="Generate Slip" id="slip">
				</form>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-5 col-12" id="myDivToPrint">
				<?php
					if(isset($main_price_dis)){ ?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>BILL GENERATED SUCCESSFULLY</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
					
					<div class="card text-center">
					  <div class="card-header">
					    Company Name
					  </div>
					  <div class="card-block">
					    <div class="card card-inverse card-success"> Total Product Price : <?php echo $main_price_dis ?> </div> <br>
					    <div class="card card-inverse card-success"> Total Tax : <?php echo $tax_value ?> </div> <br>
					    <div class="card card-inverse card-success"> Total Discount : <?php echo $discount_value ?> </div> <br>
					    <div class="card card-inverse card-success"> Discount On Sub Total : <?php echo $subdiscount_value ?> </div> <br>
					    <div class="card card-inverse card-success"> Grand Total : <?php echo $main_price_dis ?> </div> <br>
					    
					    <a onClick="window.print();return false" class="btn btn-primary">PRINT NOW</a>
					  </div>
					</div>

			<?php } ?>
		</div>
	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
	    $(document).ready(function(){
		   var i = 2;
		   
			   $("#plus").click(function () {
					  
					  $("#append").append('<input type="text" class="form-control style_1" name="product'+i+'" id="product'+i+'" placeholder="Item Name"><input type="text" name="price'+i+'" class="form-control style_1" id="price'+i+'"  placeholder="$$ price"><input type="text" class="form-control style_1" name="tax'+i+'" id="tax'+i+'" placeholder="$$ tax"><input type="text" class="form-control style_1" name="discount'+i+'" id="discount'+i+'" placeholder="$$ discount">');
					   		i++;


			   });
			   
			   $("#slip,#subdiscount,#date,#client_name").hide();
			   $("#total").click(function(){
			   		$("#slip,#subdiscount,#date,#client_name").show();
			   })
		})
																						   
	 </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>

		            