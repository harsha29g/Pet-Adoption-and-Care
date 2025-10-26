<?php
$msg="";
$c=0;
try{
    $customer_array=array();

    //connect to database
    $conn=new PDO("mysql:host=localhost;dbname=pet","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //build the sql statement
    $stmt=$conn->prepare("select * from customer");
    $stmt->execute();
    $c=$stmt->rowcount();
    if($c>0)
    {
        //loop through the rows & push them into array
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($customer_array,$row);
        }
    }
    else{
        $msg="Customers Not Found";
        header("location:adminoutput.php?msg=$msg");
    }
}
catch(Exception $e)
{
    $msg=$e->getMessage();
}
?>
<html>
    <head>
        <title>list of customer</title>
        <?php
        include("header_link.php");
        ?>
</head>
<body class="sub_page">
<?php
    include("header.php");
    ?>
    <h3 align="center">list of customers</h3>
    <?php
    if($c>0)
    {
    ?>
    <table align="center" border="5" cellpadding="5">
        <thead>
            <th>Name</th>
            <th>Phone</th>
            <th>Email-id</th>
</thead>
<?php
    for($i=0;$i<count($customer_array);$i++)
    {
        echo "<tr> ";
        
        echo "<td>".$customer_array[$i]["name"]."</td>";
        echo "<td>".$customer_array[$i]["phone"]."</td>";
        echo "<td>".$customer_array[$i]["emailid"]."</td>";
        echo "</tr>";
    }
?>
</table>
<?php
    include("footer.php");
    ?>
<?php
    }
    
    ?>
    </body>
    </html>