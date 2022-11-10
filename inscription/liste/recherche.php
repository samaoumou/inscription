<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

<?php
include("base.php");
if(isset($_POST['submit'])){
      $mat=$_POST['search'];
      /*  $search=$_GET['search']; */
      $select=$conn->prepare("SELECT firstName, lastName, email from employe WHERE firstName=:firstName and etat= 0");
      $select->execute(['firstName' => $mat]);
      $row=$select->fetch(PDO::FETCH_ASSOC);
}
?>  
      <a href="liste_active.php" class="retour"><span class="material-symbols-outlined">assignment_return</span></a>
      <div class="centre">
      <table class="lion">
         <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>
         </tr>
         <td>
            <p class="centre1"><?= $row['firstName']; ?></p>
         </td>
         <td>
         <p class="centre1"><?= $row['lastName']; ?></p>
         </td>
         <td>
         <p class="centre1"><?= $row['email']; ?></p>
         </td>
      </table>
      </div>
  <style>
   .centre{
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 300px;
      border: 5px solid blue;
      background-color: rgb(0,30,94);
   }
   .lion{
    background-color: #FFFF;
    height: 150px;
    width: 50%;
   }
   td, th{
      border: 2px solid blue;
   }
   .retour{
      background-color: #FFFF;
      text-decoration: none;
   }
   .centre1{
      display: flex;
      justify-content: center;
   }
  </style>    

