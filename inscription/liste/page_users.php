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

 <div class="profil">
           <h5>Prénom :</h5> <?php if(isset($_SESSION['firstName'])){echo '<h5>' .$_SESSION['firstName'].'</h5>';} ?>
 </div>           
 <div class="profil">
          <h5>Nom :</h5> <?php if(isset($_SESSION['lastName'])){echo '<h5>' .$_SESSION['lastName'].'</h5>';} ?>
 </div>
 <div class="profil">
          <h5>photo :</h5>  <?php echo '<img src="data:image;base64,'.base64_encode($_SESSION["photo"]).'" style="width: 50px;height:50px;border-radius:50%;"/>'; ?>
 </div>           
            
           
 
 <body>
 <header>

<?php 



?>




            <!-- <span><a href="logout.php">Déconnexion</a></span> -->
        
    </div>
</header>
   <div class="">
         <a href="logout.php" class="lien"><span class="material-symbols-outlined">logout</span></a>   
         <form action="rec1.php" method="post">
         <div class="nnn">
              <input type="text" placeholder="recherche" name="search" class="recherche">
              <input type="submit" class="btn" name="submit" id="submit" value="Rechercher" class="btn"/>
         </div> 
         </form>
   </div>  
 <div class="blue">
  
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
      height: 30px;
    }
    .profil{
      width: 15%;
      height: 60px;
      display: flex;
      flex-wrap: wrap;
      background-color: #FFF;
      justify-content:space-around;
    }
    
    </style>
    <script src="../moi.js"></script>

<?php
 


    
    $reponse = $conn->query('SELECT COUNT(*) AS total FROM employe');
    $total_lignes = $reponse->fetch()['total'];
    $limite = 10;
    $nbre_pages = ceil($total_lignes / $limite);
    
    $page = (isset($_GET['page']) and $_GET['page']>0) ? $_GET['page'] : 1;
    $page = (isset($_GET['page']) and $_GET['page']>$nbre_pages) ? $nbre_pages : $page;
    $debut = ($page-1)*$limite;
    
    $reponse = $conn->prepare('SELECT * FROM employe WHERE etat=0 ORDER BY ID ASC LIMIT :debut, :limite ');
    $reponse->bindValue('debut',$debut, PDO::PARAM_INT);
    $reponse->bindValue('limite',$limite, PDO::PARAM_INT);
    $reponse->execute() || die('Impossible de charger la page');
    

    
    ?>
   <div class="centrer">

    <table>
<div>
<thead>
        <tr>
            <th>Numéro</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Matricule</th>
            <th>Email</th>
            <th>Date inscription</th>
        </tr>
</thead>
     <tbody>
        <?php
        for ($i=0; $i < $limite; $i++) 
        {
            $debut++; 
            echo '<tr>';
            if($debut<=$total_lignes)
            {
                echo '<td class="identifiant">' . ($debut) . '</td>';
            }
            else
            {
                echo '<td class="cellule_vide"></td>';
            }
            if($donnees = $reponse->fetch())
            {
                echo '<td class="centre">' . $donnees['firstName'] . '</td>';
                echo '<td class="centre">' . $donnees['lastName'] . '</td>';
                echo '<td class="centre">' . $donnees['matricule'] . '</td>';
                echo '<td class="centre">' . $donnees['email'] . '</td>';
                echo '<td class="centre">' . $donnees['date_inscription'] . '</td>';
               
            }
            else
            {
                echo '<td class="cellule_vide"></td>';
                echo '<td class="cellule_vide"></td>';
                echo '<td class="cellule_vide"></td>';
                echo '<td class="cellule_vide"></td>';
                echo '<td class="cellule_vide"></td>';
               
            }
            echo '</tr>';
        }
        ?>
        </tbody>
</div>
<div class="pg1">
<tfoot>
            <tr>
                <th colspan="7">
                <?php
                if($page>1)
                {
                ?> 
                    <a href="?page=<?php echo $page-1; ?>">&LeftTriangle;</a>
                <?php
                }
                else
                {
                ?>
                    <span class="invalide">&bemptyv;</span>
                <?php
                }
                for($i=1; $i<=$nbre_pages; $i++)
                {
                    if($i!=$page)
                    {
                        echo '<a href="?page=' . $i . '">' . $i . '</a> ';
                    }
                    else
                    {
                        echo '<span>' . $i . '</span> ';
                    }
                    
                }
                if($page<$nbre_pages)
                {
                ?>
                    <a href="?page=<?php echo $page+1; ?>">&RightTriangle;</a>
                <?php
                }
                else
                {
                ?>
                    <span class="invalide">&bemptyv;</span>
                <?php
                }
                ?>
                </th>
            </tr>
        </tfoot>
</div>
    </table>
    </div>
    </div>
<style>


  table tfoot tr th span.invalide
{
    color: red;
    background-color:#FFFF;
}
td,th
{
    border: 1px solid blue;
}
td.centre
{
    text-align: center;
    background-color: rgb(0,30,94);
}
table thead th
{
    background-color: #FFF;
    color: blue;
}
/* table tbody td.identifiant
{
    width: 15px;
    color: white;
    background-color: rgb(0,128,0);
} */
table tbody td
{
    background-color: rgb(0,30,94);
    color: white;
}
table tbody td.cellule_vide
{
    border: none;
}
table tfoot tr
{
    height: 23px;
}
table tfoot tr th
{
    border: none;
}
table tfoot tr th a, table tfoot tr th span
{
    display: inline-block;
    width: 30px;
    height: 20px;
    color: #c0c0c0;
}
table tfoot tr th a
{
    text-decoration: none;
    background-color: rgb(0,128,0);
    color: #FFF; 
}
table tfoot tr th a:active
{
    background-color: RGBa(0,0,255,0.5); 
}
table tfoot tr th span.invalide
{
    color: red;
    background-color: #c0c0c0;
}

</style>
</body>

</html>