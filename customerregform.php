<html>
    <head> 
        <title>customer registration</title>
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
            <h3>Customer Registration</h3>
    <form method="POST" action="customerreg.php">
        <tr>
            <td>Name :</td>
        <td><input type="text" name="uname" id="uname" required maxlength="20" minlength="5"></td>
</tr>
<tr>
        <td>Phone :</td>
        <td><input type="text" name="phone" id="phone" required maxlength="10" minlength="10"></td>
</tr>
      <tr> <td> Email Id :</td>
        <td><input type="email" name="mail" id="mail" required></td></tr>
       <tr> <td>Password :</td>
       <td> <input type="password" name="pswd" id="pswd" required maxlength="8" minlength="6"></td></tr>
       <tr><td> Re-enter password :</td>
       <td> <input type="password" name="repswd" id="repswd" required maxlength="8" minlength="6"></td></tr>
        <tr>
       <td><td> <input type="submit" value="submit" name="btn" id="btn" required></td></td></tr>
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