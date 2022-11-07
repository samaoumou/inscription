<?php

include("./base.php");
/* if(isset($_SESSION['id'])){
    header('location:/');
    exit;
} */
$id=$_GET['id'];

$req=$conn->prepare("SELECT * FROM employe WHERE id=?");
$req->execute([$id]);
$req_user=$req->fetch();
if(!empty($_POST)){
    extract($_POST);
    $valid=true;
    if(isset($_POST['form1']))
    {
        $email=$_POST['login'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $list = "UPDATE employe SET email = '$email', firstName = '$firstName', lastName='$lastName' where id=$id";
        var_dump($list);
        $result = $conn->exec($list);
        header("Location:liste_active.php");
    }
    elseif(isset($_POST['form2']))
    {
    }
}
if(!isset($email)){
    $email=$req_user['email'];
    $firstName=$req_user['firstName'];
    $lastName=$req_user['lastName'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
       <div class="row">
        <div class="col-3"></div>
         <div class="col-6">
            <h1>Modifier un employer</h1><br>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="">Email</label>
                    <input class="form-control" type="email" name="login" value="<?= $email?>"  placeholder="email">
                </div>
                <div class="mb-3">
                <label for="">Prénom</label>
                    <input class="form-control" type="text" name="firstName" value="<?= $firstName?>"  placeholder="Prenom">
                </div>
                <div class="mb-3">
                <label for="">Nom</label>
                    <input class="form-control" type="text" name="lastName" value="<?= $lastName?>"  placeholder="Nom">
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" name="form1" value="Modifier">
                </div>
            </form><br>
         </div>

       </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>