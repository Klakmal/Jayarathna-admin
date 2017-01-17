<html>
    <head></head>
    <body>
        <label>Rfid input</label>
        
       <?php
        
        

        $addr = gethostbyname("192.168.1.2");

        $client = stream_socket_client("tcp://$addr:80", $errno, $errorMessage);

        if ($client === false) {
            throw new UnexpectedValueException("Failed to connect: $errorMessage");
        }

        fwrite($client, "POST / HTTP/1.0\r\nHost: 192.168.1.6\r\nAccept: */*\r\n\r\n");
         $value= stream_get_contents($client);
        fclose($client);
        
        //cut unnessasery parts
        $value=explode("*",$value);
        
        $value=explode(" ",$value[1]);
        //cut unnessasery parts
        
        ?>
        
        <?php
        require "dbcon/dbcon.php";
        foreach($value as $v){
            $v=(int)$v;
            $sql= "SELECT status FROM id WHERE id='$v'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
                     $inout=$row['status'];
                     echo $inout;
                
           echo $inout;
            if($inout){
                if($inout=="out"){
                    $status="in";
                    $timein=date("Y-m-d");
                    $timeout="no";
                    
                    $sql="UPDATE id SET status='$status',timein='$timein', timeout='$timeout' WHERE id.id='$v'";
                    
                    if (mysqli_query($conn, $sql)) {
                        header('location:client.php');
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                }
                else if($inout=="in"){
                    $status="out";
                    $timeout=date("Y-m-d");
                    //$timein="SELECT timein FROM id WHERE $v=id";
                    
                    $sql="UPDATE id SET status='$status', timeout='$timeout' WHERE id.id='$v'";
                    
                    if (mysqli_query($conn, $sql)) {
                        header('location:client.php');
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
                
            }else{
                $id=$v;
                $no=0;
                $status="in";
                $timein=date("Y-m-d");
                $timeout="0000-00-00";
                
                $sql="INSERT INTO id(id,no,status,timein,timeout) VALUES('$id','$no','$status','$timein','$timeout')";
                    
                    if (mysqli_query($conn, $sql)) {
                        header('location:client.php');
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
            }
        
        }
        
        ?>
    </body>
</html>