<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="styl.css">
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renboursement</title>
    <link rel="stylesheet" href="style.css">
    <!-- Ajout des styles Bootstrap pour la barre de navigation -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background:turquoise;background-size:100%">
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
      <li class="nav-item ">  <a class="nav-link" href="i.php">Listes des remboursements</a></li>
    </ul>
    <?php include 'msideButton.php'; ?>
    
  </div>
</nav><br><br><br>
</body>
<body>
        <?php
            include('connection.php');
            //Vérifier que le boutton a bien été cliqué
            if(isset($_POST['button'])){
            //extraction des informations envoyé ds des var par la methode POST
                extract($_POST); 
                //vérifions que tous les champs ont été remplis
            
            $req = $connection->prepare('INSERT INTO rembourse (num, dateRem, nom, credit, dure, restant, echean, retard)
            VALUES(:num, :dateRem, :nom, :credit, :dure, :restant, :echean, :retard)');
            $req->execute(array(
                'num' =>$num,
                'dateRem' =>$dateRem,
                'nom' =>$nom,
                'credit' =>$credit,
                'dure' =>$dure,
                'restant'=>$restant,
                'echean' =>$echean,
                'retard' =>$retard
            ));
            
            if($req){
                header("location:i.php");
            }else{
                print"Requette non  n'aboutie !";
            }
        }
        ?>


    <div class="form">
        <a href="i.php" class="back_btn"><img src="">Retour</a>
        <h2>Ajouter un Renboursement</h2>
        <p class="erreur_message">
        
        <?php
            //si la var msg esiste, affichons son contenu
            if (isset($message)){
                echo $message;
            }
        ?>

        </p>      <form action="" method="POST"> 
            <label>Date du remboursement</label>
            <input type="date" name="dateRem">

            <label>Nom & prénom </label>
            <input type="text" name="nom">

            <label>Montant du crédit</label>
            <input type="number" name="credit">

            <label>Durée</label>
            <input type="number" name="dure">

            <label>Montant restant</label>
            <input type="number" name="restant">

            <label>Date à échéance</label>
            <input type="date" name="echean">

            <label>Retard paiement</label>
            <input type="number" name="retard">

            <input type="submit" value='Enregistrer' name="button" >


        </form>


    </div>

</body>
</html>