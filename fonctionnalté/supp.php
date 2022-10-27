<?php include '../base_de_donnée.php';

// var_dump($_GET["id"]);die;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if(!empty($id) && is_numeric($id)){
            include("base_de_donnée.php");
                $list = "UPDATE employe SET etat = '1' where id=$id";
                $result = $conn->query($list);
                header("Location:liste.php");
        }
    }

?>