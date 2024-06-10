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
								<select name="product_id" id="prod" class="custom-select browser-default select2" onchange= "populate(); tester();">
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

			<table class="table table-bordered" id="ledg">
				<thead>
					<tr>
					<div class="column" id="col">
												
					    <!--<p class="pname">Name: <b></b></p>
						<p class="pdesc">Description: <b></b></p>
                        <p class="pdesc">Material Code: <b></b></p>
                        <p class="pdesc">BIN No: <b></b></p>
                        <p class="pdesc">Location: <b>ABUJA</b></p>-->
						
                                    </div>
					</tr>
					<colgroup>
									<col width="10%">
									<col width="10%">
									<col width="10%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
								</colgroup>
					<tr>
						<th class="text-center">Receiving Date</th>
						<th class="text-center">SRV</th>
						<th class="text-center">R-QTY</th>
						<th class="text-center">Supplier</th>
						<th class="text-center">Issue Date</th>
						<th class="text-center">SIV</th>
						<th class="text-center">I-QTY</th>
						<th class="text-center">Department</th>
						<th class="text-center">Balance</th>
					</tr>
									</thead>
			<tbody id="ans">



			</tbody>


									</table>

                        
</div>




            </div>
            </div>
</div>


    </div>

<script>
function tester(){

	
		
	populate();
	 
	
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
	












</script>