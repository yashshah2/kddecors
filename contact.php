<?php

  include 'db_connect.php';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $phone = $_POST['phone'];
  $uniqueid = getUniqueId($name,$phone);
  function getUniqueId($name,$phone)
  {
    $n=substr(strtoupper($name),0,5);
    $p=substr($phone,0,5);
    $m=date('m');
    $y=date('y');
    $d=date('d');
    $final_id = $n.$d.$m.$y.$p;
    return $final_id;
  }
  $query = "INSERT INTO contact(cust_id,Name,email,phone,message)
            VALUES('".$uniqueid."','".$name."','".$email."','".$phone."','".$message."')";
  mysqli_query($connection,$query);
  header("Location:acknowledgement.html");
 ?>
