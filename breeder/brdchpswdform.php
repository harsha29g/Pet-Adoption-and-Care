<html>
<head>
<title>breeder changepassword</title>
<?php
        include("header_link.php");
        ?>
</head>
<body class="sub_page">
<?php
    include("header.php");
    ?>
    <h4>Change Password</h4>
    <form method="post" action="brdchpswd.php">
        <table border="0" cellpadding="5">
            <tr>
                <td>Current password</td>
                <td><input type="password" name="currentpassword" id="currentpassword" required></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input type="password" name="newpassword" id="newpassword" required></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="confirmpassword" id="confirmpassword" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="update" name="btn" id="btn">
                </td>
            </tr>
        </table>
        <?php
    include("footer.php");
    ?>
    </form>
</body>
</html>