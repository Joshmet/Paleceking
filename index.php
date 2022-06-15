<?php 
    include("connect.php");

    /*Instruction de commande*/
    if(isset($_POST['Envoyer'])) {
        if(!empty($_POST['Prenom']) && !empty($_POST['Quartier']) && !empty($_POST['Contact']) && !empty($_POST['Commande']) ){
            $prenom = htmlspecialchars($_POST['Prenom']);
            $quartier = htmlspecialchars($_POST['Quartier']);
            $contact = htmlspecialchars($_POST['Contact']);
            $description = nl2br(htmlspecialchars($_POST['Commande']));

            $insert1 = $db->prepare('INSERT into commande(prenom, quartier, contact, description) values(:prenom, :quartier, :contact, :description)');
            $insert1->execute(array(
                'prenom' => $prenom,
                'quartier' => $quartier,
                'contact' => $contact,
                'description' => $description));
            header('Location: index.php?succes=commande_envoyé');
                die();
        }else{
            header('Location: index.php?error=champ_vide');
        }   
    }
    // Fin ------------- //

    /*Instruction de réservation*/
    if(isset($_POST['Reserver'])) {
        if(!empty($_POST['Prenom']) && !empty($_POST['Contact']) && !empty($_POST['Date']) && !empty($_POST['Reservation']) ){
            $prenom = htmlspecialchars($_POST['Prenom']);
            $contact = htmlspecialchars($_POST['Contact']);
            $date = htmlspecialchars($_POST['Date']);
            $details = nl2br(htmlspecialchars($_POST['Reservation']));

            $insert2 = $db->prepare('INSERT into reservation(prenom, contact, dates, detail) values(:prenom, :contact, :dates, :detail)');
            $insert2->execute(array(
                'prenom' => $prenom,
                'contact' => $contact,
                'dates' => $date,
                'detail' => $details));
            header('Location: index.php?réservation_avec_succès');
                die();
        }else{
            header('Location: index.php?error=champ_vide');
        }   
    }
    // Fin ------------- //

     /*Instruction de témoignage*/
    if(isset($_POST['Envoyer'])) {
        if(!empty($_POST['Contenu'])){
            $contenu = nl2br(htmlspecialchars($_POST['Contenu']));

            $insert = $db->prepare('INSERT into temoignage(contenu) values(:contenu)');
            $insert->execute(array('contenu' => $contenu));
            header('Location: index.php?succes=témoignage_envoyé');
                die();
        }else{
            header('Location: index.php?error=champ_vide');
        }   
    }
    // Fin ------------- //
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>PalaceKing</title>
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
            <li><a href="#apropos" onclick="toggleMenu();">A propos</a></li>
            <li><a href="#menu" onclick="toggleMenu();">Menu</a></li>
            <li><a href="#expert" onclick="toggleMenu();">Expert</a></li>
            <li><a href="#temoignage" onclick="toggleMenu();">Temoignages</a></li>
            <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>&nbsp;
            <a href="#commande" class="btn-reserve"onclick="toggleMenu();">Commandes</a>
        </ul>
    </header>
    <!-- FIN NAVBAR -->

    <!-- BANNIERE -->
    <section class="banniere" id="banniere">
        <div class="contenu">
            <h2>Que Des Mets Délicieux</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <a href="#menu" class="btn2">Notre Menu</a>
            <a href="#reservation" class="btn1">Reservation</a>
        </div>
    </section>
    <!-- FIN BANNIERE -->

    <!-- PROPOS -->
    <section class="apropos" id="apropos">
        <div class="row">
            <div class="col50">
                <h2 class="titre-texte"><span>A</span> Propos De Nous</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="col50">
                <div class="img">
                    <img src="./images/resto1.jpg" alt="image">
                </div>
            </div>
        </div>
    </section>
    <!-- FIN PROPOS -->

    <!-- MENU -->
    <section class="menu" id="menu">
        <div class="titre">
            <h2 class="titre-texte"><span>M</span>enu</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. </p>
        </div>
        <div class="contenu">
            <div class="box">
                <div class="imbox">
                    <img src="./images/c1.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Special salade <b style="color: #fb911f;">1500 fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/c2.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Riz à la chinoise <b style="color: #fb911f;">800fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/c3.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Pizza au jambon <b style="color: #fb911f;">4800fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/c4.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Atiéké + braisée <b style="color: #fb911f;">2100fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/c5.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Special salade <b style="color: #fb911f;">1500fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/c6.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Riz au gras <b style="color: #fb911f;">800fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/c7.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Poulet assaisoné <b style="color: #fb911f;">1600fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/c8.jpeg" alt="">
                </div>
                <div class="text">
                    <h3>Frit au poulet <b style="color: #fb911f;">2500fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/c9.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Plat de Fufu <b style="color: #fb911f;">1000fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/c10.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Pâte + gombo <b style="color: #fb911f;">700fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/cc1.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Vin blanc <b style="color: #fb911f;">12000fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/cc2.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Vin mousseux <b style="color: #fb911f;">27500fcfa</b></h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/cc3.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Mousquador <b style="color: #fb911f;">13900fcfa</b></h3>
                </div>
            </div>
        </div>
        <div class="titre">
            <a href="#" class="btn1">Voir Plus</a>
        </div>
    </section>
    <!-- FIN MENU -->

    <!-- EXPERTS -->
    <section class="expert" id="expert">
            <div class="titre">
                <h2 class="titre-texte">Nos <span>E</span>xperts</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. </p>
            </div>
            <div class="contenu">
                <div class="box">
                    <div class="imbox">
                        <img src="./images/equipe1.jpg" alt="">
                    </div>
                    <div class="text">
                        <h3>Josué METO</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imbox">
                        <img src="./images/equipe2.jpg" alt="">
                    </div>
                    <div class="text">
                        <h3>George Smith</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imbox">
                        <img src="./images/equipe4.jpg" alt="">
                    </div>
                    <div class="text">
                        <h3>Bénédict METO</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imbox">
                        <img src="./images/equipe3.jpg" alt="">
                    </div>
                    <div class="text">
                        <h3>Jacques André</h3>
                    </div>
                </div>
            </div>
    </section>
    <!-- FIN EXPERTS -->

    <!-- TEMOIGNAGES -->
    <section class="temoignage" id="temoignage">
        <div class="titre blanc">
            <h2 class="titre-texte">Que Disent Nos <span>C</span>lients</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. </p>
        </div>
        <div class="contenu">
            <div class="box">
                <div class="imbox">
                    <img src="./images/t1.jpeg" alt="">
                </div>
                <div class="text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                    <h3>Josh Met</h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/t2.jpg" alt="">
                </div>
                <div class="text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                    <h3>Cephas</h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="./images/t3.jpg" alt="">
                </div>
                <div class="text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                    <h3>Graciasme</h3>
                </div>
            </div>
        </div><br><br><br>
        <div align="center" class="contenum">
            <div class="titre blanc">
                <p class="titre-texte">Témoigner également</p>
            </div>
            <form method="post" action="">
                <div class="temoignageform">
                    <div class="inputboite">
                        <textarea name="Contenu" placeholder="Votre Témoignage et votre prénom" required></textarea><br><br>
                        <input type="submit" name="Envoyer" value="Témoigner" class="btn btn-block btn-primary">
                    </div>
                </div>
            </form>            
        </div>
    </section>
    <!-- FIN TEMOIGNAGES -->

    <!-- CONTACTS -->
    <section class="contact" id="contact">
        <div class="titre noir">
            <h2 class="titre-text"><span>C</span>ontact</h2>
            <p>Visitez nos réseaux sociaux pour vivre plus d'expériences avec nous !!!</p>
        </div>
        <div class="contenu" align="center">
            <div class="box">
                <a href="#" title="Whatsapp"><i class='bx bxl-whatsapp'></i></a>&nbsp;&nbsp;
                <a href="#" title="Facebook"><i class="bx bxl-facebook"></i></a>&nbsp;&nbsp;
                <a href="#" title="Instagram"><i class="bx bxl-instagram"></i></a>&nbsp;&nbsp;
                <a href="#" title="Twitter"><i class="bx bxl-twitter"></i></a>&nbsp;&nbsp;
                <a href="#" title="Youtube"><i class="bx bxl-youtube"></i></a>&nbsp;&nbsp;
                <a href="#" title="Site internet"><i class="fa-solid fa-globe"></i></a>&nbsp;&nbsp;
                <a href="#" title="Localisation"><i class="fa-solid fa-location-dot"></i></a>&nbsp;&nbsp;
            </div>
        </div>
    </section>
    <!-- FIN CONTACTS -->

    <!-- COMMANDES -->
    <section class="commande" id="commande">
        <div class="titre noir">
            <h2 class="titre-text"><span>C</span>ommandes</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
        </div>
        <form method="post" action="">
            <div class="commandeform">
                <h3 align="center">Passer une commande</h3>
                <div class="inputboite">
                    <input name="Prenom" type="text" placeholder="Prénom" required>
                </div>
                <div class="inputboite">
                   <input name="Quartier" type="text" placeholder="Quartier" required>
                </div>
                <div class="inputboite">
                   <input name="Contact" type="text" placeholder="Contact(+228.....)" required>
                </div>
                <div class="inputboite">
                   <textarea name="Commande" placeholder="Votre commande(s)" required></textarea>
                </div>&nbsp;
                <div class="inputboite">
                    <input name="Envoyer" type="submit" value="envoyer">
                </div>
            </div>
        </form>
    </section>
    <!-- FIN COMMANDES -->

    <!-- RESERVAION -->
    <section class="reservation" id="reservation">
        <div class="titre noir">
            <h2 class="titre-text"><span>R</span>eservation</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
        </div>
        <form method="post" action="">
            <div class="reservationform">
                <h3 align="center">Faite une Réservation !</h3>
                <div class="inputboite">
                    <input name="Prenom" type="text" placeholder="Prénom" required>
                </div>
                <div class="inputboite">
                   <input name="Contact" type="text" placeholder="Contact(+228.....)" required>
                </div>
                <div class="inputboite">
                   <input name="Date" type="date" title="Date de réservation" required>
                </div>
                <div class="inputboite">
                   <textarea name="Reservation" placeholder="Détails & heure de la reservation" required></textarea>
                </div>&nbsp;
                <div class="inputboite">
                    <input name="Reserver" type="submit" value="reserver" required>
                </div>
            </div>
        </form>
    </section>
    <!-- FIN RESERVAION -->

    <div class="copyright">
        <p>copyright &copy; 2022 <a href="#">METO Josué</a>  Etudiant en DA</p>
    </div>

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