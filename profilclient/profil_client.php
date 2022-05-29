<?php
try{
    $db = new PDO('mysql:host=localhost; dbname=ProjetWeb', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="header_footer.css">
    <link rel="stylesheet" href="">
    <meta charset="UTF-8">

    <style>

        #hey{

            border-radius: 30px;
            padding-top:0px;
            background-color: #F5F5F5;
            height: 500px;
            width: 550px;


        }
        h1{
            text-align: center;
            color: #004AAD;
            font-family: 'Times New Roman', Times, serif;

        }

        #continfo {

            height: 170px;
            width: 500px;
            border-radius: 30px;
            margin-top: 80px;
            margin-left: auto;
            margin-right: auto;
            padding-left: auto;
            padding-right: auto;
            text-align: center;
            box-shadow: 3px 3px 3px 3px rgb(204, 204, 204);
            align-items: center;
            padding-top: 40px;
        }

        .img{
            border:solid;
            margin-left:30px;
            margin-bottom:80px;
            float:left;
            width: 30%;
            height:80%


        }

        .info {

            padding-bottom: 0%;
            text-align: justify;
            margin-left: 30px;
            margin-right:90px;
            float: right;
        }

        .cont1 {
            border:solid;
            height: 500px;
            width: 500px;
            margin: auto;
            text-align: center;
            padding-top: 100px;
            margin-top: 50px;
        }


        .addm{
            margin:auto;
            border:solid;
            height: 40px;
            width: 400px;
            background-color: #004AAD;
            border-radius: 30px;
            color:aliceblue;
            padding: auto;

        }

        .addm:hover {
            background-color: #004AAD;
            color:white;
        }

        span {
            border:solid;
            margin: auto;
            padding-bottom: auto;
            padding: auto;
            vertical-align:middle;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
        }
        #but1{
            margin-left:34%;

            width:500px;
            height:60px;
            background-color:#004AAD;
            color:white;
            border-radius:60px;
        }

        #but2{
            margin-left:34%;
            margin-bottom:130px;
            width:200px;
            height:60px;
            background-color:#004AAD;
            color:white;
            border-radius:60px;

        }

        #but3{
            margin-left:85px;
            margin-bottom:130px;

            text-align:center;
            width:200px;
            height:60px;
            background-color:#004AAD;
            color:white;
            border-radius:60px;
        }
    </style>
</head>
<body>



<!-- header debut-->
<form id="general">
    <div class="container-fluid"id="header">
        <div class="row ">
            <ul class="nav nav-pills align-items-center">
                <div class="col"><li class="nav-item">
                        <img src="image/LOGO.png" width="200" height="200"></li>
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
    <img class="img" src="image/logo2.png">
    <div class="info">
        <?php
        $sql = $db->prepare('SELECT Nom_Client FROM Client where Email_client=$_POST["email"]');
        $sql->execute();
        $nom = $sql->fetchAll(PDO::FETCH_COLUMN);
        echo $nom[0];
        ?><br>
        <?php
        $sql = $db->prepare('SELECT Prenom_Client FROM Client');
        $sql->execute();
        $prenom = $sql->fetchAll(PDO::FETCH_COLUMN);
        echo $prenom[0];
        ?><br>
        <?php
        $sql = $db->prepare('SELECT Email_client FROM Client');
        $sql->execute();
        $email = $sql->fetchAll(PDO::FETCH_COLUMN);
        echo $email[0];
        ?>
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
