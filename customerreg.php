<?php
 
try{
    $name=$_POST['uname'];
    $phone=$_POST['phone'];
    $emailid=$_POST['mail'];
    $password=$_POST['pswd'];
    $msg="";
    $c=0;

    $conn=new PDO("mysql:host=localhost;dbname=pet","root",null);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt=$conn->prepare("insert into customer(name,phone,emailid,password) values(?,?,?,?)");
    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$phone);
    $stmt->bindParam(3,$emailid);
    $stmt->bindParam(4,$password);
    $stmt->execute();
    $c=$stmt->rowcount();
    
    if($c>0)
    {
        $msg="Registered successfully";
        header("location:message.php?msg=$msg");
    }
    else
    {
        $msg="Registration failed";
        header("location:message.php?msg=$msg");
    }
}
    catch(Exception $e)
    {
        $msg= $e->getMessage();
        header("location:message.php?msg=$msg");
    }
 
?>
<html>
    <body>
        <?php
        echo $msg;
        ?>
</body>
    </html>