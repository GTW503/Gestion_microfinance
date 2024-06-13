<?php
session_start();
if(!isset($_SESSION['managerId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
  <?php if (isset($_GET['delete'])) 
  {
    if ($con->query("delete from useraccounts where id = '$_GET[delete]'"))
    {
      header("location:mindex.php");
    }
  } ?>
</head>
<body style="background: url(images/meba.png);background-size:90%">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
    <img src="images/hi.jpg" width="50" height="50" class="d-inline-block align-top" alt="">

  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="mindex.php">Home <span class="sr-only">(Courant)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="maccounts.php">Compte caissier</a></li>
      <li class="nav-item ">  <a class="nav-link" href="maddnew.php">Ajouter un nouveau compte</a></li>
      <li class="nav-item ">  <a class="nav-link" href="feedback.php">Feedback</a></li>
      <li class="nav-item ">  <a class="nav-link" href="emprunt.php">Emprunts</a></li>
      <li class="nav-item ">  <a class="nav-link" href="a.php">Remboursement</a></li>
     


    </ul>
    <?php include 'msideButton.php'; ?>
    
  </div>
</nav><br><br><br>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
  Tous les comptes
  </div>
  <div class="card-body">
   <table class="table table-bordered table-sm">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom du titulaire du compte</th>
      <th scope="col">Numéro de compte</th>
      <th scope="col">Nom de l'Agence</th>
      <th scope="col">Solde actuel</th>
      <th scope="col">Type de compte</th>
      <th scope="col">Contact</th>
      <th scope="col">Module de gestion</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i=0;
      $array = $con->query("select * from useraccounts,branch where useraccounts.branch = branch.branchId");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        {$i++;
    ?>
      <tr>
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['accountNo'] ?></td>
        <td><?php echo $row['branchName'] ?></td>
        <td>Rs.<?php echo $row['balance'] ?></td>
        <td><?php echo $row['accountType'] ?></td>
        <td><?php echo $row['number'] ?></td>
        <td>
          <a href="show.php?id=<?php echo $row['id'] ?>" class='btn btn-success btn-sm' data-toggle='tooltip' title="Afficher plus d'informations">Afficher</a>
          <a href="mnotice.php?id=<?php echo $row['id'] ?>" class='btn btn-primary btn-sm' data-toggle='tooltip' title="Envoyer un avis à cet destinataire">Envoyer un avis</a>
          <a href="mindex.php?delete=<?php echo $row['id'] ?>" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Supprimer mon compte">Supprimer</a>
        </td>
        
      </tr>
    <?php
        }
      }
     ?>
  </tbody>
</table>
  <div class="card-footer text-muted">
  
  </div>
</div>
</body>
</html>