<?php
include("../bdd/config.php");
session_start();
$error = null;

// Si l'utilisateur est déjà connecté, on le redirige directement vers son profil
if (isset($_SESSION['client'])) {
    header("location: /webdynamque-piscine/profilclient/profil_client.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Envoi des identifiants
    $Email_client = mysqli_real_escape_string($db, $_POST['Email']);
    $password = mysqli_real_escape_string($db, $_POST['Mdp']);


    $sql = "SELECT Email_client, Mdp_client FROM Client WHERE Email_client = ?";
    if ($stmt = mysqli_prepare($db, $sql)) {
        $param_Email_client = $Email_client;
        mysqli_stmt_bind_param($stmt, "s", $param_Email_client);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $Email_client, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        session_start();
                        $_SESSION["client"] = $Email_client;
                        header("location: /webdynamque-piscine/profilclient/profil_client.php");
                    } else {
                        $error = "Mot de passe incorrect";
                    }
                }
            } else {
                $error = "Nom d'utilisateur incorrect";
            }
        } else {
            echo "Oups! Un problème est survenu. Veuillez réessayer plus tard.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Page d'Accueil </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
</head>

<body>


<div class="contain">

    <div class="gauche">

        <form method="post">
            <label for="email">Email</label> <br>
            <input type="text" placeholder="nom@exemple.com" id="email" name="Email"> <br><br>

            <label for="mdp">Mot de passe</label> <br>
            <input type="password" placeholder="****" id="mdp" name="Mdp"> <br><br>

            <div class="but">
                <a href="google.com">Mot de passe oublié ?</a>

            </div>   <br>

            <div class="but">
                <button class="text-center" type="submit">Se connecter</button>

            </div>   <br>

            <div class="error"><?php if ($error != null) echo "$error" ?></div><br>


            <span>Pas de compte ? | <a href="../inscription/inscription.html">S'inscrire</span>

        </form>

    </div>

    <div class="droite">

        <img src="../images/connect.jpg" alt="">

    </div>

</div>


</body>
</html>