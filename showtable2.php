<?php include('db_connect.php'); 
 $k = $_POST['id'];

?>

<?php
   

    $view = $conn->query("SELECT * FROM inventory where product_id= '{$k}'AND type = 2 ");
    while($row3=$view->fetch_assoc()){

        $ref_no = $row3['ref_no'];
        //echo $sup_ar;
       // echo "<br/>";


        $supid = $conn->query("SELECT * FROM sales_list where ref_no = $ref_no ");
        while($row4=$supid->fetch_assoc()){
            $cus_idd = $row4['customer_id'];
           // echo $sup_idd;

            $supn = $conn->query("SELECT * FROM customer_list where id ='$cus_idd' ");
            while($row5=$supn->fetch_assoc()){
                $cus_name = $row5['name'];
              //   echo $sup_name;
            }

            
        }


        //$view2 = $conn->query("SELECT * FROM inventory where product_id= '{$k}'AND type = 2 limit 1");
         //   while($row6=$view2->fetch_assoc()){

     ?>   
        <tr>
        <td style= 'text-align: center'><?php echo date("M d, Y",strtotime($row3['date_updated'])) ?></td>
        <td style= 'text-align: center'><?php echo $row3['ref_no'] ?></td>
        <td style= 'text-align: center'><?php echo $row3['qty'] ?></td>
        
        <td style= 'text-align: center'><?php echo $cus_name; ?></td>
        <!-- <td>0</td> -->

      
         
        
        
                                
         <?php
   


    }
    
        
    
?>



