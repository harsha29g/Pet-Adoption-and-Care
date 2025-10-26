<?php
session_start();
$msg="";
$c=0;
$petcode=$_REQUEST["petcode"];
$number=$_POST["number"];

try{

    //conncetion to database

    $conn=new PDO("mysql:host=localhost;dbname=pet","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //building sql statements

    $stmt=$conn->prepare("update pets set number=? where petcode=?");
    $stmt->bindParam(1,$number);
    $stmt->bindParam(2,$petcode);
    $stmt->execute();
    $c=$stmt->rowcount();
    if($c>0)
    {
          $msg="Updation Successfull!";
          header("location:breederoutput.php?msg=$msg");
       
    }
    else
    {
        $msg="pet not found";
        header("location:breederoutput.php?msg=$msg");
    }
}
catch(Exception $e)
{
    $msg=$e->getMessage();
    header("location:breederoutput.php?msg=$msg");
}
?>

<!DOCTYPE html>
<html lang="en">
<body>

   
</body>
</html>