<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body style="background:turquoise;background-size:100%">>
        <?php

            //connexion à la BD
            include('connection.php');
            if (!isset($_GET['num'])) {
                exit("Numéro non fourni.");
            }
            //récupération du num dans le lien
            $num = $_GET['num'];
            //requête pour afficher les infos d'un employé
            $req = $connection->prepare('SELECT* FROM rembourse WHERE num=:num');
            $req->bindParam(':num', $num);
            $req->execute();
            $row = $req->fetch();

            //Vérifier que le boutton a bien été cliqué
            if(isset($_POST['button'])){
            //extraction des informations envoyé ds des var par la methode POST
                extract($_POST); 
                //vérifions que tous les champs ont été remplis
                if (isset($dateRem) && isset($nom) && isset($credit) && isset($dure) && isset($restant) && isset($echean) && $retard ) {
                    //requête de modification
                    $req = $connection->prepare('UPDATE rembourse SET dateRem=:dateRem, nom=:nom, credit=:credit, dure=:dure, restant=:restant, echean=:echean, retard=:retard WHERE num=:num ');

                    $req->bindParam(':dateRem', $dateRem);
                    $req->bindParam(':nom', $nom);
                    $req->bindParam(':credit', $credit);
                    $req->bindParam(':dure', $dure);
                    $req->bindParam(':restant', $restant);
                    $req->bindParam(':echean', $echean);
                    $req->bindParam(':retard', $retard);
                    $req->bindParam(':num', $num);

                    if($req->execute()){
                        header("location:i.php");
                    }else{
                        print("Aucune modification dans la table.");

                    }
                }
                else{
                    $message = "Veuillez remplir tous ces champs !";
                }       
            }
        ?>



    <div class="form">
        <a href="i.php" class="back_btn"><img src="">Retour</a>
        <h2>Modifier un client:<?=$row['nom']?> </h2>
        <p class="erreur_message">
        <?php
            //si la var msg esiste, affichons son contenu
            if (isset($message)){
                echo $message;
            }
        ?>
        </p>      
        <form action="" method="POST"> 
            <label>Date du remboursement</label>
            <input type="date" name="dateRem" value="<?=$row['dateRem']?>" >

            <label>Nom & prénom </label>
            <input type="text" name="nom" value="<?=$row['nom']?>" >

            <label>Montant du crédit</label>
            <input type="number" name="credit" value="<?=$row['credit']?>" >

            <label>Durée</label>
            <input type="number" name="dure" value="<?=$row['dure']?>" >

            <label>Montant restant</label>
            <input type="number" name="restant" value="<?=$row['restant']?>" >

            <label>Date à échéance</label>
            <input type="date" name="echean" value="<?=$row['echean']?>" >

            <label>Retard paiement</label>
            <input type="number" name="retard" value="<?=$row['retard']?>" >

            <input type="submit" value='Modifier' name="button"  >


        </form>


    </div>

</body>
</html>