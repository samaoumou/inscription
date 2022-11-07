

<?php
include("base.php");
if(isset($_POST['submit'])){
      $mat=$_POST['search'];
      /*  $search=$_GET['search']; */
      $select=$conn->prepare("SELECT firstName, lastName, email from employe WHERE matricule=:matricule and etat= 0");
      $select->execute(['matricule' => $mat]);
      $row=$select->fetch(PDO::FETCH_ASSOC);

}
?> 

      <a href="page_users.php" class="retour">Retour</a>
      <div class="centre">
      <table class="lion">
         <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>
         </tr>
         <td>
            <?= $row['firstName']; ?>
         </td>
         <td>
            <?= $row['lastName']; ?>
         </td>
         <td>
            <?= $row['email']; ?>
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
  </style>    

