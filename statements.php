<?php
session_start();
if(!isset($_SESSION['userId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
  <?php
    $error = "";
    if (isset($_POST['userLogin']))
    {
      $error = "";
        $user = $_POST['email'];
        $pass = $_POST['password'];
       
        $result = $con->query("select * from userAccounts where email='$user' AND password='$pass'");
        if($result->num_rows>0)
        { 
          session_start();
          $data = $result->fetch_assoc();
          $_SESSION['userId']=$data['id'];
          $_SESSION['user'] = $data;
          header('location:index.php');
         }
        else
        {
          $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
        }
    }

   ?>
</head>
<body style="background:url(images/rele.png);background-size: 100%">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
    <img src="images/hi.jpg" width="40" height="40" class="d-inline-block align-top" alt="">
   
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link " href="index.php">Home <span class="sr-only">(courant)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="accounts.php">Compte</a></li>
      <li class="nav-item active">  <a class="nav-link" href="statements.php">Relevé de compte</a></li>
      <li class="nav-item ">  <a class="nav-link" href="transfer.php">Transfert de fond</a></li>
    </ul>
    <?php include 'sideButton.php'; ?>
  </div>
</nav><br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
  Transaction effectuée sur votre compte
  </div>
  <div class="card-body">
    <?php 
      $array = $con->query("select * from transaction where userId = '$userData[id]' order by date desc");
      if ($array ->num_rows > 0) 
      {
         while ($row = $array->fetch_assoc()) 
         {
            if ($row['action'] == 'withdraw') 
            {
              echo "<div class='alert alert-secondary'>Vous avez retiré Rs.$row[debit] Depuis votre compte à $row[date]</div>";
            }
            if ($row['action'] == 'deposit') 
            {
              echo "<div class='alert alert-success'>Vous déposez Rs.$row[credit] Dans votre compte à $row[date]</div>";
            }
            if ($row['action'] == 'deduction') 
            {
              echo "<div class='alert alert-danger'>Une déduction a été effectuée pour Rs.$row[debit] Depuis votre compte à $row[date] En cas de $row[other]</div>";
            }
            if ($row['action'] == 'transfer') 
            {
              echo "<div class='alert alert-warning'>Le transfert a été effectué pour Rs.$row[debit] Depuis votre compte à $row[date] sur le compte no.$row[other]</div>";
            }

         }
      } 
    ?>  
  </div>
  <div class="card-footer text-muted">
 
  </div>
</div>

</div>
</body>
</html>