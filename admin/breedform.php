<html>
    <head> 
        <title>breed</title>
        <?php
        include("header_link.php");
        ?>
    </head>
    <body  class="sub_page">
    <?php
    include("header.php");
    ?>
<h2>Add Breed</h2>
        <table border="0px" align="center" cellpadding="5">
    <form method="POST" action="breed.php" enctype="multipart/form-data">
        <tr>
            <td>Breed-Name :</td>
        <td><input type="text" name="brname" id="brname"></td>
</tr>
<tr>
        <td>Category :</td>
        <td><select name="category" id="category">
            <option value="dog">Dog</option>
            <option value="cat">Cat</option> 
        </td>
</tr>
<tr>
         <td>Origin :</td>
       <td> <input type="text" name="origin" id="origin"></td>
    </tr>
    <td>Height :</td>
       <td> <input type="text" name="height" id="height"></td></tr>
       <td>Weight :</td>
       <td> <input type="text" name="weight" id="weight"></td></tr>
       <tr>
       <td>Life span:</td>
       <td> <input type="text" name="lifespan" id="lifespan"></td></tr>
       <td>Nature :</td>
       <td> <input type="text" name="nature" id="nature"></td></tr>  
       <td>Photo :</td>
       <td> <input type="file" name="file1" id="file1"></td></tr>
       <tr>
        <td> Price :</td>
       <td> 
        <input type="number" name="price" id="price"></td></tr>
        <tr>
       <td> <input type="submit" value="submit" name="btn" id="btn"></td></tr>
</table>
    </form>

    <?php
    include("footer.php");
    ?>
</body>
</html>