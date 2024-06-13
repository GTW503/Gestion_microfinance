<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body style="background:turquoise;background-size:100%">>
    <div class="container">
        <a href="a.php" class="Btn_add"><img src="imag/plus.png">Ajouter</a>

    <table>
        <tr id="items">
            <th>Date du remboursement</th>
            <th>Nom & prénom </th>
            <th>Numéro de compte</th>
            <th>Montant du crédit</th>
            <th>Durée</th>
            <th>Montant restant</th>
            <th>Date à échéance</th>
            <th>Retard paiement</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>

        <?php
        //inclure la page de connexion
        include_once "connection.php";
        //requête pour afficher la liste des employés
        $req = $connection->prepare('SELECT* FROM rembourse');
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
                    <td><?=$row['dateRem']?></td>
                    <td><?=$row['nom']?></td>
                    <td><?=$row['num']?></td>
                    <td><?=$row['credit']?></td>
                    <td><?=$row['dure']?></td>
                    <td><?=$row['restant']?></td>
                    <td><?=$row['echean']?></td>
                    <td><?=$row['retard']?></td>
                    <!-- mettons le num dans ce lien -->
                    <td><a href="m.php?num=<?=$row['num']?>"><img src="imag/modif.png"></a></td>
                    <td><a href="s.php?num=<?=$row['num']?>"><img src="imag/corb.png"></a></td>

                </tr>
                <?php
            }
        }

        ?>
    </table>
</div>


</body>
</html>