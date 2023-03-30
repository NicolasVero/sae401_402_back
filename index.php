<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>BUT MMI | Accueil</title>
</head>
<body>

    <div class="loader">
        <div class="loaderContainer">
            <div>
                <span></span>
            </div>
            <div>
                <span></span>
            </div>
            <div>
                <span></span>
            </div>
        </div>
    </div>

    <main class="content">

        <nav>
            <a href="index.php" class="nav-img"></a>
            <div class="nav-links">
                <a href="#career-anchor" class="links"><p>Parcours</p></a>
                <a href="#opportunities-anchor" class="links"><p>Débouchés</p></a>
                <a href="#departement-anchor" class="links"><p>Le département</p></a>
                <a href="#testimony-anchor" class="links"><p>Témoignages</p></a>
            </div>
            <div class="nav-burger">
                <span><p></p></span>
                <span><p></p></span>
                <span><p></p></span>
            </div>
        </nav>

        <header>
            <video autoplay muted loop playsinline>
                <source src="assets/videos/background.mov" type="video/mp4">
            </video>
        </header>

        <section class="formation">
            <article class="reveal">
                <div class="revealContainer">
                    <div class="numbers">
                        <span class="spanContainer tens" data-target="78">0</span>
                        <span class="chiffres">places</span>
                    </div>
                    <div class="numbers">
                        <span class="spanContainer units" data-target="3">0</span>
                        <span class="chiffres">ans de formation</span>
                    </div>
                    <div class="numbers">
                        <span class="spanContainer tens" data-target="26">0</span>
                        <span class="chiffres">semaines de stage</span>
                    </div>
                    <div class="numbers">
                        <span class="spanContainer units" data-target="2">0</span>
                        <span class="chiffres">parcours</span>
                    </div>
                </div>
            </article>
            <div id="career-anchor"></div>
            <h2 id="parcours">Une formation, deux parcours</h2>
            <article class="parcours">
                <div>
                    <h3>Développement Web et Dispositifs Intéractifs</h3>
                    <p>
                        Le parcours développement web est l'un des domaines clés de la formation en MMI. Les étudiants apprennent à créer des sites
                        web dynamiques, des applications web et des interfaces utilisateur attrayantes pour les utilisateurs.
                        Il aborde notamment les outils et langages informatiques nécessaires à la conception et à la gestion de ces médias.
                    </p>
                    <img src="assets/images/html5.png" alt="logo html5">
                    <form action="html/parcoursDev.html" class="btn-vides">
                        <button>En savoir plus</button>
                    </form>
                </div>
                <div>
                    <h3>Création numérique</h3>
                    <p>
                        Le parcours création numérique est consacré à l’expression d’un message sur différents médias, sous la forme de création
                        graphique et d’écriture multimédia. II permet d’acquérir les techniques nécessaires à la création de ressources numériques,
                        notamment de publications web. Les étudiants seront amenés à réaliser des affiches publicitaires, des mockups, des logo,
                        des chartes graphiques.
                    </p>
                    <img src="assets/images/photoshop.png" alt="logo photoshop">
                    <form action="html/parcoursCrea.html" class="btn-vides">
                        <button>En savoir plus</button>
                    </form>
                </div>
            </article>
            <section class='newsContainer'>
                <h2>Les dernières actualités</h2>
                <div class="news-content">
                    <?php
                        include 'back/scripts/lire_pages.php';

                        $projets = get_pages("projet", 3);
                        $actus = get_pages("actu", 3);

                        if(count($actus) > 0) {
                            for($i = 0; $i < count($actus); $i++) {
                                echo "<div class='news'><a href='" . $actus[$i]['url'] . "' target='_blank' class='news-links'><div><h1>" . $actus[$i]['dossier'] . "</h1>" . $actus[$i]['tiny_contenu'] . "<span><i>Par " . $actus[$i]['auteur'] . " le " . $actus[$i]['date'] . "</i></span></div></a></div>";
                            }
                        }    
                        else 
                            echo "<p style='font-weight: 800;font-size: 25px;font-family: Gotham-Book;'>Aucune actualitée à afficher</p>";
                
                    ?>
                </div>
            </section>
            <section class="projectsContainer">
                <h2>Les derniers projets</h2>
                <div class="projects-content">
                    <?php
                        if(count($projets) > 0) {
                            for($i = 0; $i < count($projets); $i++) {
                                echo "<div class='projects'><a href='" . $projets[$i]['url'] . "' target='_blank' class='projects-links'><div><h1>" . $projets[$i]['dossier'] . "</h1>" . $projets[$i]['tiny_contenu'] . "<span><i>Par " . $projets[$i]['auteur'] . " le " . $projets[$i]['date'] . "</i></span></div></a></div>";
                            }
                        }
                        else 
                            echo "<p style='font-weight: 800;font-size: 25px;font-family: Gotham-Book;'>Aucun projet à afficher</p>";
                    ?>
                </div>
            </section>
            <article class="opportunities" id="opportunities">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#FDFDFD" fill-opacity="1" d="M0,64L1440,224L1440,0L0,0Z"></path>
                </svg>
                <div id="opportunities-anchor"></div>
                <h2 class="icon">Les différents débouchés</h2>
                <p class="icon">
                    La polyvalence de la formation permet aux étudiants diplômés d'accéder à un grand panel de métiers.
                </p>
                <div class="gridContainer">
                    <div class="column-1">
                        <div id="DevWeb" class="icon">
                            <img src="assets/images/picto-03.png" alt="pictogramme développement web">
                            <span>Développeur Web</span>
                        </div>
                        <div id="Manager" class="icon">
                            <img src="assets/images/picto-07.png" alt="pictogramme manager">
                            <span>Community Manager</span>
                        </div>
                        <div id="Multimedia" class="icon">
                            <img src="assets/images/picto-04.png" alt="pictogramme multimédia">
                            <span>Réalisateur Multimédia</span>
                        </div>
                        <div id="Communication" class="icon">
                            <img src="assets/images/picto-08.png" alt="pictogramme communication">
                            <span>Chargé de Communication</span>
                        </div>
                    </div>
                    <div class="column-2">
                        <div id="Graphiste" class="icon">
                            <img src="assets/images/pictos-35.png" alt="pictogramme graphiste">
                            <span>Graphiste</span>
                        </div>
                        <div id="Motion" class="icon">
                            <img src="assets/images/pictos-11.png" alt="pictogramme motion design">
                            <span>Motion Designer</span>
                        </div>
                        <div id="Designer" class="icon">
                            <img src="assets/images/picto-06.png" alt="pictogramme designer">
                            <span>UX/UI Designer</span>
                        </div>
                        <div id="Chef" class="icon">
                            <img src="assets/images/picto-09.png" alt="pictogramme chef de projet multimédia">
                            <span>Chef de Projet Multimédia</span>
                        </div>
                    </div>
                </div>
                <form action="html/debouches.html" class="btn-pleins">
                    <button>En savoir plus</button>
                </form>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#FDFDFD" fill-opacity="1" d="M0,64L1440,224L1440,320L0,320Z"></path>
                </svg>
            </article>
        </section>

        <section class="departement">
            <div id="departement-anchor"></div>
            <h2>Le département MMI en photos</h2>
            <article class="gallery">
                <div class="row-1">
                    <div>
                        <img src="assets/images/_DSC9938.JPG" alt="image professeur" class="gallery-images">
                        <img src="assets/images/etudiants.jpg" alt="image étudiants" class="gallery-images">
                    </div>
                    <div>
                        <img src="assets/images/_DSC0068.JPG" alt="image du studio" class="gallery-images">
                    </div>
                </div>
                <div class="row-2">
                    <div>
                        <img src="assets/images/_DSC0026.JPG" alt="image ordinateur" class="gallery-images">
                    </div>
                </div>
            </article>
            <div class="popup-image">
                <span>&times;</span>
                <img src="" alt="">
            </div>
            <article class="poles">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#FFFFFF" fill-opacity="1" d="M0,256L1440,128L1440,0L0,0Z"></path>
                </svg>
                <h2 class="reveal">Les grands pôles de formation</h2>
                <div class="lists">
                    <ul class="audio-visual reveal">Audiovisuel
                        <li>Création de court-métrages</li>
                        <li>Découverte de la culture audio-visuelle</li>
                    </ul>
                    <ul class="dev reveal">Développement Web
                        <li>Création de sites web</li>
                        <li>Découverte de l'algorithmique</li>
                        <li>Création et utilisation de bases de données</li>
                    </ul>
                    <ul class="artistic-culture reveal">Culture Artistique
                        <li>Création d'éléments prints</li>
                        <li>Découverte de l'histoire des arts (photo, typographies)</li>
                    </ul>
                    <ul class="com reveal">Communication
                        <li>Découverte des grandes notions de la communication</li>
                        <li>Création de story-telling</li>
                    </ul>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#FFFFFF" fill-opacity="1" d="M0,256L1440,128L1440,320L0,320Z"></path>
                </svg>
            </article>
            <article class="realizations">
                <h2>Réalisations d'anciens étudiants</h2>
                <div class="realizations-gallery">
                    <div class="galleryContainer">
                        <img src="assets/images/affiches-4.jpg" alt="affiche évènement" class="realizations-images">
                        <img src="assets/images/SEMETEYS_louca_affiche_page-0001.jpg" alt="affiche évènement" class="realizations-images">
                        <img src="assets/images/affiche-5.png" alt="affiche DUT MMi" class="realizations-images">
                        <img src="assets/images/affiche.jpg" alt="affiche soirée d'intégration" class="realizations-images">
                    </div>
                </div>
                <div class="gallery-popup-image">
                    <span>&times;</span>
                    <img src="" alt="image pop-up">
                </div>
            </article>
        </section>

        <section class="localisation" id="localisation">
            <article class="building">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#FFFFFF" fill-opacity="1" d="M0,128L1440,224L1440,0L0,0Z"></path>
                </svg>
                <h2 class="reveal">La localisation</h2>
                <div class="reveal">
                    <div>
                        <p>
                            L'IUT d'Elbeuf est situé dans la ville d'Elbeuf, dans le département de la
                            Seine-Maritime, en Normandie, France. Le campus est facilement accessible en transport
                            en commun, avec des arrêts de bus à proximité et une gare à quelques minutes à pied. Il
                            existe plusieurs options de logement pour les étudiants de l'IUT d'Elbeuf.
                        </p>
                        <ul>L'IUT d'Elbeuf comprend :
                            <li>un amphi de 120 places</li>
                            <li>de nombreuses salles de cours</li>
                            <li>studio adapté à l'enseignement de la création de vidéo</li>
                        </ul>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2602.557192292105!2d1.002817015571164!3d49.28478727933153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e11ed4287dd85b%3A0xdeee92ad879e5f1d!2sIUT%20de%20Rouen%2C%20campus%20d&#39;Elbeuf%20-%20D%C3%A9pts%20M%C3%A9tiers%20du%20Multim%C3%A9dia%20et%20de%20l&#39;Internet%2C%20et%20R%C3%A9seaux%20%26%20T%C3%A9l%C3%A9communications!5e0!3m2!1sfr!2sfr!4v1678276334604!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </article>
            <article class="reveal">
                <div class="revealContainer test">
                    <div class="spanContainer">
                        <span class="numbers building-values-units" data-target="2">0</span>
                        <span class="text">bâtiments</span>
                    </div>
                    <div class="spanContainer">
                        <span class="numbers building-values-ten" data-target="10">0</span>
                        <span class="text">salles de TP</span>
                    </div>
                    <div class="spanContainer">
                        <span class="numbers building-values-units" data-target="2">0</span>
                        <span class="text">salles mac</span>
                    </div>
                    <div class="spanContainer">
                        <span class="numbers building-values-units" data-target="1">0</span>
                        <span class="text">studio</span>
                    </div>
                </div>
            </article>
            <div id="testimony-anchor"></div>
            <h2 id="testimony">Témoignages d'anciens étudiants</h2>
            <article class="testimony">
                <video controls>
                    <source src="assets/videos/interview.mp4" type="video/mp4">
                </video>
                <div class="speech-bubbles">
                    <div class="left reveal">
                        <div class="bubble bubble-bottom-left">
                            J’ai choisi MMI car c'est une formation qui propose un bon mélange entre
                            technique et artistique. Par son grand nombre de disciplines enseignées, c'est également
                            une formation qui favorise la découverte de soi (pour les lycéens encore un peu perdus) : les
                            domaines que l'on préfère, ceux que l'on aime moins, et ceux sur lesquels on souhaiterait
                            poursuivre.
                            Pour se plaire en MMI, il faut tout d'abord être intéressé par le web et le multimédia. Savoir
                            être curieux et polyvalent, en toutes circonstances. Les enseignements sont tous de qualité
                            ce qui facilite cette ouverture. L’esprit d’équipe et l’entraide sont également des valeurs
                            selon moi indispensables dans ce cursus, car les projets de groupe y sont nombreux.
                        </div>
                    </div>
                    <div class="right reveal">
                        <div class="bubble bubble-bottom-right">
                            J’ai choisi MMI pour la pluridisciplinarité des matières. J’hésitais
                            auparavant avec un DUT informatique, mais ayant un profil un peu plus orienté créa, je me
                            suis naturellement dirigé vers une filière web et multimédia. Je préférais les langages web
                            aux langages software. C’est une très bonne solution pour explorer pleins de domaines liés
                            au web, sans pour autant s’engager définitivement. C’est vraiment ça qui m’a plu dans cette
                            formation.
                            J’avais une vague idée du domaine dans lequel je voulais approfondir (développement web)
                            en arrivant, mais ça m’a permis de découvrir d’autres aspects et de prendre conscience des
                            problématiques des autres métiers, ce qui est très important dans la réalisation de projets.
                        </div>
                    </div>
                    <div class="left reveal">
                        <div class="bubble bubble-bottom-left">
                            J’ai toujours voulu faire un métier « artistique », et à l’époque déjà,
                            j’étais passionnée de dessin, de photographie et de montage vidéo. C’est pourquoi je me
                            suis tournée vers cette formation, principalement pour les enseignements en audiovisuel,
                            mais aussi pour la partie « web » que j’avais envie de découvrir. Je ne regrette pas d’avoir
                            fait MMI, d’une part pour toutes les compétences acquises dans des domaines très variés
                            (très utiles en entreprise), et d’autre part pour l’ambiance générale, avec une promotion
                            extraordinaire, et des professeurs impliqués et toujours à l’écoute. La charge de travail à
                            certaines périodes pouvait être compliquée à gérer, et pour ma part, il m’a été difficile de
                            réussir dans plusieurs matières techniques, ce qui peut être décourageant. Mais on ne peut
                            pas être bon partout, et je pense que l’important c’est de trouver sa voie et ce que l’on aime,
                            ce qui a été le cas pour moi.
                        </div>
                    </div>
                </div>
            </article>
        </section>

        <section class="admission">
            <article>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#FDFDFD" fill-opacity="1" d="M0,224L1440,96L1440,0L0,0Z"></path>
                </svg>
                <h2 class="reveal">Conditions d'admission</h2>
                <p class="reveal">
                    Le BUT MMI est une formation publique, les candidatures se font sur Parcoursup.
                    Le recrutement se fait selon le dossier et la motivation du candidat.
                    Pour le baccalauréat général, les enseignements de spécialités (options) les plus adaptés sont "Numérique et sciences informatique" et
                    "Arts" du fait de leur bonne complémentarité technique/artistique. Les autres options scientifiques, sont bienvenues pour
                    la rigueur qu'elles apportent au candidat. Dans tous les cas, aucune option n'est rédhibitoire pour candidater.
                    Pour le baccalauréat technologique, les séries STI2D et STL sont considérées comme les plus adaptées. La série STD2A est
                    également parfaitement envisageable. Les candidatures restent possible pour les autres séries.
                </p>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#FDFDFD" fill-opacity="1" d="M0,224L1440,96L1440,320L0,320Z"></path>
                </svg>
            </article>
        </section>

        <footer>
            <div class="footer-info">
                <div class="footer-wrappers">
                    <ul>
                        <li><a href="https://goo.gl/maps/Lr4AcntCDLAFjCZw8" target="_blank">24 cours Gambetta</a></li>
                        <li><a href="https://goo.gl/maps/zdG1WCuKwHKpkJ6Z8" target="_blank">76500 Elbeuf</a></li>
                        <li><a href="+33232961038">02 32 96 10 38</a></li>
                        <li><a href="mailto:secretariat-mmi-iutrouen@univ-rouen.fr">secretariat-mmi-iutrouen@univ-rouen.fr</a></li>
                    </ul>
                </div>
                <div class="footer-wrappers">
                    <ul>
                        <!-- <li><a href="https://ent.normandie-univ.fr" target="_blank">Espace Numérique de Travail</a></li> -->
                        <li><a href="https://www.parcoursup.fr/" target="_blank">Admission</a></li>
                        <!-- <li><a href="https://webmail.ac-normandie.fr" target="_blank">Webmail de Rouen</a></li> -->
                        <li><a href="http://iutrouen.univ-rouen.fr/" target="_blank">IUT Rouen</a></li>
                    </ul>
                </div>
                <div class="footer-wrappers social-networks">
                    <a href="https://www.instagram.com/mmi__elbeuf/?igshid=YmMyMTA2M2Y%3D" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48">
                            <path fill="none" d="M0 0h24v24H0z"/>
                            <path d="M12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0-2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm6.5-.25a1.25 1.25 0 0 1-2.5 0 1.25 1.25 0 0 1 2.5 0zM12 4c-2.474 0-2.878.007-4.029.058-.784.037-1.31.142-1.798.332-.434.168-.747.369-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.006 9.075 4 9.461 4 12c0 2.474.007 2.878.058 4.029.037.783.142 1.31.331 1.797.17.435.37.748.702 1.08.337.336.65.537 1.08.703.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.474 0 2.878-.007 4.029-.058.782-.037 1.309-.142 1.797-.331.433-.169.748-.37 1.08-.702.337-.337.538-.65.704-1.08.19-.493.296-1.02.332-1.8.052-1.104.058-1.49.058-4.029 0-2.474-.007-2.878-.058-4.029-.037-.782-.142-1.31-.332-1.798a2.911 2.911 0 0 0-.703-1.08 2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.925 4.006 14.539 4 12 4zm0-2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2z"/>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/groups/8314997/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48">
                            <path fill="none" d="M0 0h24v24H0z"/>
                            <path d="M18.335 18.339H15.67v-4.177c0-.996-.02-2.278-1.39-2.278-1.389 0-1.601 1.084-1.601 2.205v4.25h-2.666V9.75h2.56v1.17h.035c.358-.674 1.228-1.387 2.528-1.387 2.7 0 3.2 1.778 3.2 4.091v4.715zM7.003 8.575a1.546 1.546 0 0 1-1.548-1.549 1.548 1.548 0 1 1 1.547 1.549zm1.336 9.764H5.666V9.75H8.34v8.589zM19.67 3H4.329C3.593 3 3 3.58 3 4.297v15.406C3 20.42 3.594 21 4.328 21h15.338C20.4 21 21 20.42 21 19.703V4.297C21 3.58 20.4 3 19.666 3h.003z"/>
                        </svg>
                    </a>
                </div>
                <button class="footer-buttons">Adresse</button>
                <ul class="lists">
                    <li><a href="https://goo.gl/maps/Lr4AcntCDLAFjCZw8" target="_blank">24 cours Gambetta</a></li>
                    <li><a href="https://goo.gl/maps/zdG1WCuKwHKpkJ6Z8" target="_blank">76500 Elbeuf</a></li>
                    <li><a href="+33232961038">02 32 96 10 38</a></li>
                    <li><a href="mailto:secretariat-mmi-iutrouen@univ-rouen.fr">secretariat-mmi-iutrouen@univ-rouen.fr</a></li>
                </ul>
                <hr>
                <button class="footer-buttons">Liens utiles</button>
                <ul class="lists">
                    <!-- <li><a href="https://ent.normandie-univ.fr" target="_blank">ENT</a></li> -->
                    <li><a href="https://www.parcoursup.fr/" target="_blank">Admission</a></li>
                    <!-- <li><a href="https://webmail.ac-normandie.fr" target="_blank">Webmail de Rouen</a></li> -->
                    <li><a href="http://iutrouen.univ-rouen.fr/" target="_blank">IUT Rouen</a></li>
                </ul>
            </div>
        </footer>

    </main>

    <script src="js/loader.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/index.js"></script>
    <script src="js/footer.js"></script>
</body>
</html>