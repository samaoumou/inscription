<?php 
// var_dump($_GET["id"]);die;
$servername = "localhost";
$username = "root";
$password = "";
$dbname="inscription";

try {
  $conn = new PDO("mysql:host=$servername;dbname=inscription", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connexion échouée: " . $e->getMessage();
}

?>
<?php 

if(isset($_GET["id"])){
    $id = $_GET["id"];
    if(!empty($id) && is_numeric($id)){
        include("./base.php");

       /*  $verif = $conn -> query("SELECT country from employe where id='$id' "); */
            
       $reponse = $conn->query('SELECT country FROM `employe`');
       while($donnee = $reponse->fetch())
       {
           if($donnee['country'] == 'user')
           {
            $list = "UPDATE employe SET country = 'admin' where id=$id";
            $result = $conn->query($list); 
            header("Location:liste_active.php");
           }
           else{
            $list = "UPDATE employe SET country = 'user' where id=$id";
            $result = $conn->query($list); 
            header("Location:liste_active.php");
    
        }
       }
   


    
    }
    
}

?>