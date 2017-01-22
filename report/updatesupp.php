 <?php
                require "dbcon/dbcon.php";
                                if (isset($_POST['submit'])) {
                     
                     
                                $supplierno = $_POST['supplierno'];
                            
                     
                                $supplier = $_POST['supplier'];
                            
                     
                     
                                $contactno = $_POST['contactno'];
                            
                     
                                $address = $_POST['address'];
                            
                     
                                $email = $_POST['email'];
                                                
                     
                                $platinum = null;
                                $gold = null;
                                $silver = null;
                                $bronze = null;
                                if (isset($_POST['types'])) {
                                    foreach ($_POST['types'] as $key => $value) {
                                        if ($value == 'platinum') {
                                            $platinum = "Yes";
                                        } elseif ($value == 'gold') {
                                            $gold = 'Yes';
                                        } elseif ($value == 'silver') {
                                            $silver = 'Yes';
                                        } elseif ($value == 'bronze') {
                                            $bronze = 'Yes';
                                        }
                                    }
                                }

                 
               

                $sql = "UPDATE supplier SET supplier='$supplier', contactno='$contactno', address='$address', email='$email', platinum ='$platinum', gold= '$gold', silver= '$silver', bronze= '$bronze' WHERE supplierno= '$supplierno'";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("Record updated successfully")</script>';
                    echo "<script>window.location.href='supplier.php';</script>";
                } else {
                    echo "error" ;
                }
                }

                ?>