<!DOCTYPE html>
<html lang="en">
  
<?php


$serveur="localhost";
$user="root";
$pw="";
$bdd="services";

$con= new mysqli($serveur,$user,$pw,$bdd);
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Document</title>
</head>
<body>
  <div class="container mt-5">
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Last name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1"  placeholder="Enter name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">First name</label>
    <input type="text" name="fname" class="form-control"  placeholder="first name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" name="email" class="form-control"  placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">password</label>
    <input type="password" name="password"class="form-control"  placeholder="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">password</label>
    <input type="password" name="pass1" class="form-control"  placeholder="Password Verification">
  </div>

 
 
  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
  <?php

  
 
if (isset($_POST['submit'])) {
    
    $fname	 = mysqli_real_escape_string($con, $_POST['fname']);
    $name	 = mysqli_real_escape_string($con, $_POST['name']);
    $email	 = mysqli_real_escape_string($con, $_POST['email']);
    $Password = mysqli_real_escape_string($con, $_POST['password']);
    $Password1 = mysqli_real_escape_string($con, $_POST['pass1']);

    $Passwordhash = password_hash($Password, PASSWORD_DEFAULT);
   
   
      
 
        $query= "INSERT INTO users(FirstName,LastName,email,password) 
                VALUES('$name','$fname','$email','$Password')";
        $result = mysqli_query($con, $query);
    if ($result == true && $Password==$Password1) {
        echo '<script>window.location.href = "login.php";
        </script>';
    }else{
        echo "Password confirmation doesn't match ";
    }
  }

  ?>
</form>
<a href="login.php">login</a>

</div>
</body>
</html>