<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php

session_start();

?>


<?php
include 'base.php';
// recupèration des input à modifier
$id = $_SESSION['id'];
$stmt = $conn->prepare("SELECT pwd2 FROM employe WHERE id='$id'");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$passwords = $row['pwd2'];



if (isset($_POST['valider'])) { //Les modifications ne s'affichent que lorsqu'on clic sur  valider

if (isset($_POST['Apassword'],$_POST['Npassword'],$_POST['Cpassword'])&& !empty($_POST['Apassword']) && !empty($_POST['Npassword']) && !empty($_POST['Cpassword'])) {
  $Apassword=$_POST['Apassword'];
  $Npassword=$_POST['Npassword'];
  $Cpassword=$_POST['Cpassword'];
    if (password_verify($Apassword,$passwords)) {
        if ($Npassword==$Cpassword) {
            // Hacher le mot de passe
                $passwordHack=password_hash($_POST["Cpassword"], PASSWORD_DEFAULT) ;

                $stmt = $conn->prepare("UPDATE employe SET pwd2='$passwordHack'WHERE id='$id'");
                $stmt->execute();
                if ($stmt) {
                    header("location:liste_active.php");
                } else {
                    die('Erreur : ' . $e->getMessage());
                }
        }else {
            $erreurPasswordC[] = "password not compatible!";
            
        }
    }else {
        $erreurPasswordA[] = "password Actuel incorrecte!";
    }

}else{ 
    $erreurPassword[] = "Veuillez remplir tous les champs!";
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- Formulaire de connexion / boostrap/ CSS -->
    <div class="container  w-50">
        <!-- card(carte) header -->
        <div class="card-header text-center  text-white cardHeaderCSS ">
            <h3> MODIFICATION</h3>
        </div>
        <?php
        if (isset($erreurPassword)) {
            // La boucle foreach permet d'afficher toutes les caractères×
            foreach($erreurPassword as $char){
                echo"<span style='color:red;'>$char </span>";
            }
        }
        ?>
        
        <!-- card(carte) body -->
        <div class="card-body cardBodyCSS">
            <button class="btn mt-5"><a href="liste_active.php" class="lien">Retour </a></button>
            <form action="" method="post" >
                  <!--  novalidate pour la validation du format de l'email (FILTER_VAR($_POST['email'] FILTER_VALIDATE_EMAIL)) -->
                    <label for="nom">Mot de passe Actuel</label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text " id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="password" class="form-control" autocomplete="off" name="Apassword" aria-label="Username" aria-describedby="basic-addon1" id="myInput1">
                            <input type="checkbox" onclick="myFunction1()">Mode claire
                        </div>
                            <?php
                            if (isset($erreurPasswordA)) {
                                // La boucle foreach permet d'afficher toutes les caractères×
                                foreach($erreurPasswordA as $char){
                                    echo"<span style='color:red;'>$char </span>";
                                }
                            }
                            ?>
                    <label for="nom">Nouveau mot de passe</label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text " id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="password" class="form-control" autocomplete="off" name="Npassword" aria-label="Username" aria-describedby="basic-addon1" id="myInput2">
                            <input type="checkbox" onclick="myFunction2()">Mode claire
                        </div>   
                       
                    <label for="nom">Confirmez votre nouveau mot de passe</label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text " id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="password" class="form-control" autocomplete="off" name="Cpassword" aria-label="Username" aria-describedby="basic-addon1" id="myInput3">
                            <input type="checkbox" onclick="myFunction3()">Mode claire
                        </div> 
                        <?php
                            if (isset($erreurPasswordC)) {
                                // La boucle foreach permet d'afficher toutes les caractères×
                                foreach($erreurPasswordC as $char){
                                    echo"<span style='color:red;'>$char </span>";
                                }
                            }
                            ?>
                       <input type="submit" name="valider" value="Modifier">

                </form>
    </div>

    </div>

</body>
<style>
    h3{
        background-color: rgb(0,30,94);
        color: #fff;
        
    }
</style>
<script>
    function myFunction1() {
  var x = document.getElementById("myInput1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction2() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction3() {
  var x = document.getElementById("myInput3");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
</html>
