<?php
    session_start();
    $petcode=$_REQUEST["petcode"];
    
?>
<html>
    <head>
        <title>my pet</title>
        <?php
        include("header_link.php");
        ?>
    </head>
    <body class="sub_page">
    <?php
    include("header.php");
    ?>
    <table border="0" align="center">
        <form method="POST" action="update.php">
        <tr>
            <td>Pet code :</td>
            <td><input type="text" value="<?php echo $petcode;?>" name="petcode"> </td>
            </tr>
            <tr>
                <td>Number :</td>
                <td><input type="number" name="number" id="number"></td>
            </tr>
            
            <tr>
                <td><input type="submit" value="submit" name="btn" id="btn"></td>
            </tr>
        </form>
    </table>
    <?php
    include("footer.php");
    ?>
    </body>
</html>