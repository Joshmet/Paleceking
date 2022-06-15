<?php
    session_start();
    include("connect.php");
    if (!isset($_SESSION['admin'])) {
        header('Location: connexion.php');
        die();
    }
    $checksec = $db->prepare('SELECT * FROM admin WHERE email = ?');
    $checksec->execute(array($_SESSION['admin']));
    $datasec = $checksec->fetch();

    /*Table de commande*/
	$check = $db->prepare('SELECT id, prenom, quartier, contact, description FROM commande');
    $check->execute();
    $data = $check->fetchAll();
    $row = $check->rowCount();
    // Fin ------------- //

    /*Table de réservation*/
    $check1 = $db->prepare('SELECT id, prenom, contact, dates, detail FROM reservation');
    $check1->execute();
    $data1 = $check1->fetchAll();
    $row1 = $check1->rowCount();
    // Fin ------------- //

    /*Instruction de témoignage*/
    $check2 = $db->prepare('SELECT id, contenu FROM temoignage');
    $check2->execute();
    $data2 = $check2->fetchAll();
    $row2 = $check2->rowCount();
    // Fin ------------- //
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="admin.css">
	<link rel="stylesheet" href="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.js"></script>
    <title>AdminPalace</title>
</head>   
<body>
    <!-- NAVBAR -->
    <header>
        <a href="#" class="logo">
            <span>P</span>alace
            <img src="./images/crown.png" height="40" width="55">
        </a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navbar">
            <li><a href="#banniere" onclick="toggleMenu();">Accueil</a></li>
	        <li><a href="#commande" onclick="toggleMenu();">Commandes</a></li>
	        <li><a href="#reservation" onclick="toggleMenu();">Réservations</a></li>
	        <li><a href="#temoignage" onclick="toggleMenu();">Témoignages</a></li>
	        <a href="deconnexion.php" class="btn-reserve">Deconnexion</a>
        </ul>
    </header>
    <!-- FIN NAVBAR -->

    <!-- BANNIERE -->
    <section class="banniere" id="banniere" >
        <div class="contenu" >
            <h2>Bienvenu Dans Votre Palace...!</h2>
        </div>
    </section>
    <!-- FIN BANNIERE -->

    <!-- COMMANDES -->
    <section class="commande" id="commande">
        <div class="titre noir">
            <h2 align="center" class="titre-text"><span>C</span>OMMANDES</h2>
        </div>
        <div align="center">
            <table border="1" width="80%">
             	<tr align="center">
             		<td bgcolor="#fb911f"><strong>ID</strong></td>
                    <td bgcolor="#fb911f"><strong>PRENOMS</strong></td>
                    <td bgcolor="#fb911f"><strong>QUARTIERS</strong></td>
                    <td bgcolor="#fb911f"><strong>CONTACTS</strong></td>
             		<td bgcolor="#fb911f"><strong>DESCRIPTIONS</strong></td>
             		<td bgcolor="#fb911f"><strong>ACTIONS</strong></td>
             	</tr>
				<?php foreach($data as $value) :?>
				<tr align="center">
					<td bgcolor="LightGray"><?=$value['id']?></td>
					<td bgcolor="DarkGray"><?=$value['prenom']?></td>
					<td bgcolor="DarkGray"><?=$value['quartier']?></td>
					<td bgcolor="DarkGray"><?=$value['contact']?></td>
                    <td bgcolor="DarkGray"><?=$value['description']?></td>
                    <!-- Bouton supprimer -->
                    <td bgcolor="DarkGray">
                        <a href="delete_c.php?id=<?php echo $value['id']; ?>" style="color:red">
                            <i title="Supprimer la commande" class='bx bxs-trash'></i>
                        </a>
                    </td>
                    <!-- Fin Bouton supprimer -->
				</tr>
				<?php endforeach?>
            </table>
        </div>
    </section>
    <!-- FIN COMMANDES -->

    <!-- RESERVAIONS -->
    <section class="reservation" id="reservation">
        <div class="titre noir">
            <h2 align="center" class="titre-text"><span>R</span>ESERVAIONS</h2>
        </div>
        <div align="center">
            <table border="1" width="80%">
                <tr align="center">
                    <td bgcolor="#fb911f"><strong>ID</strong></td>
                    <td bgcolor="#fb911f"><strong>DESCRIPTIONS</strong></td>
                    <td bgcolor="#fb911f"><strong>DATES</strong></td>
                    <td bgcolor="#fb911f"><strong>CONTACTS</strong></td>
                    <td bgcolor="#fb911f"><strong>PRENOMS</strong></td>
                    <td bgcolor="#fb911f"><strong>ACTIONS</strong></td>
                </tr>
                <?php foreach($data1 as $value1) :?>
                <tr align="center">
                    <td bgcolor="LightGray"><?=$value1['id']?></td>
                    <td bgcolor="DarkGray"><?=$value1['detail']?></td>
                    <td bgcolor="DarkGray"><?=$value1['dates']?></td>
                    <td bgcolor="DarkGray"><?=$value1['contact']?></td>
                    <td bgcolor="DarkGray"><?=$value1['prenom']?></td>
                    <!-- Bouton supprimer -->
                    <td bgcolor="DarkGray">
                        <a href="delete_r.php?id=<?php echo $value1['id']; ?>" style="color:red">
                            <i title="Supprimer la reservation" class='bx bxs-trash'></i>
                        </a>
                    </td>
                    <!-- Fin Bouton supprimer -->
                </tr>
                <?php endforeach?>
            </table>
        </div>
    </section>
    <!-- FIN RESERVAIONS -->

    <!-- TEMOIGNAGES -->
    <section class="temoignage" id="temoignage">
        <div class="titre noir">
            <h2 align="center" class="titre-text"><span>T</span>EMOIGNAGES</h2>
        </div>
        <div align="center">
            <table border="1" width="60%">
                <tr align="center">
                    <td bgcolor="#fb911f"><strong>ID</strong></td>
                    <td bgcolor="#fb911f"><strong>DESCRIPTIONS</strong></td>
                </tr>
                <?php foreach($data2 as $value2) :?>
                <tr align="center">
                    <td bgcolor="LightGray"><?=$value2['id']?></td>
                    <td bgcolor="DarkGray"><?=$value2['contenu']?></td>
                </tr>
                <?php endforeach?>
            </table>
        </div>
    </section>
    <!-- FIN TEMOIGNAGES -->  

    <!-- CSS DELETE -->
    <style type="text/css">
        /* Set a style for all delete buttons */
        tr td i:hover {
          cursor: pointer;
          opacity: 1;
          color: black;
        }
    </style>
    <!-- FIN CSS DELETE -->  

    <!-- SCRIPT JS -->
    <script type="text/javascript">
        window.addEventListener('scroll', function(){
            const header =document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0 );
        });

        function toggleMenu(){
            const tmenuToggle = document.querySelector('.menuToggle');
            const navbar = document.querySelector('.navbar');
            navbar.classList.toggle('active');
            menuToggle.classList.toggle('active');
            }
    </script>
    <!-- FIN SCRIPT JS -->

</body>
</html>