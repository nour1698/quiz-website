<?php

session_start();
if(isset($_SESSION['user'])){
    header('location:profile.php');
    exit();
}
if(isset($_POST['submit'])){
include 'conn-db.php';
   $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
   $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
   $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

   $errors=[];
   // validate name
   if(empty($name)){
       $errors[]="please write username";
   }elseif(strlen($name)>100){
       $errors[]="user is more than 100 character";
   }

   // validate email
   if(empty($email)){
    $errors[]="write email please";
   }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    $errors[]="inavalid email";
   }

   $stm="SELECT email FROM users WHERE email ='$email'";
   $q=$conn->prepare($stm);
   $q->execute();
   $data=$q->fetch();

   if($data){
     $errors[]="this email is aleady exist";
   }


   // validate password
   if(empty($password)){
        $errors[]="write password please ";
   }elseif(strlen($password)<6){
    $errors[]="your password is less than 6 characters";
}



   // insert or errros 
   if(empty($errors)){
      // echo "insert db";
      $password=password_hash($password,PASSWORD_DEFAULT);
      $stm="INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
      $conn->prepare($stm)->execute();
      $_POST['name']='';
      $_POST['email']='';

      $_SESSION['user']=[
        "name"=>$name,
        "email"=>$email,
      ];
      header('location:profile.php');
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
  margin-top:80px;
  box-shadow: 8px 8px rgba(0, 0, 0, 0.5);
 
}
.container2 {
  padding: 16px;
  background-color: white;
  width:30%;
  margin:auto;
  margin-top:30 px;

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

<form action="register.php" method="POST">

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
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="text"><b><i class="fa-solid fa-user"></i>User Name</b></label>
    <input type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" name="name" placeholder="name">

    <label for="email"><b><i class="fa-solid fa-envelope"></i>Email</b></label>
    <input type="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" name="email" placeholder="email">

    <label for="psw"><b><i class="fa-solid fa-lock"></i>Password</b></label>
    <input type="password" name="password" placeholder="password">


    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <input class="registerbtn" type="submit" name="submit" value="Register">

    <button  class="registerbtn"><a class="nav-link registerbtn"  href="google.php" > register by google</a></button>
    <!-- <button  class="registerbtn"><a class="nav-link registerbtn"  href="facebook.html" > register by facebook</a></button> -->


    <div class="container2 signin">
    <p  >Already have an account? <a href="login.php">login</a>.</p>
  </div>

  </div>
  

</form>

</body>
</html>
