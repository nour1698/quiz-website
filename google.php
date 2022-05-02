

<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization


$login_button = '<a href="'.$google_client->createAuthUrl().'">Are you sure?OK</a>';
}
?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login using Google Account</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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


</style>
 </head>
 <body>

   <?php
   if($login_button == '')
   {

    echo '<header>
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
            
        
      </header>';

      echo '
      <div class="text-center mt-5">
      <a href="qes.html"><img src="ready.jpg" class="rounded" alt="..."></a>
    </div>
    <div class="text-center mt-5">
    <h2>click on photo to start your Quiz</h2>
    </div>
 
    ';













    
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
   

 </body>
</html>



