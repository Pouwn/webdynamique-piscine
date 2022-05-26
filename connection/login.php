<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="connexion.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="contener">

            <form action="connexion.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Email</b></label>
                <input type="text" placeholder="Entrer votre email" name="email" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password1" required>
                
                <p>mot de passe oublier?</p>

                <input type="submit" id='submit' value='Se connecter' >
               
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
                
                <p>Vous n'avez pas de compte ?<a href="inscription.html">S'inscrire</a></p>
            </form>
        </div>
    </body>
</html>