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
    $date_archivage=date( "Y-m-d" );
    if(!empty($id) && is_numeric($id)){
        include("base.php");
/*             $insertion=$conn->prepare("INSERT INTO employe (date_archivage) VALUE (?) ");
            $insertion->execute([$date_archivage]); */
            $list = "UPDATE employe SET etat = '1' where id=$id";
            $list1 = "UPDATE employe SET date_archivage = '$date_archivage' where id=$id";
            $result = $conn->query($list);
            $result1 = $conn->query($list1);
            header("Location:liste_active.php");
    }
}
?>