
<?php
session_start();
if(isset($_SESSION['user'])){
    header('location:profile.php');
    exit();
}
if(isset($_POST['submit'])){
 include 'conn-db.php';
   $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
   $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

   $errors=[];
   

   // validate email
   if(empty($email)){
    $errors[]="write email please";
   }


   // validate password
   if(empty($password)){
        $errors[]="write password please";
   }



   // insert or errros 
   if(empty($errors)){
   
      // echo "check db";

    $stm="SELECT * FROM users WHERE email ='$email'";
    $q=$conn->prepare($stm);
    $q->execute();
    $data=$q->fetch();
    if(!$data){
       $errors[] = "error ";
    }else{
        
         $password_hash=$data['password']; 
         
         if(!password_verify($password,$password_hash)){
            $errors[] = "error";
         }else{
            $_SESSION['user']=[
                "name"=>$data['name'],
                "email"=>$email,
              ];
            header('location:profile.php');

         }
    }
     
    
   }
}

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/all.css">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;

  background:url(t.jpg) no-repeat;

    background-size: cover;
 
}


* {
  box-sizing: border-box;
}


/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
  width:30%;
  margin:auto;
  margin-top:180px;
  box-shadow: 8px 8px rgba(0, 0, 0, 0.5);
 
}

.container2 {
  padding: 6px;
  background-color: white;
  width:30%;
  margin:auto;
  margin-top:30px;

}

/* Full-width input fields */
input[type=text], input[type=password] ,input[type=email]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color:#FF5F00;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
  width:100%
}
</style>
</head>
<body>

<form action="login.php" method="POST">
<?php 
        if(isset($errors)){
            if(!empty($errors)){
                foreach($errors as $msg){
                    echo $msg . "<br>";
                }
            }
        }
    ?>

  <div class="container">

    <h1>Login</h1>

    <hr>

    <label for="text"><b><i class="fa-solid fa-user"></i>User Name</b></label>
    <input type="text" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" name="email" placeholder="email">

 

    <label for="psw"><b><i class="fa-solid fa-lock"></i>Password</b></label>
    <input type="password" name="password" placeholder="password">


    <hr>
    

    <input class="registerbtn" type="submit" name="submit" value="Login">

    <div class="container2 signin">

    <p  ><a href="register.php">Do you want to register?</a><br><br>
 
  </div>

  </div>
  

</form>



</body>
</html>
