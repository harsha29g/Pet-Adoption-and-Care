<html>
<head>
<title>admin change password</title>
<?php
        include("header_link.php");
        ?>
</head>
<body class="sub_page">
<?php
    include("header.php");
    ?>
    <h4>Change Password</h4>
    <form method="post" action="changepswd.php">
        <table border="0" cellpadding="5">
            <tr>
                <td>Current Password</td>
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
                <td colspan="10">
                    <input type="submit" value="update" name="btn" id="btn">
                </td>
            </tr>
        </table>
    </form>
    <?php
    include("footer.php");
    ?>
</body>
</html>