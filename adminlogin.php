<?php
    session_start();

    $emailid=$_POST['emailid'];
    $password=$_POST['pswd'];
    $msg="";
   
    try{
        $conn=new PDO("mysql:host=localhost;dbname=pet","root",null);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt=$conn->prepare("select * from admin where emailid=? and password=? ");

 $stmt->bindParam(1,$emailid);
 $stmt->bindParam(2,$password);
$stmt->execute();

$c=$stmt->rowcount();

if($c==1)
{//store data in session and go to homepage
  $row=$stmt->fetch(PDO::FETCH_ASSOC);
  $_SESSION["emailid"]=$emailid;
  $_SESSION["password"]=$password;
  
  header('location:admin/home.php');
}
else
{
    $msg="Invalid deatils";
    header("location:message.php?msg=$msg");
}
}

catch(Exception $e)
{
    $msg=$e->getMessage().","."loginFailed";
    header("location:message.php?msg=$msg");
}
?>
<html>
    <body>
        
    </body>
</html>