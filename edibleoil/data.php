<?php
 
session_start();
$uname="";
if(isset($_SESSION["user_name"]))
{
    $uname=$_SESSION["user_name"];
}
$txtname =$_POST["txtname"];
$txtqty=$_POST["txtqty"];
$txtprice=$_POST["txtprice"];


$conn = new mysqli('localhost','root','','data_db');

if($conn->connect_error)
  {

    die('connection Failed: '.$conn->connect_error);

  }   
else
{
  $stmt =$conn->prepare("insert into prodetail(pro_name,pro_qty,pro_price,uid)
                            
                           values(?,?,?,?)");

   $stmt->bind_param("siis",$txtname,$txtqty,$txtprice,$uname);
   $stmt->execute();
   echo'<script>alert("Order Placed Succesfully.")</script>';
   $stmt->close();
   $conn->close();                        
}  




?>