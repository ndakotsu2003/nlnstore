<?php include('db_connect.php'); 
 $k = $_POST['id'];

?>
<?php
            $view = $conn->query("SELECT * FROM product_list where id= '{$k}' ");
            while($row3=$view->fetch_assoc()){
        
                $p_name = $row3['name'];
                $p_des = $row3['description'];
                $p_code = $row3['category_id'];
                $p_bin = $row3['bin_no'];
                $location = "ABUJA";


                echo " Name : ". $p_name;
                echo "</br>"; 
                echo "</br>";
                echo " Description : ". $p_des;
                echo "</br>";
                echo "</br>";
                echo " Material Code : ". $p_code;
                echo "</br>";
                echo "</br>";
                echo " BIN No : ". $p_bin;
                echo "</br>";
                echo "</br>";
                echo " Location: ". $location;
                echo "</br>";
                echo "</br>";
                echo "</br>";


            }


?>