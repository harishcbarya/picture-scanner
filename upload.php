<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Scanner</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">


</head>

<body >

    <div class="container">
        <div class="content">
            <div class="row mt-5">
                <h1 class="text-light text-center">Upload Image</h1>
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <form action="" method="POST">
                       
                        <div class="form-group mt-3">
                            <Label>Name</Label>
                            <input type="text" name="img_name" placeholder="Enter Image Name" class="form-control mt-2" required>
                        </div>
                        <div class="form-group mt-3">
                            <Label>Upload Image</Label>
                            <input type="file" name="upload_img"  class="form-control mt-2" required>
                        </div>
                        
                        <div class="form-group mt-3">
                            <input type="submit" value="Submit" name="upload" class="btn btn-primary">       
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  


</body>

</html>

<?php 


    
 if (isset($_POST['upload']))
{
    // include_once  "connection.php";
    // include "connection.php";
    // global $conn;


    // $server = 'Localhost';
    // $name  = 'root';
    // $password = "";
    // $database = 'img_scanner';

    // $conn = new mysqli($server,$name,$password,$database);

    // if ($conn->connect_error){

    //     die("Connection Failed:" .$conn->connect_error );

    // }

    // echo "Connection Success";
           
    include ('connection.php');
    
    $name = $_POST['img_name'];
    $up_img = $_POST['upload_img'];

    $sql = "INSERT INTO imgs (img_name, img_es)
    VALUES ('$name', '$up_img')";

    $query_run = mysqli_query($conn,$sql);

    if($query_run){
        echo "<script type = 'text/javascript'> alert ('Image Uploaded')</script>";
   
             header("Location: upload.php");
             exit();
    }
    else{
        echo "<script type = 'text/javascript'> alert ('Error in Uploading')</script>";
    }
   
}





?>