<header>
    <div class="div1">

    </div>
    <div class="div2">
        <p>
            Prénom : <?php if(isset($_SESSION['fname'])){echo $_SESSION['fname'];} ?> <br><br>
            Nom : <?php if(isset($_SESSION['lname'])){echo $_SESSION['lname'];} ?>
            <span><a href="logout.php">Déconnexion</a></span>
        </p>
    </div>
</header>