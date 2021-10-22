<?php


$serveur="localhost";
$user="root";
$pw="";
$bdd="services";

$cnpstock= new mysqli($serveur,$user,$pw,$bdd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
  

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

  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" name="email" class="form-control"  placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">password</label>
    <input type="password" name="password"class="form-control"  placeholder="password">
  </div>
 
  <button type="submit"  name="submit" class="btn btn-primary">Submit
  <?php
             if(isset($_POST['submit']))
             {
              $password = mysqli_real_escape_string($cnpstock, $_POST['password']); 

                 $req="select * from users where email='".$_POST['email']."' "; 
                if($resultat=mysqli_query($cnpstock,$req))
                {
                  if(mysqli_num_rows($resultat) == 1){
 
                  while($ligne = mysqli_fetch_assoc($resultat)){ 
                   if(password_verify($password, $ligne['password'])){

                       session_start();
                       $_SESSION['email']=$_POST['email'];
                       header('Location: index.php');
                      } else{
                        echo "error";
                    } 
                  }       
              }
            
            }
        
          }
             ?>
  </button>
  
</form>
<a href="register.php">register</a>

</div>
</body>
</html>
</body>
</html>