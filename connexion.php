<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
	<form method="post" action="traitement.php">
		<?php
			if(isset($_GET['error'])) {
			    $err = htmlspecialchars($_GET['error']);

				switch($err) {
	            	case 'password':
	            	?>
	            	    <div class="alert alert-danger">
	            	        <strong>Erreur</strong> Password invalide
	            	    </div>
	            	<?php
	            	break;

	                case 'email':
	                ?>
	                    <div class="alert alert-danger">
	                        <strong>Erreur</strong> Email invalide
	                    </div>
	                <?php
	                break;

	                case 'already':
	                ?>
	                    <div class="alert alert-danger">
	                        <strong>Erreur</strong> Compte non existant
	                    </div>
	                <?php
	            }
			}
		?>
		<div class="reservationform" align="center">
            <h3 align="center">Connexion Admin !</h3>&nbsp;
            <div class="inputboite">
                <input name="Mail" type="text" placeholder="E-mail" required>
            </div>
            <div class="inputboite">
               <input name="Password" type="password" placeholder="Mot de passe" required>
            </div>&nbsp;
            <div class="inputboite">
                <input name="Connecter" type="submit" value="Connexion">
            </div>
        </div>
	</form>
	<style>
		*{
		    margin: 0px;
		    padding: 0px;
		    box-sizing: border-box;
		    font-family: 'poppins', sans-serif;
		    scroll-behavior: smooth;
		    align-items: center;
		    align-content: center;
		}
		.reservationform{
		    padding: 75px 30px;
		    background: #fff;
		    box-shadow: 5px 15px 50px rgba(0,0,0, 0.8);
		    max-width: 500px;
		    margin-top: 8%;
		    justify-content: center;
		    align-items: center;
		    margin-left: 32%;
		}
		.reservationform h3{
		    color: #111;
		    font-size: 2.2em;
		    margin-bottom: 20px;
		}
		.reservationform .inputboite{
		    position: relative;
		    width: 80%;
		    margin-right: 8px;
		    margin-bottom: 22px;
		    align-items: center;
		    align-content: center;
		}
		.reservationform .inputboite input{
		    width: 100%;
		    border: 1px solid #555;
		    padding: 10px;
		    color: #111;
		    outline: none;
		    font-size: 16px;
		    font-weight: 300;
		    resize: none;
		}
		.reservationform .inputboite input[type="submit"]{
		    font-size: 0.9em;
		    font-weight: 700;
		    color: #ffff;
		    background: #fb911f;
		    display: inline-block;
		    cursor: pointer;
		    text-transform: uppercase;
		    text-decoration: none;
		    letter-spacing: 2px;
		    outline: none;
		    border: none;
		    transition: 0.5s;
		    max-width: 120px;
		    align-items: center;
		    justify-content: center;
		}
	</style>
</body>
</html>