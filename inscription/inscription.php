<?php

//vérifivation de l'envoie du formulaire
if($_SERVER["REQUEST_METHOD"] == "POST")
{
           //le formulaire est complet
          filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
          if($_POST["pswd1"]!=$_POST["pswd2"]){
            $message='<div class="erreur">Les mots de passe ne sont pas identiques.</div>';
          echo $message;
          }
          
            //on hashe le mot de passe 
          

            //enregistrement des données
            try{
              $db = new PDO('mysql:host=localhost; dbname=ProjetWeb', 'root', 'root');
          }
          catch(Exception $e)
          {
            die('Erreur : '.$e->getMessage());
          }
        
            
              $sql = "INSERT INTO `Client`(`Nom_Client`, `Prenom_Client`, `Sexe_Client`, `Date_de_naissance`, `Mdp_client`, `Email_client`, `Num_telephone`, `Profession`) 
              VALUES ( :nom, :firstname, :sexe, :birthdate, :pswd , :email, :num, :profession)";
             
            $query= $db->prepare($sql);
            
            $query->bindValue(":nom", $_POST["nom"],PDO::PARAM_STR);
            $query->bindValue(":firstname", $_POST["firstname"],PDO::PARAM_STR);
            $query->bindValue(":sexe", $_POST["sexe"],PDO::PARAM_STR);
            $query->bindValue(":birthdate", $_POST["birthdate"],PDO::PARAM_STR);
            $query->bindValue(":pswd",$_POST["pswd1"],PDO::PARAM_STR);
            $query->bindValue(":email", $_POST["email"],PDO::PARAM_STR);
            $query->bindValue(":num", $_POST["num"],PDO::PARAM_STR);
            $query->bindValue(":profession", $_POST["profession"],PDO::PARAM_STR);
            $query->execute();

      }

        ?>




