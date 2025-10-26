<html>

<head>
    <title>Search by nature</title>
    <?php
        include("header_link.php");
        ?>
</head>

<body class="sub_page">
<?php
    include("header.php");
    ?>
    <form method="post" action="search.php">
        <table align="center">
            <!-- <tr>
                <td>Nature :</td>
                <td><input type="text" name="nature" id="nature"></td>
            </tr> -->
            <label>Search : </label>
            <select name="nature" id="nature">
            <option value="lovely">lovely</option>
            <option value="active">active</option>
            <option value="powerful">powerful</option>
            <option value="friendly">friendly</option>
            <option value="intelligent">intelligent</option>
            </select>
            <tr>
                <td><input type="submit" value="search" name="btn" id="btn"></td>
            </tr>
        </table>
        <?php
    include("footer.php");
    ?>
    </form>
</body>