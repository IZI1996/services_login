
<?php
$serveur="localhost";
$user="root";
$pw="";
$bdd="services";

$cnpstock= new mysqli($serveur,$user,$pw,$bdd);
session_start();
if( $_SESSION['email']){

$req="select * from users where email='".$_SESSION['email']."'";
$resultat=mysqli_query($cnpstock,$req);
$ligne=mysqli_fetch_assoc($resultat);
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
    <h1>Hello</h1>
<?php echo $ligne ['FirstName'] ?>	 <?php echo $ligne ['LastName'] ?>	                                 
<a href="logout.php">logout</a>



</body>
</html>
<?php
}
else{

  header("location:login.php");
}


?>