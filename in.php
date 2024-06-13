<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enprumt</title>
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
        <a class="nav-link active" href="aj.php">ajouter un enprumt<span class="sr-only">(Courant)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href="aj.php">Retour<span class="sr-only">(Courant)</span></a>
      </li>
        </ul>
    </div>
</nav>

    <table>
        <tr id="items">
            <th>id</th>
            <th>nom du client</th>
            <th>numero de compte </th>
            <th>numero de telephone</th>
            <th>email</th>
            <th>montant de l'enprumt</th>
            <th>taux</th>
            <th>montant a renbourser</th>
            <th>agence</th>
            <th>date de l'enprumt</th>
            <th>date de retour</th>
        </tr>

        <?php
        //inclure la page de connexion
        include_once "connection.php";
        //requête pour afficher la liste des employés
        $req = $connection->prepare('SELECT* FROM enprumt');
        $req->execute();
        if($req === 0){
            //S'il n'existe pas encore de D alors on affiche ce message
            echo "Il n'y pas encore de donnée saisie!";
        }
        else
        {
            //si non, affichons la liste.
            while($row = $req->fetch())
            {
                ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['nom_client']?></td>
                    <td><?=$row['numero_compte']?></td>
                    <td><?=$row['number']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['montant_enprumt']?></td>
                    <td><?=$row['taux']?></td>
                    <td><?=$row['montant_du']?></td>
                    <td><?=$row['agence']?></td>
                    <td><?=$row['date_enprumt']?></td>
                    <td><?=$row['date_retour']?></td>
                    <!-- mettons le num dans ce lien -->
                    <td><a href="mo.php?num=<?=$row['id']?>"><img src="imag/modif.png"></a></td>
                    <td><a href="sup.php?num=<?=$row['id']?>"><img src="imag/corb.png"></a></td>

                </tr>
                <?php
            }
        }

        ?>
    </table>
</div>


</body>
</html>