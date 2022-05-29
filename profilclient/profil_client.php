<?php

include("../bdd/config.php");
session_start();

?>


<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../header_footer/header_footer.css">
    <link rel="stylesheet" href="profil.css">
    <meta charset="UTF-8">

</head>
<body>



<!-- header debut-->
<form id="general">
    <div class="container-fluid"id="header">
        <div class="row ">
            <ul class="nav nav-pills align-items-center">
                <div class="col"><li class="nav-item">
                        <img src="../images/LOGO.png" width="200" height="200"></li>
                </div>
                <div class="col offset-1">      <li class="nav-item">
                        <a class="nav-link active"  href="#">Accueil</a>
                    </li></div>
                <div class="col offset-1">      <li class="nav-item">
                        <a class="nav-link active"  href="#">mon compte</a>
                    </li></div>
                <div class="col offset-1">      <li class="nav-item">
                        <a class="nav-link active" href="" onClick="ouvrirFenetre('/popup/toutparcourir.html');">tout parcourir</a>
                    </li></div>
                <div class="col offset-1">      <li class="nav-item">
                        <a class="nav-link active"  href="#">rendez-vous</a>
                    </li></div>
            </ul>
        </div>
    </div>
</form>
<!-- header fin-->
<h1 class="text-center mt-5 pt-5"><b>Mon espace client</b></h1>


<div id="continfo" >
    <img class="img" src="../images/logonoir.png">
    <div class="info">
        <?php
        $var= $_SESSION['client'];

        $req = "SELECT Nom_Client FROM Client WHERE Email_client='$var' ";
        $result = mysqli_query($db, $req);
        $valueT = mysqli_fetch_assoc($result);
        $nom = $valueT["Nom_Client"];
        echo $nom;
        echo " ";
        ?><br>



    </div>
</div>


<div class="">
    <button type="submit" class="btn mt-5"  id="but1">Mes informations</button>
</div>

<button type="submit" class="btn btn-lg mt-5  btn-outline-primary" id="but2">Mes reservations</button>



<button type="submit" class="btn btn-lg mt-5  btn-outline-primary" id="but3">Prendre un RDV</button>





<!-- footer debut-->

<div class="container-fluid" id="footer">
    <div class="row">
        <div class="col">position<br>
            <!-- lien pour la carte google map-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.351678858319!2d2.285043715830529!3d48.
      851503909145414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6700497ee3ec5%3A0xdd60f514adcdb346!2s37%20Quai%20de%20Grenelle%2C%2075015%20Paris!
      5e0!3m2!1sfr!2sfr!4v1653397775905!5m2!1sfr!2sfr"
                    width="auto" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col" id="midlefooter">email</div>

        <div class="col">contact</div>

    </div>
</div>
<!-- footer fin-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">

    function ouvrirFenetre(url){
        var win = window.open(url, "popup", "toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, width=500, height=350,screenX=200,screenY=200");
        win.focus();
    }
</script>

</body>
</html>
