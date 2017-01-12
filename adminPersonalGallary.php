<!DOCTYPE html>
<html>
<head>
    <title>Insert Image</title>
</head>
<body>
<?php
$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    $con = mysqli_connect('localhost','root','','project') or die('Unable To connect');
    $sql = "insert into personalgallary (name,link) values('$_POST[name]',?)";

    $stmt = mysqli_prepare($con,$sql);

    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Successfullly UPloaded';
    }else{
        $msg = 'Could not upload';
    }
    mysqli_close($con);
}
?>
<form action="adminPersonalGallary.php" method="post" enctype="multipart/form-data">
	<input type="text" name="name">
    <input type="file" name="image" />
    <button>Upload</button>
</form>
<?php
    echo $msg;
?>
</body>
</html>