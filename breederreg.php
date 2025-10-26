<?php
$breedercode=0; 
$amount=500;
try{
    $name=$_POST['uname'];
    $phone=$_POST['phone'];
    $emailid=$_POST['mail'];
    $address=$_POST['address'];
    $account_no=$_POST['acno'];
    $password=$_POST['pswd'];
    $msg="";
    $transaction_date=Date('Y/m/d');
    $c=0;

    $conn=new PDO("mysql:host=localhost;dbname=pet","root",null);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt=$conn->prepare("insert into breeder(name,phone,emailid,address,account_no,password) values(?,?,?,?,?,?)");
    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$phone);
    $stmt->bindParam(3,$emailid);
    $stmt->bindParam(4,$address);
    $stmt->bindParam(5,$account_no);
    $stmt->bindParam(6,$password);
    $stmt->execute();
    $c=$stmt->rowcount();
    
    if($c>0)
    {
        $breedercode=$conn->lastInsertId();

        // stmt1=update account balance-500 where account_no=?
        $stmt1=$conn->prepare("update account set balance=balance-500 where account_no=?");

        $stmt1->bindParam(1,$account_no);
        $stmt1->execute();
        $c=$stmt1->rowcount();

        //stmt2=update account balance + 500 where account_no=123;

        $stmt2=$conn->prepare("update account set  balance=balance+500 where account_no=1234");
        $stmt2->bindParam(1,$account_no);
        $stmt2->execute();
        $stmt2->rowcount();
        
         
        //stmt3=insert into transaction

        $stmt3=$conn->prepare("insert into transaction(transaction_date,breedercode,amount) values(?,?,?)");
        $stmt3->bindParam(1,$transaction_date);
        $stmt3->bindParam(2,$breedercode);
        $stmt3->bindParam(3,$amount);
        $stmt3->execute();
        $stmt3->rowcount();


        $msg="row created";
        header("location:message.php?msg=$msg");
    }
    else
    {
        $msg="row creation failed";
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
    <html>