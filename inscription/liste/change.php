<?php
include ("base.php");


if(isset($_GET))
{
  $id=$_GET["id"];
  /* var_dump($id);die; */

$sql = "SELECT * from employe WHERE etat=0 AND id=$id";
$select=$conn->prepare($sql);
$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

  if($row['country']=='user'){
    $req_sql="UPDATE employe SET country = 'admin' WHERE id=$id";
    $req=$conn->prepare($req_sql);
    $req->execute();
    header('location: liste_active.php');

  }
  else{
    $req_sql="UPDATE employe SET country = 'user' WHERE id=$id";
    $req=$conn->prepare($req_sql);
    $req->execute();
    header('location: liste_active.php');
  }
}
?>