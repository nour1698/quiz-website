

<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home.css">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Quiz Code</title>
  
  <link rel="icon" href="q3.jpg">

</head>
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
                    <a class="nav-link active" style="color: aliceblue; font-size: 20px;"  href="index.php">Home</a>
                  </li>


                  <?php 
        if(isset($_SESSION['user'])){  
               ?> <li class="nav-item">
                    <a class="nav-link"  style="color: aliceblue; font-size: 20px;" href="profile.php" >profile</a>
                  </li>
             
                  <li class="nav-item">
                    <a class="nav-link" style="color: aliceblue; font-size: 20px;" href="qes.html" >Quiz</a>
                  </li>
                  <li class="nav-item"> 
                 <a class="nav-link registerbtn"  style="color: aliceblue; font-size: 20px; " href="logout.php"  >logout</a>
                </li>
                  <?php
                }else{ ?>
                  <li class="nav-item"> 
                 <a class="nav-link registerbtn"  style="color: aliceblue; font-size: 20px; " href="register.php">Sing-up</a>    
                </li>
                 <li class="nav-item"> 
                 <a class="nav-link registerbtn"  style="color: aliceblue; font-size: 20px; " href="login.php"  >login</a>
                </li>
          

                <?php
        }
    ?>
              
        

                </ul>
              </div>
            </div>
          </nav>
          <div class="header-content">
            <h1 class="head1">Do your Best.</h1>
            <h2 class="head2">Quiz Code</h2>
            <p class="prgrph1"> We are dedicated to the safety of our guests and employees and have updated our safety. We are dedicated to the safety of our guests and employees and have updated our safety.
            </p>

            <?php 
        if(isset($_SESSION['user'])){
            ?>
             <button class="quizbtn "><a class="nav-link" style="color:white" href="qes.html">Take Your Quiz</a></button>
            
          
            <?php
        }else{
            ?>
      
            <?php
        }
    ?>
          
        </div>

    
  </header>
 
</body>
