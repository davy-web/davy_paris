<?php 
require_once("include/init.php");
require_once("include/fonctions.php");
require_once("include/header.php");
?>

        <div id="content_davy">
            <!-- style -->
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_intro_2.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_page.css">
            
            <!-- intro - anime_scroll_relative_content_davy -->
            <div class="block_anime_scroll_relative_content_1_davy">
                <img class="anime_scroll_relative_content_1_2_davy anime_scroll_relative_content_1_davy" src="<?= URL ?>/images/fond-menu-2-min.png" alt="Fond menu">
                <div class="anime_scroll_relative_content_1_1_davy anime_scroll_relative_content_1_davy container">
                    <h2>Mentions légales</h2>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div>

            <!-- Mentions légales -->
            <div class="container text_center_davy mt-5 mb-3">
                <p class="color_red_davy"><strong>En vigueur au 06/01/2021</strong></p>
                <h1 class="h2_moyen_davy">Conditions générales d’utilisation</h1>
                <hr class="anime_scroll_davy block_center_davy">
            </div>
            <div class="container mb-3">
                <div class="row">
                    <p class="mb-5">Les présentes conditions générales d’utilisation ont pour objet l’encadrement juridique des modalités de mise à disposition du site et des services par et de définir les conditions d’accès et d’utilisation des services par « l’Utilisateur ».<br><br>
                    Les présentes CGU sont accessibles sur le site à la rubrique «Mentions légales».</p>
                    <h3 class="color_red_davy">Article 1 : L’éditeur</h3>
                    <p class="mb-5">L’édition du site dating-paris.one-website.com est assurée par Davy CHEN.<br>
                    Numéro de téléphone +33(0) 7 81 65 80 78<br>
                    Adresse e-mail : chendavyweb@gmail.com<br>
                    Le Directeur de la publication est : Davy CHEN</p>
                    <h3 class="color_red_davy">Article 2 : L’hébergeur</h3>
                    <p class="mb-5">L’hébergeur du site dating-paris.one-website.com est la Société O2Switch, dont le siège social est situé au 222 Boulevard Gustave Flaubert, 63000 Clermont-Ferrand – France , avec le numéro de téléphone : 04 44 44 60 40.</p>
                    <h3 class="color_red_davy">Article 3 : Accès au site</h3>
                    <p class="mb-5">Le site est accessible par tout endroit, 7j/7, 24h/24 sauf cas de force majeure, interruption programmée ou non et pouvant découlant d’une nécessité de maintenance.<br><br>En cas de modification, interruption ou suspension des services le site dating-paris.one-website.com ne saurait être tenu responsable.</p>
                    <h3 class="color_red_davy">Article 4 : Collecte des données</h3>
                    <p class="mb-5">Le site assure à l'Utilisateur une collecte et un traitement d'informations personnelles dans le respect de la vie privée conformément à la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés.<br><br>En vertu de la loi Informatique et Libertés, en date du 6 janvier 1978, l'Utilisateur dispose d'un droit d'accès, de rectification, de suppression et d'opposition de ses données personnelles.</p>
                    <h3 class="color_red_davy">Article 5 : Cookies</h3>
                    <p class="mb-5">L’Utilisateur est informé que lors de ses visites sur le site, un cookie peut s’installer automatiquement sur son logiciel de navigation.<br><br>En naviguant sur le site, il les accepte.<br><br>Un cookie est un élément qui ne permet pas d’identifier l’Utilisateur mais sert à enregistrer des informations relatives à la navigation de celui-ci sur le site Internet. L’Utilisateur pourra désactiver ce cookie par l’intermédiaire des paramètres figurant au sein de son logiciel de navigation.</p>
                    <h3 class="color_red_davy">Article 6 : Propriété intellectuelle</h3>
                    <p class="mb-5">Les illustrations viennent du site Freepik <a href="https://fr.freepik.com/" title="https://fr.freepik.com/">(fr.freepik.com)</a></p>
                </div>
            </div>
        </div>
        <?php nb_visit_page($pdo_object, "Mentions"); ?>
<?php
require_once("include/footer.php");
?>