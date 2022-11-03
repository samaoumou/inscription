<?php  
 
include ("base.php");
session_start();
/* var_dump($_SESSION['firstName']);
die; */

?>
<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <meta charset="utf-8" />
  <title>Liste des fiches de procédures</title>
  <link rel="stylesheet" type="text/css" href="btn.css" />
 </head>
 
 <body>
 <header>
    <div class="div1">

    </div>
    <div class="div2">
        <p>
<?php 



?>



           <div class="profil">
           <h5>Prénom : </h5> <?php if(isset($_SESSION['firstName'])){echo '<h5>' .$_SESSION['firstName'].'</h5>';} ?> 
            <h5>Nom : </h5> <?php if(isset($_SESSION['lastName'])){echo '<h5>' .$_SESSION['lastName'].'</h5>';} ?>
            <h5>photo : </h5>  <?php  if(isset($_SESSION['photo'])){echo $_SESSION['photo'];} ?>
           </div>
            <!-- <span><a href="logout.php">Déconnexion</a></span> -->
        
    </div>
</header>
   <div class="">
         <a href="logout.php" class="lien"><span class="material-symbols-outlined">logout</span></a>   
         <form action="recherche.php" method="post">
         <div class="nnn">
              <input type="text" placeholder="recherche" name="search" class="recherche">
              <input type="submit" class="btn" name="submit" id="submit" value="Rechercher" class="btn"/>
         </div> 
         </form>
   </div>  
 <div class="blue">
   <img src="" alt="">
   <a href="archive.php" class="lar" onmouseover="bigImg(this)" onmouseout="normalImg(this)">Afficher la liste archivée</a>
   
  

        <?php
  try  //Connection a la bdd
  {
   $bdd = new PDO('mysql:host=localhost;dbname=inscription;charset=utf8', 'root', '');
  }
  catch (Exception $e)
  {
   die('Erreur : ' . $e->getMessage());
  }
  $reponse = $bdd->query('SELECT * FROM employe WHERE etat = 0');
  
        echo '<center><div class="liste"><table>';
        echo '<tr>';
        echo '<th class="thliste">Prénom</th>';
        echo '<th class="thliste">Nom</th>';
        echo '<th class="thliste">Role</th>';
        echo '<th class="thliste">Matricule</th>';
        echo '<th class="thliste">Email</th>';
        echo '<th class="thliste">Action</th>';
        echo '</tr>';
            while($donnees = $reponse->fetch()) // Renvoit les valeurs de la bdd
            {
    echo '<tr>';
      echo '<td class="tdliste">' . $donnees['firstName'] . '</td>';
      echo '<td class="tdliste">' . $donnees['lastName'] . '</td>';
      echo '<td class="tdliste">' . $donnees['country'] . '</td>';
      echo '<td class="tdliste">' . $donnees['matricule'] . '</td>';
      echo '<td class="tdliste">' . $donnees['email'] . '</td>';
      echo '<td class="tdliste bb" > 
            <a href="confirmS.php? id=' . $donnees["id"] . ' " onclick= return><span class="material-symbols-outlined">delete</span></a>
            <a href="modifier.php? id=' . $donnees["id"] . ' "><span class="material-symbols-outlined">border_color</span></a>
            <a href="change.php? id=' . $donnees["id"] . ' "><span class="material-symbols-outlined"> published_with_changes</span></a>         
            </td>';
      echo '</tr>';
               }
      echo '</table></div></center>';
            $pdo = null;
        ?>
 </div>
     <style> 
     table,td,th{
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
              
     }
     body{
      background-color: rgb(214, 214, 214); 
      /* background-image:  url("../img/logo-lareussite.png "); */
     }
     th, td{
      background-color: #FFFF;
     }
     .blue{
        background-color: rgb(0,30,94);
        width: 100%;
        height: 250px;
        display: flex;
        justify-content: center;
        border: 5px solid blue;

    }
    .liste{
    width:400px;
    margin:0 auto;
    margin-top:25%;
    display: flex;
    justify-content: center;
    align-items: center;
    }
    .bb{
      display: flex;
      /* flex-wrap: wrap; */
    }
    .recherche{
      height: 40px;
      float: right;
    }
    .main{
      width: 100%;
      background-color: rgb(0,30,94);
      float: left;
    }
    .lien{
      float: right;
    }
    .lar{
      float: right;
      background-color: #FFFF;
      height: 30px;
      text-decoration: none;
      color: #000;
    }
    tr{
      background-color: #FFFF;
    }
    .btn{
      background-color: green;
      color: #FFF;
      float: right;
    }
    .nnn{
      width: 100%;
      height: 100px;
    }
    .profil{
      width: 60%;
      height: 100px;
      
    }
    
    </style>
    <script src="../moi.js"></script>
    </body>
</html>