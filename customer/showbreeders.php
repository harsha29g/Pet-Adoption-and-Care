<?php
$msg = "";
$c = 0;
$breedcode = $_REQUEST["breedcode"];
try {
    $breeder_array = array();

    //connect to database
    $conn = new PDO("mysql:host=localhost;dbname=pet", "root", null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //build the sql statement
    $stmt = $conn->prepare("SELECT breeder.breedercode, breeder.name, breeder.phone,pets.price,pets.status,pets.number 
    FROM breeder INNER JOIN pets ON breeder.breedercode = pets.breedercode where pets.breedcode=? and number>0");
    $stmt->bindParam(1, $breedcode);
    $stmt->execute();
    $c = $stmt->rowcount();
    if ($c > 0) {
        //loop through the rows & push them into array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($breeder_array, $row);
        }
    } else {
        $msg = "Breeders not found";
        header("location:customeroutput.php?msg=$msg");

    }
} catch (Exception $e) {
    $msg = $e->getMessage();
}
?>
<html>

<head>
    <title>breeder details</title>
    <?php
    include("header_link.php");
    ?>
</head>

<body class="sub_page">
    <?php
    include("header.php");
    ?>
    <h3>list of breeders</h3>
    <?php
    if ($c > 0) {
        ?>
        <table border="5" cellspadding="20">
            <thead>
                <th>Breedercode</th>
                <th>Breedername</th>
                <th>Contact no </th>
                <th>Price</th>
                <th>number</th>
                <th>Available</th>

            </thead>
            <?php
            for ($i = 0; $i < count($breeder_array); $i++) {
                echo "<tr> ";
                // echo "<td><a href=viewnature.php?breedcode=$bc>".$breed_array[$i]["breedcode"]."</a></td>";
                echo "<td>" . $breeder_array[$i]["breedercode"] . "</td>";
                echo "<td>" . $breeder_array[$i]["name"] . "</td>";
                echo "<td>" . $breeder_array[$i]["phone"] . "</td>";
                echo "<td>" . $breeder_array[$i]["price"] . "</td>";
                echo "<td>" . $breeder_array[$i]["number"] . "</td>";
                echo "<td>" . $breeder_array[$i]["status"] . "</td>";
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