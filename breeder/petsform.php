<?php
    session_start();
    $breedname=$_REQUEST["breedname"];
    $breedcode=$_REQUEST["breedcode"];
    $breedercode=$_SESSION["breedercode"];
    
?>
<html>
    <head>
        <title>Register pet</title>
        <?php
        include("header_link.php");
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
    <table border="0" align="center">
        <form method="POST" action="pets.php">
        <tr>
            <td>breeder code :</td>
            <td><input type="text" value="<?php echo $breedercode;?>" name="breedercode"> </td>
            </tr>
            
            <tr>
            <td>breed code :</td>
            <td> <input type="text" value="<?php echo $breedcode;?>" name="breedcode"> </td>
            </tr>
            <tr>
                <td>breed name :</td>
                <td><input type="text" value="<?php echo $breedname;?>"></td>
            </tr>
            <tr>
                <td>Price :</td>
                <td><input type="text" name="price" id="price" required minlength="1" maxlength="6"></td>
            </tr>
            <tr>
                <td>Status :</td>
                <td><input type="text" name="status" id="status" required minlength="2" maxlength="3"></td>
            </tr>
            <tr>
                <td>Number :</td>
                <td><input type="number" name="number" id="number" required minlength="1" maxlength="3"></td>
            </tr>
            
            <tr>
                <td><input type="submit" value="submit" name="btn" id="btn"></td>
            </tr>
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
    </table>
    <?php
    include("footer.php");
    ?>
    </body>
</html>