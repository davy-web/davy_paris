<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dating Paris</title>
        <meta name="description" content="Trouver des idées d'activités à faire en couple">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:url" content="https://dating-paris.davy-chen.fr">
        <meta property="og:type" content="article">
        <meta property="og:title" content="Dating Paris">
        <meta property="og:description" content="Trouver des idées d'activités à faire en couple">
        <meta property="og:image" content="<?= URL ?>/images/logo-petit-min.png">
        <link rel="shortcut icon" type="image/x-icon" href="<?= URL ?>/images/logo-petit-min.png">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="<?= URL ?>/include/css/style_bootstrap-grid.min.css">
        <link rel="stylesheet" href="<?= URL ?>/include/css/style_nav_mobile.css">
        <link rel="stylesheet" href="<?= URL ?>/include/css/style_nav_pc.css">
        <link rel="stylesheet" href="<?= URL ?>/include/css/style_bouton.css">
        <link rel="stylesheet" href="<?= URL ?>/include/css/style_cookie_davy.css">
        <link rel="stylesheet" href="<?= URL ?>/include/css/style.css">
        <?php if (!isset($_SESSION['cookie']) || (isset($_SESSION['cookie']) && $_SESSION['cookie'] == "accepter")) : ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-G406M88ZED"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-G406M88ZED');
        </script>
        <?php endif; ?>
    </head>
    
    <body>
        <header>
            <!-- nav_pc_davy -->
            <div class="nav_pc_davy">
                <div class="nav_block_pc_davy container">
                    <div class="nav_gauche_pc_davy">
                        <a href="<?= URL ?>" title="Accueil">
                            <img class="nav_icon_logo_pc_davy" src="<?= URL ?>/images/logo-dating-paris-min.png" alt="Logo">
                        </a>
                    </div>
                    <div class="nav_centre_pc_davy">
                        <a href="<?= URL ?>/a-propos" class="menu_lien_pc_davy" title="À propos">À propos</a>
                        <a href="<?= URL ?>/liste-experiences" class="menu_lien_pc_davy" title="Des Idées">Idées d'activités</a>
                        <a href="<?= URL ?>/liste-box" class="menu_lien_pc_davy" title="Nox Box">Nox Box</a>
                        <a href="<?= URL ?>/contact" class="menu_lien_pc_davy" title="Contact">Contact</a>
                    </div>
                    <div class="nav_droite_pc_davy">
                        <a href="<?= URL ?>/<?php if (isset($_SESSION['membre']) && $_SESSION['membre']['statut'] == 2) {echo 'admin/dashboard';} else {echo 'profil';} ?>" class="menu_lien_pc_droite_davy" title="Profil"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 350 350" style="enable-background:new 0 0 350 350;" class="icon_nav_davy" xml:space="preserve"><path fill="currentColor" d="M175,171.173c38.914,0,70.463-38.318,70.463-85.586C245.463,38.318,235.105,0,175,0s-70.465,38.318-70.465,85.587 C104.535,132.855,136.084,171.173,175,171.173z"/><path fill="currentColor" d="M41.909,301.853C41.897,298.971,41.885,301.041,41.909,301.853L41.909,301.853z"/><path fill="currentColor" d="M308.085,304.104C308.123,303.315,308.098,298.63,308.085,304.104L308.085,304.104z"/><path fill="currentColor" d="M307.935,298.397c-1.305-82.342-12.059-105.805-94.352-120.657c0,0-11.584,14.761-38.584,14.761 s-38.586-14.761-38.586-14.761c-81.395,14.69-92.803,37.805-94.303,117.982c-0.123,6.547-0.18,6.891-0.202,6.131 c0.005,1.424,0.011,4.058,0.011,8.651c0,0,19.592,39.496,133.08,39.496c113.486,0,133.08-39.496,133.08-39.496 c0-2.951,0.002-5.003,0.005-6.399C308.062,304.575,308.018,303.664,307.935,298.397z"/></svg></a>
                        <a href="<?= URL ?>/favoris" class="menu_lien_pc_droite_davy" title="Favoris"><svg viewBox="0 -28 512.00002 512" xmlns="http://www.w3.org/2000/svg" class="icon_nav_davy"><path fill="currentColor" d="m471.382812 44.578125c-26.503906-28.746094-62.871093-44.578125-102.410156-44.578125-29.554687 0-56.621094 9.34375-80.449218 27.769531-12.023438 9.300781-22.917969 20.679688-32.523438 33.960938-9.601562-13.277344-20.5-24.660157-32.527344-33.960938-23.824218-18.425781-50.890625-27.769531-80.445312-27.769531-39.539063 0-75.910156 15.832031-102.414063 44.578125-26.1875 28.410156-40.613281 67.222656-40.613281 109.292969 0 43.300781 16.136719 82.9375 50.78125 124.742187 30.992188 37.394531 75.535156 75.355469 127.117188 119.3125 17.613281 15.011719 37.578124 32.027344 58.308593 50.152344 5.476563 4.796875 12.503907 7.4375 19.792969 7.4375 7.285156 0 14.316406-2.640625 19.785156-7.429687 20.730469-18.128907 40.707032-35.152344 58.328125-50.171876 51.574219-43.949218 96.117188-81.90625 127.109375-119.304687 34.644532-41.800781 50.777344-81.4375 50.777344-124.742187 0-42.066407-14.425781-80.878907-40.617188-109.289063zm0 0"/></svg></a>
                        <a href="<?= URL ?>/panier" class="menu_lien_pc_droite_davy" title="Panier"><svg version="1.1" id="Calque_1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon_nav_davy" x="0px" y="0px" viewBox="0 0 576 512" style="enable-background:new 0 0 576 512;" xml:space="preserve"><path fill="currentColor" d="M504.7,320H211.6l6.5,32h268.4c15.4,0,26.8,14.3,23.4,29.3l-5.5,24.3c18.7,9.1,31.6,28.2,31.6,50.4 c0,31.2-25.5,56.4-56.8,56c-29.8-0.4-54.4-24.6-55.2-54.4c-0.4-16.3,6.1-31,16.8-41.5H231.2c10.4,10.2,16.8,24.3,16.8,40 c0,31.8-26.5,57.4-58.7,55.9c-28.5-1.3-51.8-24.4-53.3-52.9c-1.2-22,10.4-41.5,28.1-51.6L93.9,64H24C10.7,64,0,53.3,0,40V24 C0,10.7,10.7,0,24,0h102.5c11.4,0,21.2,8,23.5,19.2l9.2,44.8H552c15.4,0,26.8,14.3,23.4,29.3l-47.3,208 C525.6,312.2,515.9,320,504.7,320z"/></svg><span class="panier_lien_pc_droite_davy"><?php if (isset($_SESSION['panier']['id_produit'])) {echo count($_SESSION['panier']['id_produit']);} else {echo "0";} ?></span></a>
                    </div>
                </div>
            </div>

            <!-- nav_mobile_davy -->
            <div class="nav_mobile_davy">
                <div class="nav_mobile_center_davy">
                    <a href="<?= URL ?>/liste-experiences" class="menu_mobile_davy" title="Activités">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon_menu_mobile_davy" x="0px" y="0px" width="97.713px" height="97.713px" viewBox="0 0 97.713 97.713" style="enable-background:new 0 0 97.713 97.713;" xml:space="preserve"><path fill="currentColor" d="M48.855,0C29.021,0,12.883,16.138,12.883,35.974c0,5.174,1.059,10.114,3.146,14.684	c8.994,19.681,26.238,40.46,31.31,46.359c0.38,0.441,0.934,0.695,1.517,0.695s1.137-0.254,1.517-0.695 c5.07-5.898,22.314-26.676,31.311-46.359c2.088-4.57,3.146-9.51,3.146-14.684C84.828,16.138,68.69,0,48.855,0z M48.855,54.659 c-10.303,0-18.686-8.383-18.686-18.686c0-10.304,8.383-18.687,18.686-18.687s18.686,8.383,18.686,18.687 C67.542,46.276,59.159,54.659,48.855,54.659z"/></svg>
                        <br>
                        <p class="texte_menu_mobile_davy">Activités</p>
                    </a>
                    <a href="<?= URL ?>/liste-box" class="menu_mobile_davy" title="Box">
                        <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon_menu_mobile_davy" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path fill="currentColor" d="M354.8,152.7h-18V71.9h4.5c5,0,9-4,9-9V13.5c0-5-4-9-9-9H170.7c-5,0-9,4-9,9v49.4c0,5,4,9,9,9h4.5v80.8h-18 c-24.8,0-44.9,20.1-44.9,44.9V331v28.3v71.9v4.4v4.6c0,9.9,8,18,18,18h18v40.4c0,7.4,6,13.5,13.5,13.5c7.4,0,13.5-6,13.5-13.5v-40.4 h161.7v40.4c0,7.4,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-40.4h18c9.9,0,18-8,18-18v-4.6v-4.4v-71.9V331V197.6 C399.7,172.8,379.6,152.7,354.8,152.7z M193.1,71.9c5,0,9-4,9-9v-18c0-5,4-9,9-9h89.8c5,0,9,4,9,9v18c0,5,4,9,9,9v80.8H193.1V71.9z"/></svg>
                        <br>
                        <p class="texte_menu_mobile_davy">Box</p>
                    </a>
                    <a href="<?= URL ?>/<?php if (isset($_SESSION['membre']) && $_SESSION['membre']['statut'] == 2) {echo 'admin/dashboard';} else {echo 'profil';} ?>" class="menu_mobile_davy" title="Favoris">
                        <svg viewBox="0 -28 512.00002 512" xmlns="http://www.w3.org/2000/svg" class="icon_menu_mobile_davy"><path fill="currentColor" d="m471.382812 44.578125c-26.503906-28.746094-62.871093-44.578125-102.410156-44.578125-29.554687 0-56.621094 9.34375-80.449218 27.769531-12.023438 9.300781-22.917969 20.679688-32.523438 33.960938-9.601562-13.277344-20.5-24.660157-32.527344-33.960938-23.824218-18.425781-50.890625-27.769531-80.445312-27.769531-39.539063 0-75.910156 15.832031-102.414063 44.578125-26.1875 28.410156-40.613281 67.222656-40.613281 109.292969 0 43.300781 16.136719 82.9375 50.78125 124.742187 30.992188 37.394531 75.535156 75.355469 127.117188 119.3125 17.613281 15.011719 37.578124 32.027344 58.308593 50.152344 5.476563 4.796875 12.503907 7.4375 19.792969 7.4375 7.285156 0 14.316406-2.640625 19.785156-7.429687 20.730469-18.128907 40.707032-35.152344 58.328125-50.171876 51.574219-43.949218 96.117188-81.90625 127.109375-119.304687 34.644532-41.800781 50.777344-81.4375 50.777344-124.742187 0-42.066407-14.425781-80.878907-40.617188-109.289063zm0 0"/></svg>
                        <br>
                        <p class="texte_menu_mobile_davy">Favoris</p>
                    </a>
                    <a href="<?= URL ?>/panier" class="menu_mobile_davy" title="Panier">
                        <svg version="1.1" id="Calque_1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon_menu_mobile_davy" x="0px" y="0px" viewBox="0 0 576 512" style="enable-background:new 0 0 576 512;" xml:space="preserve"><path fill="currentColor" d="M504.7,320H211.6l6.5,32h268.4c15.4,0,26.8,14.3,23.4,29.3l-5.5,24.3c18.7,9.1,31.6,28.2,31.6,50.4 c0,31.2-25.5,56.4-56.8,56c-29.8-0.4-54.4-24.6-55.2-54.4c-0.4-16.3,6.1-31,16.8-41.5H231.2c10.4,10.2,16.8,24.3,16.8,40 c0,31.8-26.5,57.4-58.7,55.9c-28.5-1.3-51.8-24.4-53.3-52.9c-1.2-22,10.4-41.5,28.1-51.6L93.9,64H24C10.7,64,0,53.3,0,40V24 C0,10.7,10.7,0,24,0h102.5c11.4,0,21.2,8,23.5,19.2l9.2,44.8H552c15.4,0,26.8,14.3,23.4,29.3l-47.3,208 C525.6,312.2,515.9,320,504.7,320z"/></svg>
                        <br>
                        <p class="texte_menu_mobile_davy">Panier</p>
                    </a>
                    <a href="#" class="menu_mobile_davy" title="Menu">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon_menu_mobile_davy" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g> <path fill="currentColor" d="M467,61H165c-24.82,0-45,20.19-45,45c0,24.82,20.18,45,45,45h302c24.81,0,45-20.18,45-45C512,81.19,491.81,61,467,61z"/></g><g> <path fill="currentColor" d="M467,211H165c-24.82,0-45,20.19-45,45c0,24.82,20.18,45,45,45h302c24.81,0,45-20.18,45-45C512,231.19,491.81,211,467,211z"/></g><g> <path fill="currentColor" d="M467,361H165c-24.82,0-45,20.19-45,45c0,24.82,20.18,45,45,45h302c24.81,0,45-20.18,45-45C512,381.19,491.81,361,467,361z"/></g><g> <path fill="currentColor" d="M45,61C20.18,61,0,81.19,0,106c0,24.82,20.18,45,45,45c24.81,0,45-20.18,45-45C90,81.19,69.81,61,45,61z"/></g><g> <path fill="currentColor" d="M45,211c-24.82,0-45,20.19-45,45c0,24.82,20.18,45,45,45c24.81,0,45-20.18,45-45C90,231.19,69.81,211,45,211z"/></g><g> <path fill="currentColor" d="M45,361c-24.82,0-45,20.19-45,45c0,24.82,20.18,45,45,45c24.81,0,45-20.18,45-45C90,381.19,69.81,361,45,361z"/></g></svg>
                        <br>
                        <p class="texte_menu_mobile_davy">Menu</p>
                    </a>
                </div>
            </div>
        </header>
        