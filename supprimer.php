<?php include('connection.php');

if (isset($_GET['num'])){
    extract($_GET);
    $req = $connection->prepare('DELETE FROM rembourse WHERE num =:num ');
    $req->bindParam(':num', $num);
    $req->execute();
    if($req){
        header('location:mfeedback.php');
    }
}
else{
    print("probleme de Suppresion");
}

?>