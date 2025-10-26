<?php
$msg="";
$c=0;
try{
    $breed_array=array();

    //connect to database
    $conn=new PDO("mysql:host=localhost;dbname=pet","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //build the sql statement
    $stmt=$conn->prepare("select * from breed");
    $stmt->execute();
    $c=$stmt->rowcount();
    if($c>0)
    {
        //loop through the rows & push them into array
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($breed_array,$row);
        }
    }
    else{
        $msg="no data found";
        header("location:customeroutput.php?msg=$msg");
    }
}
catch(Exception $e)
{
    $msg=$e->getMessage();
}
?>
<html>
    <head>
        <title>breed details</title>
        <?php
        include("header_link.php");
        ?>
</head>
<body class="sub_page">
<?php
    include("header.php");
    ?>
    <h3>list of breeds</h3>
    <?php
    if($c>0)
    {
    ?>
    <table border="5" cellpadding="20">
    <thead>
            <!-- <th>Breedcode</th> -->
            <th>Breedname</th>
            <th>Category </th>
            <th>Origin </th>
            <th>Height</th>
            <th>Weight </th>
            <th>Life span </th>
            <th>Nature </th>
            <th> Photo</th>
            <th>Price</th>
</thead>
         
<?php
    // for($i=0;$i<count($breed_array);)
    // {
    
    //     echo "<tr> ";
    //     for($j=0; $j<count($breed_array) && $j<2 && $i<count($breed_array);$j++)
    //     {$bc=$breed_array[$i]["breedcode"];
    //     $bn=urlencode($breed_array[$i]["breedname"]);
    //     echo "<td>Breed :<a href=showbreeders.php?breedcode=$bc>".$breed_array[$i]["breedname"]."</a><br>";
    //     // echo "Breed :".$breed_array[$i]["breedname"]."<br>";
    //     echo "Category :".$breed_array[$i]["category"]."<br>";
    //     echo "Origin :".$breed_array[$i]["origin"]."<br>";
    //     echo "Height :".$breed_array[$i]["height"]."<br>";
    //     echo "Weight :".$breed_array[$i]["weight"]."<br>";
    //     echo "Life span :".$breed_array[$i]["lifespan"]."<br>";
    //     echo "Nature :".$breed_array[$i]["nature"]."<br>";
    //     echo "<img src=../admin/".$breed_array[$i]["photo"]." height=150 width=300><br>";
    //     echo "Price :".$breed_array[$i]["price"]."<br>";
    //     echo "</td>";
    //     $i++;
    //     }
            
            
    //     echo "</tr>";

    // }

    for($i=0;$i<count($breed_array);$i++)
    {
        echo "<tr> ";
        $bc=$breed_array[$i]["breedcode"];
        $bn=urlencode($breed_array[$i]["breedname"]);
        echo "<td><a href=showbreeders.php?breedcode=$bc>".$breed_array[$i]["breedname"]."</a></td>";
        // echo "<td>".$breed_array[$i]["breedname"]."</td>";
        echo "<td>".$breed_array[$i]["category"]."</td>";
        echo "<td>".$breed_array[$i]["origin"]."</td>";
        echo "<td>".$breed_array[$i]["height"]."</td>";
        echo "<td>".$breed_array[$i]["weight"]."</td>";
        echo "<td>".$breed_array[$i]["lifespan"]."</td>";
        echo "<td>".$breed_array[$i]["nature"]."</td>";
        echo "<td><img src=../admin/".$breed_array[$i]["photo"]." height=150 width=300></td>";
        echo "<td>".$breed_array[$i]["price"]."</td>";
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