<?php include('db_connect.php');

	?>
    <div class="container-fluid">
    <div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Ledger</h4>
			</div>
			<div class="card-body">
                
                <div class="col-md-12">
                <div class="row">
							<div class="form-group col-md-5">
								<label class="control-label">Product</label>
								<select name="product_id" id="prod" class="custom-select browser-default select2" onchange= "callup()">
									<option value=""></option>
								<?php 

                                    $product = $conn->query("SELECT * FROM product_list  order by name asc");
                                    while($row=$product->fetch_assoc()):
                                        $prod[$row['id']] = $row;
								?>
									<option value="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-description="<?php echo $row['description'] ?>" ><?php echo $row['name'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
		<div class ="row" id="pee">

		<div class="col-12" ><h4 style= 'text-align: center'>PRODUCT LEDGER</h4></div>

									</br>
									</br>

									
	
			


			<div class="column" id="col">
												
					    
						
												</div>
												</br>
												</br>
			<table class="table table-bordered" id="ledg">
				<thead>
					
					<colgroup>
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="20%">
									
								</colgroup>
					<tr>
						<th class="text-center">Receiving Date</th>
						<th class="text-center">SRV</th>
						<th class="text-center">R-QTY</th>
						<th class="text-center">Supplier</th>
						
					</tr>
									</thead>
			<tbody id="ans">



			</tbody>


									</table>
									</br>
									</br>
         <!-- table two -->

		 <table class="table table-bordered" id="ledg1">
				<thead>
					
					<colgroup>
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="20%">
									
								</colgroup>
					<tr>
						<th class="text-center">Issue Date</th>
						<th class="text-center">SIV</th>
						<th class="text-center">I-QTY</th>
						<th class="text-center">Department</th>
						
					</tr>
									</thead>
			<tbody id="ans1">



			</tbody>


									</table>

									</br>
									</br>


			<!-- table three -->
			
			<table class="table table-bordered" id="ledg2">
				<thead>
					
					<colgroup>
									<col width="10%">
																	
								</colgroup>
					<tr>
						<th class="text-center">Balance</th>
						
						
					</tr>
									</thead>
			<tbody id="ans2">



			</tbody>


									</table>

									</div>

									<button type="button" class="btn btn-sm btn-primary" id="print"><i class="fa fa-print"></i> Print</button>

                        
		</div>




            </div>
            </div>
</div>


    </div>

<script>

	function callup(){

		populate();
		tester();
		tester2();
		balance();
	}


function tester(){

	
			
		var x= document.getElementById("prod").value;
		
		$.ajax({
			url: "showdata.php",
			method: "POST",
			data:{
				id: x
			},
			success: function (data){
				$("#ans").html(data);

			}
		})




	}

	function tester2(){

	
		
	var x= document.getElementById("prod").value;
	
	$.ajax({
		url: "showtable2.php",
		method: "POST",
		data:{
			id: x
		},
		success: function (data){
			$("#ans1").html(data);

		}
	})




}

function balance(){

	var x= document.getElementById("prod").value;
	
	$.ajax({
		url: "showbalance.php",
		method: "POST",
		data:{
			id: x
		},
		success: function (data){
			$("#ans2").html(data);

		}
	})



}

function populate(){

	var x= document.getElementById("prod").value;

	$.ajax({
			url: "updatehead.php",
			method: "POST",
			data:{
				id: x
			},
			success: function (data){
				$("#col").html(data);

			}
		})

	 
}
	

$('#print').click(function(){
		var _html = $('#pee').clone();
		var newWindow = window.open(" "," ","menubar=no,scrollbars=yes,resizable=yes,width=700,height=600");
		newWindow.document.write(_html.html())
		newWindow.document.close()
		newWindow.focus()
		newWindow.print()
		setTimeout(function(){;newWindow.close();}, 1500);
	})












</script>