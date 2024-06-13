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
    <title>Enprumt</title>
    <link rel="stylesheet" href="style.css">
    <!-- Ajout des styles Bootstrap pour la barre de navigation -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background:turquoise;background-size:100%">

<!-- Barre de navigation -->
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
      <li class="nav-item ">
        <a class="nav-link active" href="in.php">Listes des enprumts<span class="sr-only">(Courant)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href="in.php">Retour<span class="sr-only">(Courant)</span></a>
      </li>
        </ul>
    </div>
</nav>
<body>
        <?php
            include('connection.php');
            //Vérifier que le boutton a bien été cliqué
            if(isset($_POST['button'])){
            //extraction des informations envoyé ds des var par la methode POST
                extract($_POST); 
                //vérifions que tous les champs ont été remplis
            
            $req = $connection->prepare('INSERT INTO enprumt (id, nom_client, numero_compte, number, email, montant_enprumt, taux, montant_du, agence, date_enprumt, date_retour)
            VALUES(:id, :nom_client, :numero_compte, :number, :email, :montant_enprumt, :taux, :montant_du, :agence, :date_enprumt, :date_retour)');
            $req->execute(array(
                'id' =>$id,
                'nom_client' =>$nom_client,
                'numero_compte' =>$numero_compte,
                'number' =>$number,
                'email' =>$email,
                'montant_enprumt'=>$montant_enprumt,
                'taux' =>$taux,
                'montant_du' =>$montant_du,
                'agence' =>$agence,
                'date_enprumt' =>$date_enprumt,
                'date_retour' =>$date_retour
            ));
            
            if($req){
                header("location:in.php");
            }else{
                print"Requette non  n'aboutie !";
            }
        }
        ?>


    <div class="form">
        <a href="in.php" class="back_btn"><img src="">Retour</a>
        <h2>Ajouter un nouvel enprumt</h2>
        <p class="erreur_message">
        
        <?php
            //si la var msg esiste, affichons son contenu
            if (isset($message)){
                echo $message;
            }
        ?>

        </p>      <form action="" method="POST"> 
            <label>nom du client</label>
            <input type="varchar" name="nom_client">

            <label>numero de compte </label>
            <input type="int" name="numero_compte">

            <label>numero de téléphone</label>
            <input type="varchar" name="number">

            <label>email</label>
            <input type="varchar" name="email">

            <label>montant de enprumt</label>
            <input type="double" name="montant_enprumt" id="montant_enprumt">

            <label>taux</label>
            <input type="float" name="taux" id="taux">

            <label>montant à rembourser</label>
            <input type="double" name="montant_du" id="montant_du" readonly>

            <label>agence</label>
            <input type="varchar" name="agence">

            <label>date de l'enprumt</label>
            <input type="date" name="date_enprumt">

            <label>date de retour</label>
            <input type="date" name="date_retour">

            <input type="submit" value='Enregistrer' name="button" >


        </form>


    </div>
    <script>
    // Get references to the input fields
    const montantEnprumtInput = document.getElementById('montant_enprumt');
    const tauxInput = document.getElementById('taux');
    const montantDuInput = document.getElementById('montant_du');

    // Add an event listener to the input fields
    montantEnprumtInput.addEventListener('input', calculateMontantDu);
    tauxInput.addEventListener('input', calculateMontantDu);

    // Function to calculate the montant à rembourser
    function calculateMontantDu() {
        const montantEnprumt = parseFloat(montantEnprumtInput.value);
        const taux = parseFloat(tauxInput.value);

        if (!isNaN(montantEnprumt) && !isNaN(taux)) {
            const montantDu = montantEnprumt + (montantEnprumt * (taux / 100));
            montantDuInput.value = montantDu.toFixed(2); // Display the calculated value
        } else {
            montantDuInput.value = ''; // Clear the value if inputs are not valid
        }
    }
</script>


</body>
</html>
