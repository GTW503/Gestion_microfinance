<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background:blue;background-size: 100%">
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
                header("location:mfeedback.php");
            }else{
                print"Requette non  n'aboutie !";
            }
        }
        ?>


    <div class="form">
        <a href="mfeedback.php" class="back_btn"><img src="">Retour</a>
        <h2>Ajouter un client</h2>
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