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
 <form class="d-flex" role="search">
         <a class="btn btn-primary" href="../Admin/principale.php" role="button">Retour</a>
      </form>
  
    <h1 align=center> Liste des inscrits</h1>
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
        echo '<th class="thliste">Email</th>';
        echo '<th class="thliste">Action</th>';
        echo '</tr>';
            while($donnees = $reponse->fetch()) // Renvoit les valeurs de la bdd
            {
    echo '<tr>';
      echo '<td class="tdliste">' . $donnees['firstName'] . '</td>';
      echo '<td class="tdliste">' . $donnees['lastName'] . '</td>';
      echo '<td class="tdliste">' . $donnees['country'] . '</td>';
      echo '<td class="tdliste">' . $donnees['email'] . '</td>';
      echo '<td class="tdliste"> 
      <a href="supp.php? id=' . $donnees["id"] . ' " onclick="confirmer()"><span class="material-symbols-outlined"></span></a>
      <a href="edite.php? id=' . $donnees["id"] . ' " ><span class="material-symbols-outlined"></span></a>
      <a href="changer.php? id=' . $donnees["id"] . ' "><span class="material-symbols-outlined"></span></a>         
      </td>';
    echo '</tr>';
            }
    echo '</table></div></center>';
            $pdo = null;
        ?>

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
     th{
      background-color: blue;
     }
    </style>
    <script src="js.js"></script>
    </body>
</html>