<?php
try {
    $conn = new PDO("mysql:host=sql305.infinityfree.com;dbname=if0_40257700_pet", "if0_40257700", "RpBWjTj0M1sPEA");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>