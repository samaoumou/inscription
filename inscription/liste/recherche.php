<?php
include("base.php");

if(isset($_GET['search'])){
   if($_GET['search']!=""){
      
      $search=$_GET['search'];
      $select=$conn->prepare("SELECT * from employe WHERE etat=1 AND id!=$id AND matricule LIKE '%$search%' LIMIT 10");
      $select->execute();
      $row=$select->fetchAll(PDO::FETCH_ASSOC);

   }
}


?>