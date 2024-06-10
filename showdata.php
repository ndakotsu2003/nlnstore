<?php include('db_connect.php'); 
 $k = $_POST['id'];

?>

<?php
   

    $view = $conn->query("SELECT * FROM inventory where product_id= '{$k}'AND type = 1 ");
    while($row3=$view->fetch_assoc()){

        $sup_ar = $row3['ref_no'];
        //echo $sup_ar;
       // echo "<br/>";


        $supid = $conn->query("SELECT * FROM receiving_list where ref_no =$sup_ar ");
        while($row4=$supid->fetch_assoc()){
            $sup_idd = $row4['supplier_id'];
           // echo $sup_idd;

            $supn = $conn->query("SELECT * FROM supplier_list where id ='$sup_idd' ");
            while($row5=$supn->fetch_assoc()){
                $sup_name = $row5['supplier_name'];
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
        
        <td style= 'text-align: center'><?php echo $sup_name; ?></td>
        <!-- <td>0</td> -->

      
         
        
        
                                
         <?php
   


    }
    
        
    
?>



