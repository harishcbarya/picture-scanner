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
                <div class="col-6 offset-3">
                    <h1 class="text-capitalize text-center">image scan</h1>
                </div>

            </div>
            <div class="row">
                <div class="col-6 offset-3">
                   <?php 
                        include "connection.php";
                   ?>
                    <form method="POST" action="" enctype="multipart/form-data">
                        
                        <div id="mycam">


                        </div>
                        <!-- <div id="result" style = "visibility: hidden; position: absolute;"> -->
                        <!-- <div id="result" name="find_img" > -->


                        <!-- </div> -->
                      
                        <div class="form-group mt-3">
                            <!-- <button type="submit" class="btn btn-primary" onclick="configure();">Scan</button> -->
                            <!-- <input type="button" value="Scan" onclick="configure();" class="btn btn-primary"> -->
                            <input type="file" value="Upload" name="uploadfile" class="btn btn-primary">
                            <!-- <input type="text" name="name" placeholder="name"> -->
                            <!-- <input type="button" value="Find" onclick="save_snap();" name="find" class="btn btn-primary"> -->
                            <input type="submit" value="Find" name="find" class="btn btn-primary">
                         
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>


    <?php

    if(isset($_POST["find"]))
    {
        include "connection.php";

        // $find_img = $_POST["find_img"];
        // echo $find_img;
        
        $name = $_FILES["uploadfile"]["name"];
    
        // echo $name;

        $query = "SELECT * FROM imgs WHERE img_es = '".$name."'";
        // $query = "SELECT * FROM imgs";
          
        $query_run = mysqli_query($conn, $query);
    ?>
      
      <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image Name</th>
                <th>Image</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                 
                    if(mysqli_num_rows($query_run) > 0) {
                        foreach($query_run as $row){
                      
                ?>
                       <tr>
                          <td><?php echo $row['id']?></td>
                          <td><?php echo $row['img_name']?></td>
                          <td>
                            <img src="<?php echo "uploaded_images/".$row["img_es"]?>" width='100px'>
                          </td>
                       </tr>
                            
                <?php
                    }  
              
                   
                    }   
                   
                    else{
                    ?>
                        <tr>
                            <td>Record not Found</td>
                        </tr>
                        
                   <?php 
                   }
                   ?>     
                   

            </tr>
        </tbody>
      </table>
        
    <?php    
    }
    
    ?>    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- <script src="webcam/datatables.min.js"></script> -->
    <script src="webcam/webcam.min.js"></script>

    <!-- <script>
        function configure() {
            Webcam.set({
                width: 480,
                height: 480,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#mycam');
        }

        function save_snap(){
            Webcam.snap(function(data_uri){
                document.getElementById('result').innerHTML = 
                '<img id = "web" src = "'+data_uri+'">'
            });


        }
    </script> -->



</body>

</html>
