<div class="container">
    <div class="headdiv" align="center">
        <span class="headline">JAYARATNE FUNERALS</span>
    </div>
    <div class="navi_pro" align="center">
        <?php
            $empid = $_SESSION['employeeid'];
            $qry = "select * from employee where employeeid='".$empid."'";
            $rlt = mysqli_query($conn,$qry);
            $row = mysqli_fetch_array($rlt);
                echo '<img class="propic" src = "data:image;base64,'.base64_encode($row['image']).'">';
        ?>
    <br>
    <p style="color:#aeb2b7;">Welcome,</p>
    <h4 class="name"><b><?php echo $row['fname']." ".$row['lname']; ?></b></h4>
<!--    <p class="other">Jayarathna Funrels</p>-->
        <hr>
    </div>
    <div class="menutitlediv">
        <p class="menutitle">Menu</p>
    </div>
</div>