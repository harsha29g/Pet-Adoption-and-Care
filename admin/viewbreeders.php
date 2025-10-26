<?php
$msg="";
$c=0;
try{
    $breeder_array=array();

    //connect to database
    $conn=new PDO("mysql:host=localhost;dbname=pet","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //build the sql statement
    $stmt=$conn->prepare("select * from breeder");
    $stmt->execute();
    $c=$stmt->rowcount();
    if($c>0)
    {
        //loop through the rows & push them into array
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($breeder_array,$row);
        }
    }
    else{
        $msg="Breeders Not Found";
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
        <title>list of breeders</title>
        <?php
        include("header_link.php");
        ?>
</head>
<body class="sub_page">
<?php
    include("header.php");
    ?>
    <h3 align="center">list of breeders</h3>
    <?php
    if($c>0)
    {
    ?>
    <table align="center" border="5" cellpadding="5">
        <thead>
            <th>Name</th>
            <th>Phone</th>
            <th>Email-id</th>
            <th>Address </th>
            <th>Account-no</th>
</thead>
<?php
    for($i=0;$i<count($breeder_array);$i++)
    {
        echo "<tr> ";
        
        echo "<td>".$breeder_array[$i]["name"]."</td>";
        echo "<td>".$breeder_array[$i]["phone"]."</td>";
        echo "<td>".$breeder_array[$i]["emailid"]."</td>";
        echo "<td>".$breeder_array[$i]["address"]."</td>";
        echo "<td>".$breeder_array[$i]["account_no"]."</td>";
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