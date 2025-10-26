<?php
$msg = "";
$c = 0;
$petcode = $_REQUEST["petcode"];

try {

    //conncetion to database
    $conn = new PDO("mysql:host=localhost;dbname=pet", "root", null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //building sql statements
    $stmt = $conn->prepare("delete from pets where petcode=?");
    $stmt->bindParam(1, $petcode);
    $stmt->execute();
    $c = $stmt->rowcount();
    if ($c > 0) {
        $msg = "Deletion Successfull!";
        header("location:breederoutput.php?msg=$msg");
    } else {
        $msg = "Pet Not Found";
        header("location:breederoutput.php?msg=$msg");
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    ?>
</body>
</html>