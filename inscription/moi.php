
<?php include '../base.php';  ?>

<?php
/* var_dump($_POST); */

if (isset($_POST['submit'])) { //isset permet de vérifier si la variable $_POST['submit'] existe si l'on a vraiment appuyer sur submit
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];       
$email = $_POST['login']; 
$pwd2 = md5($_POST['pwd2']);
$country = $_POST['country'];
@$photo = file_get_contents($_FILES['photo']['tmp_name']);
$date_inscription= date( "Y-m-d" );
// => 07/04/2022 08:00:00
$compte = false;
$matricule = /* date('Y- ', time()).$row.' -EDR'; */ 'générer automatiquement';
$select_mail = $conn->prepare("SELECT email FROM `employe` WHERE email = ? ");
$select_mail->execute([$email]);
 


if ($select_mail->rowCount() > 0)
{
    $message [] = "l'adresse mail existe déja";
}
else {
    //on insert les données dans la base de donnée
    $insertion=$conn->prepare("INSERT INTO employe (matricule,firstName, lastName, pwd2, country, photo, date_inscription, email)  
    VALUES(?,?,?,?,?,?,?,?)");
    $insertion->execute([$matricule, $firstName, $lastName, $pwd2, $country, $photo, $date_inscription, $email ]);
    //on récuperer l'id de enregistrement 
    $sql = "SELECT id FROM `employe` WHERE  email = '$email' ";
    $id = $conn->prepare($sql);
    $id->execute();
    $row = $id->fetch(PDO::FETCH_ASSOC);
    //on modifie le matricule
    $matricule = date('Y-', time()).$row['id'].'-EDR';
    //on modifie la derniere matricule du BD
    $sql2 = "UPDATE employe  SET  matricule = '$matricule' WHERE email = '$email' ";
    $matricule2 = $conn->prepare($sql2);
    $matricule2->execute();

    $message []  = "inscription reussi, votre matricule: ". $matricule;
    $compte = true; 
    echo '<a href="liste/login.php">Se connecter</a>'; 
}
}
?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="moi.css">
<title>Inscription en ligne</title>
<style type="text/css">
</style>
</head>
<body>
<div class="container">

    <div class="formulaire">
    <?php
    if (isset($message)) {
       foreach ($message as $message) {
        if ($compte == true) {
            echo '<div class="">'. $message . '</div>';
        }
        else
        {
            echo '<div class="">'. $message . '</div>';
        }    
       }
    }
    ?>  
    




        <form id="myForm" action="" method="post" enctype="multipart/form-data">
            <img src="../img/images.jpeg" alt="" width="100px" height="70px"><br>
            <div class="logo">
                <h3>Formulaire d'Inscription</h3>
            </div>
            <div class="centre">
                <div class="ext">
                    <label class="form_col" for="lastName">Nom :</label><br>
                    <input name="lastName" id="lastName" type="text" />
                    <span class="tooltip">Un nom ne peut pas faire moins de 2 caractères</span><br /><br />
                </div>
                <div class="ext">
                    <label class="form_col" for="firstName">Prénom:</label><br>
                    <input name="firstName" id="firstName" type="text"  /> 
                    <span class="tooltip">Un prénom ne peut pas faire moins de 2 caractères</span><br /><br />
                </div>
            </div>
            <div class="centre">
                <div class="ext">
                    <label class="form_col" for="email">Mail :</label><br>
                    <input name="login" id="email" type="mail"  />
                    <span class="tooltip">L'adresse email est invalide</span><br /><br />
                </div>
                <div class="ext">
                    <label class="form_col" for="pwd1">Mot de passe:</label><br>
                    <input name="pwd1" id="pwd1" type="password"  />
                    <span class="tooltip">Le mot de passe ne doit pas faire moins de 6 caractères</span><br /><br />
                </div>
            </div>
            <div class="centre">
                <div class="ext">
                    <label class="form_col" for="pwd2">Mot de passe (confirmation) :</label><br>
                    <input name="pwd2" id="pwd2" type="password" />
                    <span class="tooltip">Le mot de passe de confirmation doit être identique à celui d'origine</span><br /><br />
                </div>
                <div class="ext">
                    <label class="form_col" for="country">Role :</label><br>
                    <select name="country" id="country" class="form_col">
                        <option value="none" class="form_col">Votre role</option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select><br>
                    <span class="tooltip">Vous devez sélectionner votre role</span><br /><br />
                </div>
            </div>
            <div class="centre1">
                <div class="ext">
                <label for="icone"></label><br />
                    <input type="file" name="photo" class="form-control" accept="image/*">

                    <!-- <span class="tooltip">Votre photo est obligatoire</span><br /><br /> -->
                </div>
                <span class="form_col"></span>
                <input type="submit" name="submit" id="submit" value="envoyer" class="btn"/> 
        </form> <br>
     </div>
</div>    
<script src="moi.js"></script>
</body>
</html>