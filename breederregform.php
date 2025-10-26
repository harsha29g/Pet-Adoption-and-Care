<html>
    <head> 
        <title>Breeder registration</title>
        <?php
    include("headerlink.php");
    ?>
    <script>
            function validate()
            {
                var textphonepattern=/^[0-9]{10}$/;
                var tphone=document.forms["regform"]["phone"].value;
                if(tphone.search(textphonepattern)==-1)
                {
                    document.getElementById("phoneresult").innerHTML="Phone number should contain only digits and minimum10";
                    return false;
                }

                var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;s
            }
        </script>
    </head>
    <body class="sub_page">
    <?php
    include("header.php");
    ?>

        <table border="0px" align="center">
    <form method="POST" action="breederreg.php">
        <h3>BREEDER REGISTATION
</h3>
        <tr>
            <td>Name :</td>
        <td><input type="text" name="uname" id="uname" required minlength="5" maxlength="20"></td>
</tr>
<tr>
        <td>Phone :</td>
        <td><input type="text" name="phone" id="phone" required minlength="10" maxlength="10"></td>
</tr>
      <tr> <td> Email Id :</td>
      <td><input type="email" name="mail" id="mail" required></td></tr>
      <tr><td>
        Address :</td>
        <td><input type="text" name="address" id="address" required></td></tr>
        <tr>
            <td>Account no:</td>
            <td><input type="text" name="acno" id="acno" required minlength="12" maxlength="16"></td>
        
       <tr> <td>Password :</td>
       <td> <input type="password" name="pswd" id="pswd" required></td></tr>
       <tr><td> Re-enter password :</td>
       <td> <input type="password" name="repswd" id="repswd" ></td></tr>
        <tr>
        <tr><td> Pay :</td>
       <td> <input type="checkbox" name="radiop" id="radiop" required checked></td></tr>
        <tr>
            <P>Registration fees Rs.500</P>
       <td><td> <input type="submit" value="submit" name="btn" id="btn"></td></td></tr>
</table>
<?php
        include("footer.php");
        ?>
    </form>
    <script>
            document.getElementById("Confirmpassword").addEventListener("blur",function(){

                var npassword=document.getElementById("pswd").value;
                var cpassword=document.getElementById("repswd").value;
                if(npassword!=cpassword)
                {
                    var msg="New password and confirm password do not match";
                    document.getElementById("result").innerHTML=msg;
                    document.getElementById("btn").disabled=true;
                }
                else
                {

                document.getElementById("btn").disabled=false;
                document.getElementById("result").innerHTML="";
                    
                }
            });
            </script>
</body>
</html>