<?php include 'base.php';?>
<?php
session_start();
if(isset($_POST['login']) && isset($_POST['pwd2']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";
$db = mysqli_connect($servername, $username, $password,$dbname)
or die('could not connect to database');

try {
  $conn = new PDO("mysql:host=$servername;dbname=inscription", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo " <h1>Bienvenu a la base de donnée de l'établissement</h1> <br>";

} catch(PDOException $e) {
  echo "Connection à la BD échouée: " . $e->getMessage();
}
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['login'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['pwd2']));
    if($username !== "" && $password !== "")
    {

      $email=$_POST['login'];
      $check = $conn->prepare('SELECT * FROM employe WHERE email = ?');
      $check->execute(array($email));
      $data = $check->fetch();
      $row = $check->rowCount();
        if($row!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['email'] = $username;
           $_SESSION['id'] = $id;

           if(($data['country'] =='admin')){
            header('Location: liste_active.php'); 
           }
           elseif($data['country']=='user'){
            header('Location: page_user.php'); 
           }   
        } 
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>
