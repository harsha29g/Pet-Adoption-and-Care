<?php
session_start();
    try{
        $price=$_POST['price'];
        $status=$_POST['status'];
        $number=$_POST['number'];
        $breedcode=$_REQUEST["breedcode"];
        $breedercode=$_SESSION["breedercode"];
       
        $msg="";
        $c=0;

        $conn=new PDO("mysql:host=localhost;dbname=pet","root",null);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt=$conn->prepare("insert into pets(breedcode,price,status,number,breedercode) values(?,?,?,?,?)");
        $stmt->bindParam(1,$breedcode);
        $stmt->bindParam(2,$price);
        $stmt->bindParam(3,$status);
        $stmt->bindParam(4,$number);
        $stmt->bindParam(5,$breedercode);
        $stmt->execute();
        $c=$stmt->rowcount();
        
        if($c>0)
    {
        $msg="Pet Added Successfully";
        header("location:breederoutput.php?msg=$msg");
    }
    else
    {
        $msg="Pet Adding Failed";
        header("location:breederoutput.php?msg=$msg");
    }
    }
    catch(Exception $e)
    {
        $msg= $e->getMessage();
        header("location:breederoutput.php?msg=$msg");
    }
 
?>
<html>
    <body>
        <?php
        
        ?>
</body>
    <html>