<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title> 
    <link rel="stylesheet" href="css/all.css">   
</head>
<style>
  .inner-header{
    background-color:#FF5F00 !important ;
}
.registerbtn {
    background-color: #FF5F00 ;
    color: white;
    padding: 5px 20px;
    margin: 5px 0;
    border-style: solid;
    border-width: 3px;
    border-color: white;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }

  .trans {
  position: absolute;
  border: 5px solid #FF5F00 ;
  width: 50px;
  height: 50px;
  top: 750px;
 left: 35px;
  text-align:center;

  }

</style>

<body>


<header>
<nav class="inner-header navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
              <a class="navbar-brand col-7" style="color: aliceblue; font-size: 35px;" href="#">Quiz Code</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class=" collapse navbar-collapse" id="navbarNav">
                <ul class="col-8  justify-content-between navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" style="color: aliceblue; font-size: 20px;"  href="index.php"><i class="bi bi-house"></i>Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" style="color: aliceblue; font-size: 20px;" href="profile.php" >profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="color: aliceblue; font-size: 20px;" href="qes.html" >Quiz</a>
                  </li>
                
                <li class="nav-item"> 
                 <a class="nav-link registerbtn"  href="logout.php" style="color: aliceblue; font-size: 20px;" >logout</a>
                </li>
                </ul>
              </div>
            </div>
          </nav>
        
    
  </header>


  <div class="text-center mt-5">
  <a href="qes.html"><img src="ready.jpg" class="rounded" alt="..."></a>
</div>
<div class="text-center mt-5">
<h3>click on photo to start your Quiz</h3>
</div>


<div class="trans"> <a href="profilear.php">AR</a></div>
  



</body>
</html>
