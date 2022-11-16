


<?php session_start();?>
<?php include './base.php';?>

<?php
if (isset($_POST['login'],$_POST['pwd2'])) {
if (!empty($_POST['login']) &&  !empty($_POST['pwd2'])) { 
$mail = htmlspecialchars($_POST['login']);
$pwd2 = htmlspecialchars($_POST['pwd2']);
$email = strtolower($mail);

$check = $conn->prepare('SELECT email, pwd2, country FROM employe WHERE email = :email');
$check->bindParam("email", $email);
$check->execute();
$row =  $check->rowCount();

if($row > 0){
    $check = $conn->prepare('SELECT * FROM employe WHERE email = :email');
    $check->bindParam("email", $email);
    $check->execute();
    $row =  $check->rowCount();
    $data = $check->fetch();
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        //verifie si le mot de passe exit
        if(password_verify($pwd2, $data['pwd2'])){

            //Session qui redirige
            $_SESSION['matricule'] = $data['matricule'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['firstName'] = $data['firstName'];
            $_SESSION['lastName'] = $data['lastName'];
            $_SESSION['photo'] = $data['photo'];
            $_SESSION['email'] = $data['email'];

            if ($data['country'] == 'admin' && $data['etat'] == 0) {
                header('Location:liste_active.php');
                die();
            }
            elseif($data['country'] == 'user' && $data['etat'] == 0){
                header('location:page_users.php');
                die();
            }
        }else{header('Location: index.php?erreur=1'); }
    }else{header('Location : index.php?erreur=1');}
}else{header('Location: index.php?erreur=1'); }
}else{header('Location: index.php'); 
}
}
?>

