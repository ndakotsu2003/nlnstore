<?php include('db_connect.php'); 
 $k = $_POST['id'];

?>

<?php 
								
							$product = $conn->query("SELECT * FROM product_list r order by name asc");
								while($row=$product->fetch_assoc()){
							$inn = $conn->query("SELECT sum(qty) as inn FROM inventory where type = 1 and product_id = '{$k}'");
							$inn = $inn && $inn->num_rows > 0 ? $inn->fetch_array()['inn'] : 0;
							$out = $conn->query("SELECT sum(qty) as `out` FROM inventory where type = 2 and product_id = '{$k}'");
							$out = $out && $out->num_rows > 0 ? $out->fetch_array()['out'] : 0;
							$available = $inn - $out;

							?>

                            

<?php

}
?>

<td style= 'text-align: center'><?php echo $available ?></td>