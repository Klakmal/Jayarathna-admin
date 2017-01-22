<?php
                    
                require "../dbcon/dbcon.php";
                 $error=FALSE;
                 if (isset($_POST['update'])) {
                     
                                $no=$_POST["no"];

                                $type = $_POST['type'];
                            
                     
                                $supplier = $_POST['supplier'];
                            
                     
                                $price = $_POST['price'];
                            
                 
                 
                if ($error==FALSE){

                $sql = "UPDATE type SET price='$price' WHERE no='$no' OR (type='$type' AND supplier='$supplier')";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>window.location.href='type.php';</script>";
              
                } else {
                    echo "error" ;
                }
                }
                 }
                ?>