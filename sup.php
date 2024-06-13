<?php include('connection.php');

if (isset($_GET['id'])){
    extract($_GET);
    $req = $connection->prepare('DELETE FROM enprumt WHERE id =:id ');
    $req->bindParam(':id', $id);
    $req->execute();
    if($req){
        header('location:in.php');
    }
}
else{
    print("probleme de Suppresion");
}

?>