<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Enprumt</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body style="background:turquoise;background-size:100%">>
        <?php

            //connexion à la BD
            include('connection.php');
            if (!isset($_GET['id'])) {
                exit("identifiant non fourni.");
            }
            //récupération du num dans le lien
            $num = $_GET['id'];
            //requête pour afficher les infos d'un employé
            $req = $connection->prepare('SELECT* FROM enprumt WHERE id=:id');
            $req->bindParam(':id', $id);
            $req->execute();
            $row = $req->fetch();

            //Vérifier que le boutton a bien été cliqué
            if(isset($_POST['button'])){
            //extraction des informations envoyé ds des var par la methode POST
                extract($_POST); 
                //vérifions que tous les champs ont été remplis
                if (isset($nom_client) && isset($numero_compte) && isset($number) && isset($email) && isset($montant_enprumt) && isset($taux) && isset($montant_du) && isset($agence) && isset($date_enprumt) && $date_retour ) {
                    //requête de modification
                    $req = $connection->prepare('UPDATE enprumt SET nom_client =:nom_client, numero_compte =:numero_compte, number =:number, email =:email, montant_enprumt =:montant_enprumt, taux =:taux, montant_du =:montant_du, agence =:agence, date_enprumt =:date_enprumt, date_retour =:date_retour);');
                    $req->bindParam(':nom_client', $nom_client);
                    $req->bindParam(':numero_compte', $numero_compte);
                    $req->bindParam(':number', $number);
                    $req->bindParam(':email', $email);
                    $req->bindParam(':montant_enprumt', $montant_enprumt);
                    $req->bindParam(':taux', $taux);
                    $req->bindParam(':montant_du', $montant_du);
                    $req->bindParam(':agence', $agence);
                    $req->bindParam(':date_enprumt', $date_enprumt);
                    $req->bindParam(':date_retour', $date_retour);

                    if($req->execute()){
                        header("location:in.php");
                    }else{
                        print("Aucune modification dans la table.");

                    }
            
                    } else{
                    $message = "Veuillez remplir tous ces champs !";
                }       
            }
        ?>



    <div class="form">
        <a href="in.php" class="back_btn"><img src="">Retour</a>
        <h2>Modifier un client:<?=$row['nom_client']?> </h2>
        <p class="erreur_message">
        <?php
            //si la var msg esiste, affichons son contenu
            if (isset($message)){
                echo $message;
            }
        ?>
        </p>      
        <form action="" method="POST"> 
        <label>nom du client</label>
            <input type="varchar" name="nom_client">

            <label>numero de compte </label>
            <input type="int" name="numero_compte">

            <label>numero de téléphone</label>
            <input type="varchar" name="number">

            <label>email</label>
            <input type="varchar" name="email">

            <label>montant de enprumt</label>
            <input type="double" name="montant_enprumt">

            <label>taux</label>
            <input type="float" name="taux">

            <label>montant à renbourser</label>
            <input type="double" name="montant_du">
             
            <label>agence</label>
            <input type="varchar" name="agence">

            <label>date de l'enprumt</label>
            <input type="date" name="date_enprumt">

            <label>date de retour</label>
            <input type="date" name="date_retour">


            <input type="submit" value='Modifier' name="button"  >


        </form>


    </div>

</body>
</html>