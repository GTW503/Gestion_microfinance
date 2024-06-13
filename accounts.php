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

</head>
<body style="background:url(images/8295.jpg);background-size: 100%">
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
        <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ">  <a class="nav-link" href="accounts.php">Compte</a></li>
      <li class="nav-item ">  <a class="nav-link" href="statements.php">Relevé de compte</a></li>
      <li class="nav-item ">  <a class="nav-link" href="transfer.php">Transfert de fond</a></li>

    </ul>
    <?php include 'sideButton.php'; ?>
   
  </div>
</nav><br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Information de votre compte
  </div>
  <div class="card-body">
    <table class="table table-striped table-dark w-75 mx-auto">
  <thead>
    <tr>
      <td scope="col">No.Compte</td>
      <th scope="col"><?php echo $userData['accountNo']; ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Agence</th>
      <td><?php echo $userData['branchName']; ?></td>
    </tr>
    <tr>
      <th scope="row">Code de l'Agence</th>
      <td><?php echo $userData['branchNo']; ?></td>
    </tr>
    <tr>
      <th scope="row">Type de compte</th>
      <td><?php echo $userData['accountType']; ?></td>
    </tr>
    <tr>
      <th scope="row">Compte créer</th>
      <td><?php echo $userData['date']; ?></td>
    </tr>
  </tbody>
</table>
      
  </div>
  <div class="card-footer text-muted">
 
  </div>
</div>

</div>
</body>
</html>