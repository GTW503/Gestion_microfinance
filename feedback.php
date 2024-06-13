<?php
session_start();
if(!isset($_SESSION['userId'])){ header('location:mfeedback.php');}
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
<body style="background: url(images/home.jpg);background-size: 80%">
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
        <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="accounts.php">Compte</a></li>
      <li class="nav-item ">  <a class="nav-link" href="statements.php">Relevé de Compte</a></li>
      <li class="nav-item ">  <a class="nav-link" href="transfer.php">Transfert de fond</a></li>
     


    </ul>
    <?php include 'sideButton.php'; ?>
  </div>
</nav><br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
  Carte d'aide
  </div>
  <div class="card-body">
      <form method="POST">
          <div class="alert alert-success w-50 mx-auto">
            <h5>Entrer votre message</h5>
            <textarea class="form-control" name="msg" required placeholder="écrivez votre message"></textarea>
            <button type="submit" name="send" class="btn btn-primary btn-block btn-sm my-1">Envoyer</button>
          </div>
      </form>
      
    <br>
  
    <?php
    if (isset($_POST['send']))
    {
      if (isset($_POST['msg']) && isset($_SESSION['userId'])) {
        // Assurez-vous que $_POST['msg'] et $_SESSION['userId'] sont correctement initialisés et sécurisés
    
        $message = $_POST['msg'];
        $userId = $_SESSION['userId'];
    
        // Préparer la requête avec des paramètres liés
        $stmt = $con->prepare("INSERT INTO feedback (message, userId) VALUES (?, ?)");
    
        // Liaison des paramètres
        $stmt->bind_param("si", $message, $userId);
    
        // Exécuter la requête préparée
        if ($stmt->execute()) {
            $successMessage = "Le message est parti avec succès!";
        } else {
            $errorMessage = "Erreur lors de l'envoi du message.";
        }
    }

    }
    
    ?>  
    <div class="form">
    <!-- ... Vos autres éléments de formulaire ... -->
    
    <?php if (isset($successMessage)) { ?>
        <p class="success-message"><?php echo $successMessage; ?></p>
    <?php } ?>
    
    <?php if (isset($errorMessage)) { ?>
        <p class="error-message"><?php echo $errorMessage; ?></p>
    <?php } ?>
</div>

  </div>
  <div class="card-footer text-muted">

  </div>
</div>

</div>
</body>
</html>