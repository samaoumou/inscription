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
    $date_archive=date( "Y-m-d" );
    if(!empty($id) && is_numeric($id)){
        include("base.php");
            $list = "UPDATE employe SET etat = '0' where id=$id";
            $result = $conn->query($list);
            header("Location:archive.php");
    }
}
?>