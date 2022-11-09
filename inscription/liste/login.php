

<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style1.css" media="screen" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        
    </head>
    
    <body>
   <!--  <a class="btn btn-primary" href="../site/index.php" role="button">Retour</a> -->
    
   <div class="blue">   
        <div id="container">
            <!-- zone de connexion -->    
            <form action="./verification.php" method="POST">
                <h1>Connexion</h1>
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>
                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="pwd2" id="myInput" required>
                <input type="checkbox" onclick="myFunction()">Mode claire
                <input type="submit" id='submit' value='Se connecter' name='connexion'>
                <a href="../moi.php">S'incrire</a>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
   </div>    
    </body>

  <style>
    .blue{
        background-color: rgb(0,30,94);
        width: 100%;
        height: 250px;
        display: flex;
        justify-content: center;
        border: 5px solid blue;
    }
    #container{
        margin-top: 300px;
    }
    #submit{
        background-color: rgb(0,30,94);
    }
  </style> 
  <script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
</html>