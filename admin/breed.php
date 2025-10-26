<?php
 $breedname=$_POST["brname"];
 $category=$_POST["category"];
 $origin=$_POST["origin"];
 $height=$_POST["height"];
 $weight=$_POST["weight"];
 $lifespan=$_POST["lifespan"];
 $nature=$_POST["nature"];
 $price=$_POST["price"];
 $status="";
 $msg="";
try
{
    
            if(isset($_FILES["file1"]["type"]))
            {
                $validextensions=array("jpeg","jpg","png");
                //split file,extension and store into $temporary
                $temporary=explode(".",$_FILES["file1"]["name"]);
                //get file extension from $temporary variable
                $file_extension=end($temporary);
                //check the mine type provided by the browser
                if((($_FILES["file1"]["type"]=="image/png")
                    ||($_FILES["file1"]["type"]=="image/jpg")
                    ||($_FILES["file1"]["type"]=="image/jpeg"))
                    &&($_FILES["file1"]["size"]<5000000000)
                    &&in_array($file_extension,$validextensions))
                    {
                        //if file was not upload correctly or partially uploaded,rreturns 0 if valid
                        if($_FILES["file1"]["error"]>0)
                            $msg=$_FILES["file1"]["error"];
                        //check if file is already uploaded
                        else if(file_exists("photos/".$_FILES["file1"]["name"]))
                            $msg="This File Already Exists.";
                            // header("location:adminoutput.php?msg=$msg");
                        else
                        {
                            $sourcePath=$_FILES['file1']['tmp_name'];
                            $targetPath="photos/".$_FILES['file1']['name'];
                            move_uploaded_file($sourcePath,$targetPath);
                            $photo=$targetPath;
                            $status="ok";
                        }
                    }
                    else
                    {
                        $msg="Invalid File Size or Type";
                        header("location:adminoutput.php?msg=$msg");
                    }
            }
    else
    {
        $msg="Please Select File";
        header("location:adminoutput.php?msg=$msg");
    }
    if($status=="ok")
    {

    $conn=new PDO("mysql:host=localhost;dbname=pet","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt=$conn->prepare("insert into breed(breedname,category,origin,height,weight,lifespan,nature,photo,price) values(?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1,$breedname);
    $stmt->bindParam(2,$category);
    $stmt->bindParam(3,$origin);
    $stmt->bindParam(4,$height);
    $stmt->bindParam(5,$weight);
    $stmt->bindParam(6,$lifespan);
    $stmt->bindParam(7,$nature);
    $stmt->bindParam(8,$photo);
    $stmt->bindParam(9,$price);
    $stmt->execute();
    $c=$stmt->rowcount();
    $msg="image added";
    header("location:adminroutput.php?msg=$msg");
    if($c>0)
    {
        $msg="Breed Added";
        header("location:adminoutput.php?msg=$msg");
    }
    else
    {
        $msg="Adding Failed";
        header("location:adminoutput.php?msg=$msg");
    }
    }
    else
    {
        $msg="Adding Failed";
        header("location:adminoutput.php?msg=$msg");
    }
}
    
    catch(Exception $e)
{
    $msg=$e->getMessage();
}
?>
<html>
    <body>
        <?php
      
        ?>
</body>
    </html>