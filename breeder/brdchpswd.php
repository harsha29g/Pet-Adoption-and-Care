<?php
    session_start();
    //fetch input
    $currentpassword=$_POST["currentpassword"];
    $newpassword=$_POST["newpassword"];
    $confirmpassword=$_POST["confirmpassword"];
    $msg="";
    //compare session password with currentpassword ,new with confirm password
    if($_SESSION["password"] == $currentpassword)
    {
        if($newpassword==$confirmpassword)
        {
            //upadet password with nwe pasword
            //connect with db and update new password to admin table
            $conn= new PDO("mysql:host=localhost;dbname=pet","root",null);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        try{
        $stmt=$conn->prepare("update breeder set password=? where emailid=?");
        $stmt->bindParam(1,$newpassword);
        $stmt->bindParam(2,$_SESSION["emailid"]);
        $stmt->execute();
        $c=$stmt->rowCount();
        if($c>0)
        {
            //change session password
            $_SESSION["password"]=$newpassword;
            $msg="Password Updated";
            header("location:breederoutput.php?msg=$msg");
        }
        else
        {
            $msg="Password Upadate Failed";
            header("location:breederoutput.php?msg=$msg");
        }
        }
            catch(Exception $e)
            {
            $msg="password update failed".$e->getMessage();
            header("location:breederoutput.php?msg=$msg");
            }
        }
    else{
        $msg="new and confirm passwords do not match";
        header("location:breederoutput.php?msg=$msg");
        }
    }
else{
    $msg="Current Password is Invalid";
    header("location:breederoutput.php?msg=$msg");
    }
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
            // echo $msg;
        ?>
    </body>
    </html>