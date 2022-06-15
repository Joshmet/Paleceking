<!-- Traitement de connexion -->

<?php
	session_start();
	include("connect.php");
	// S'il existe les champs email, password et qu'il sont pas vides
	if(!empty($_POST['Mail']) && !empty($_POST['Password'])) 
    {
        // Patch XSS
        $mail = htmlspecialchars($_POST['Mail']);
        $pass = htmlspecialchars($_POST['Password']);

        $mail = strtolower($mail); // email transformé en minuscule
        
        // On vérifie si l'utilisateur existe dans la table admin
        $check = $db->prepare('SELECT * FROM admin WHERE email = ?');
        $check->execute(array($mail));
        $data = $check->fetch();
        $row = $check->rowCount();

        
        
        // Si c'est > 0, alors le admin existe
        if($row > 0) 
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                if (password_verify($pass, $data['password'])) {
                    // On crée la session et on redirige sur admin.php
                    $_SESSION['admin'] = $data['email'];
                    // pour hasher le mot de passe bro
                    // $ad =password_hash('1234', PASSWORD_DEFAULT);
                    // Fin du hashage bro
                    header('Location: admin.php');
                    die();
                }
                else{
                    header('Location: connexion.php?error=password');
                    die();    
                }
            }    
            else{
                header('Location: connexion.php?error=email');
                die();
            }
        }
        else{
        	header('Location: connexion.php?error=already');
        	die();
        }
    }
    else{ // Si le formulaire est envoyé sans aucune données
    	header('Location: connexion.php');
    	die();
    }
?>
<!-- Fin Traitement de connexion -->
