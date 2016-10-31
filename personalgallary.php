<?php
if($_SERVER['REQUEST_METHOD']=='GET') {
    $num = $_GET['id'];

    $con = mysqli_connect('localhost', 'root', '', 'project') or die('Unable To connect');

    $sql = "SELECT link FROM personalgallary WHERE num=$num";

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
    mysqli_close($con);

    header("Content-type: link/jpeg");
    echo $row['link'];
}