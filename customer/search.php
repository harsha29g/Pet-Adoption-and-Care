<?php
$msg = "";
$c = 0;
$nature = $_POST["nature"];
try {
    $nature_array = array();

    //connect to database
    $conn = new PDO("mysql:host=localhost;dbname=pet", "root", null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $s = "%$nature%";
    //build the sql statement
    $stmt = $conn->prepare("select * from breed where nature like(?)");
    $stmt->bindParam(1, $s);
    $stmt->execute();
    $c = $stmt->rowcount();
    if ($c > 0) {
        //loop through the rows & push them into array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($nature_array, $row);
        }
    } else {
        $msg = "breed not found";
        header("location:customeroutput.php?msg=$msg");
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
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
    if ($c > 0) {
        ?>
        <table border="5" cellpadding="15">
            <thead>
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
            for ($i = 0; $i < count($nature_array); $i++) {
                echo "<tr> ";

                echo "<td>" . $nature_array[$i]["breedname"] . "</td>";
                echo "<td>" . $nature_array[$i]["category"] . "</td>";
                echo "<td>" . $nature_array[$i]["origin"] . "</td>";
                echo "<td>" . $nature_array[$i]["height"] . "</td>";
                echo "<td>" . $nature_array[$i]["weight"] . "</td>";
                echo "<td>" . $nature_array[$i]["lifespan"] . "</td>";
                echo "<td>" . $nature_array[$i]["nature"] . "</td>";
                echo "<td><img src=../admin/" . $nature_array[$i]["photo"] . " height=150 width=150></td>";
                echo "<td>" . $nature_array[$i]["price"] . "</td>";
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