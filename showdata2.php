<?php include('db_connect.php'); 

    $k = $_POST['id'];

    $isaiah_inv = $conn->query("SELECT * FROM inventory where product_id = '{$k}' and type =1 ");
    while($row3=$isaiah_inv->fetch_assoc()):
        $product_id_ = $row3['product_id'];
    
    
    endwhile;
                            
        
    
    $receiving = $conn->query("SELECT * FROM receiving_list r order by date(date_added) desc");
    while($row=$receiving->fetch_assoc()):
        $inv_row = $row['ref_no'];
?>
    <tr>
        <td class=""><?php echo date("M d, Y",strtotime($row3['date_updated'])) ?></td>
        <td class=""><?php echo $row3['ref_no'] ?></td>
        <?php

            $supplier = $conn->query("SELECT * FROM supplier_list order by supplier_name asc");
            while($row=$supplier->fetch_assoc()):
                $sup_arr[$row['id']] = $row['supplier_name'];

           
            endwhile;



            $isaiah_inv1 = $conn->query("SELECT * FROM product_list where id = '$product_id_'  ");
            while($row2=$isaiah_inv1->fetch_assoc()):
                $product_name = $row2['name'];
            endwhile;


        ?>
        <td><?php echo $row3['qty'] ?></td>

          <td class=""><?php echo isset($sup_arr[$row['supplier_id']])? $sup_arr[$row['supplier_id']] :'N/A' ?></td>
        
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>

        </tr>
							<?php endwhile; ?>