<?php
session_start();
$breedercode = $_SESSION["breedercode"];
$msg = "";
$c = 0;
try {
    $breed_array = array();

    //connect to database
    $conn = new PDO("mysql:host=localhost;dbname=pet", "root", null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //build the sql statement
    $stmt = $conn->prepare("select pets.breedcode,breedname,petcode, pets.price,status,number,breedname from pets inner join breed on pets.breedcode=breed.breedcode where breedercode=?");
    $stmt->bindParam(1, $breedercode);
    $stmt->execute();
    $c = $stmt->rowcount();
    if ($c > 0) {
        //loop through the rows & push them into array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($breed_array, $row);
        }
    } else {
        $msg = "Pets Not Found";
        header("location:breederoutput.php?msg=$msg");
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
}
?>
<html>

<head>
    <title>pets</title>
    <?php
    include("header_link.php");
    ?>
</head>

<body class="sub_page">
    <?php
    include("header.php");
    ?>
    <h3 align="center">list of pets</h3>
    <?php
    if ($c > 0) {
        ?>
        <table border="5" align="center" cellpadding="5">
            <thead>
                <th>Breedcode</th>
                <th>Breedname</th>
                <th>Petcode</th>
                <th>Price </th>
                <th>Status</th>
                <th>Number</th>

            </thead>
            <?php
            for ($i = 0; $i < count($breed_array); $i++) {
                echo "<tr> ";
                echo "<td>" . $breed_array[$i]["breedcode"] . "</td>";
                echo "<td>" . $breed_array[$i]["breedname"] . "</td>";

                echo "<td>" . $breed_array[$i]["petcode"] . "</td>";
                echo "<td>" . $breed_array[$i]["price"] . "</td>";
                echo "<td>" . $breed_array[$i]["status"] . "</td>";
                echo "<td>" . $breed_array[$i]["number"] . "</td>";
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