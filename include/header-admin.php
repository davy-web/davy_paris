<?php
if (isset($_POST['deconnexion'])) {
    deconnexion();
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dating Paris - Admin</title>
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
        <link rel="stylesheet" href="<?= URL ?>/include/css/style_nav_mobile.css">
        <link rel="stylesheet" href="<?= URL ?>/include/css/style_bootstrap-grid.min.css">
        <link rel="stylesheet" href="<?= URL ?>/include/css/style_bouton.css">
        <link rel="stylesheet" href="<?= URL ?>/include/css/style.css">
        <link rel="stylesheet" href="<?= URL ?>/include/css/style_admin.css">
    </head>
    
    <body class="body_admin_davy">
        <div class="container">
            <div class="header_sidebar_admin_davy py-3 fixed_top_davy">
                <!-- Menu -->
                <svg class="bouton_menu_davy" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g> <path fill="currentColor" d="M467,61H165c-24.82,0-45,20.19-45,45c0,24.82,20.18,45,45,45h302c24.81,0,45-20.18,45-45C512,81.19,491.81,61,467,61z"/></g><g> <path fill="currentColor" d="M467,211H165c-24.82,0-45,20.19-45,45c0,24.82,20.18,45,45,45h302c24.81,0,45-20.18,45-45C512,231.19,491.81,211,467,211z"/></g><g> <path fill="currentColor" d="M467,361H165c-24.82,0-45,20.19-45,45c0,24.82,20.18,45,45,45h302c24.81,0,45-20.18,45-45C512,381.19,491.81,361,467,361z"/></g><g> <path fill="currentColor" d="M45,61C20.18,61,0,81.19,0,106c0,24.82,20.18,45,45,45c24.81,0,45-20.18,45-45C90,81.19,69.81,61,45,61z"/></g><g> <path fill="currentColor" d="M45,211c-24.82,0-45,20.19-45,45c0,24.82,20.18,45,45,45c24.81,0,45-20.18,45-45C90,231.19,69.81,211,45,211z"/></g><g> <path fill="currentColor" d="M45,361c-24.82,0-45,20.19-45,45c0,24.82,20.18,45,45,45c24.81,0,45-20.18,45-45C90,381.19,69.81,361,45,361z"/></g></svg>
                <!-- Logo -->
                <a href="<?= URL ?>" title="Accueil" class="ms-3">
                    <img class="nav_icon_logo_admin_davy" src="<?= URL ?>/images/logo-dating-paris-min.png" alt="Logo">
                </a>
            </div>
            <div class="header_main_admin_davy py-3 fixed_top_davy">
                <!-- Logo -->
                <a href="<?= URL ?>" title="Accueil" class="logo_mobile_admin_davy">
                    <img class="nav_icon_logo_admin_davy" src="<?= URL ?>/images/logo-dating-paris-min.png" alt="Logo">
                </a>
                <form method="post" class="chercher_admin_davy">
                    <input type="text" id="chercher" name="chercher" placeholder="Chercher">
                </form>
            </div>
        </div>
        <div class="container">
            <div class="sidebar_admin_davy mt-5 pe-3 fixed_top_davy">
                <!-- Dashboard -->
                <div class="block_accordion_davy">
                    <a href="<?= URL ?>/admin/dashboard" title="Dashboard">
                        <button class="accordion_davy"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-pie" class="icon_admin svg-inline--fa fa-chart-pie fa-w-17 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512"><path fill="currentColor" d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"></path></svg> <span class="lien_panel_davy">Dashboard</span></button>
                    </a>
                </div>
                <div class="panel_davy">
                </div>
                <!-- Expériences -->
                <div class="block_accordion_davy">
                    <button class="accordion_davy fleche_accordion_davy"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" class="icon_admin svg-inline--fa fa-copy fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"></path></svg> <span class="lien_panel_davy">Expérience</span></button>
                </div>
                <div class="panel_davy">
                    <a href="<?= URL ?>/admin/gestion-experiences" title="Gestion expériences"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve" class="icon_admin"><circle fill="currentColor" cx="250" cy="250" r="65"/></svg> <span class="lien_panel_davy">Gestion</span></a>
                    <a href="<?= URL ?>/admin/ajouter-experience" title="Ajouter expérience"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve" class="icon_admin"><circle fill="currentColor" cx="250" cy="250" r="65"/></svg> <span class="lien_panel_davy">Ajouter</span></a>
                </div>
                <!-- Box -->
                <div class="block_accordion_davy">
                    <button class="accordion_davy fleche_accordion_davy"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-plus" class="icon_admin svg-inline--fa fa-cart-plus fa-w-18 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z"></path></svg> <span class="lien_panel_davy">Box</span></button>
                </div>
                <div class="panel_davy">
                    <a href="<?= URL ?>/admin/gestion-box" title="Gestion Box"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve" class="icon_admin"><circle fill="currentColor" cx="250" cy="250" r="65"/></svg> <span class="lien_panel_davy">Gestion</span></a>
                    <a href="<?= URL ?>/admin/ajouter-box" title="Ajouter Box"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve" class="icon_admin"><circle fill="currentColor" cx="250" cy="250" r="65"/></svg> <span class="lien_panel_davy">Ajouter</span></a>
                    <a href="<?= URL ?>/admin/commande" title="Commande"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve" class="icon_admin"><circle fill="currentColor" cx="250" cy="250" r="65"/></svg> <span class="lien_panel_davy">Commande</span></a>
                </div>
                <!-- Mail -->
                <div class="block_accordion_davy">
                    <a href="<?= URL ?>/admin/mail" title="Mail">
                        <button class="accordion_davy"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope-open" class="icon_admin svg-inline--fa fa-envelope-open fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 464c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V200.724a48 48 0 0 1 18.387-37.776c24.913-19.529 45.501-35.365 164.2-121.511C199.412 29.17 232.797-.347 256 .003c23.198-.354 56.596 29.172 73.413 41.433 118.687 86.137 139.303 101.995 164.2 121.512A48 48 0 0 1 512 200.724V464zm-65.666-196.605c-2.563-3.728-7.7-4.595-11.339-1.907-22.845 16.873-55.462 40.705-105.582 77.079-16.825 12.266-50.21 41.781-73.413 41.43-23.211.344-56.559-29.143-73.413-41.43-50.114-36.37-82.734-60.204-105.582-77.079-3.639-2.688-8.776-1.821-11.339 1.907l-9.072 13.196a7.998 7.998 0 0 0 1.839 10.967c22.887 16.899 55.454 40.69 105.303 76.868 20.274 14.781 56.524 47.813 92.264 47.573 35.724.242 71.961-32.771 92.263-47.573 49.85-36.179 82.418-59.97 105.303-76.868a7.998 7.998 0 0 0 1.839-10.967l-9.071-13.196z"></path></svg> <span class="lien_panel_davy">Mail</span></button>
                    </a>
                </div>
                <div class="panel_davy">
                </div>
                <!-- Comptes -->
                <div class="block_accordion_davy">
                    <a href="<?= URL ?>/admin/gestion-comptes" title="Comptes">
                        <button class="accordion_davy"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock" class="icon_admin svg-inline--fa fa-lock fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path></svg> <span class="lien_panel_davy">Comptes</span></button>
                    </a>
                </div>
                <div class="panel_davy">
                </div>
                <hr class="hr_admin_davy">
                <!-- Paramètres -->
                <div class="block_accordion_davy">
                    <button class="accordion_davy"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="parametre" class="icon_admin svg-inline--fa fa-lock fa-w-14 " role="img" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="currentColor"></path></svg> <span class="lien_panel_davy">Paramètres</span></button>
                </div>
                <div class="panel_davy">
                </div>
                <hr class="hr_admin_davy">
                <form method="post" id="bouton_deconnecter_davy">
                    <!-- bouton_anim_davy -->
                    <a aria-label="Quitter" class="bouton_anim_davy bouton_envoyer block_center_davy width_full_davy" data-text="Déconnecter" title="Déconnecter">
                        <span>Q</span>
                        <span>u</span>
                        <span>i</span>
                        <span>t</span>
                        <span>t</span>
                        <span>e</span>
                        <span>r</span>
                        <input type="submit" id="deconnexion" name="deconnexion" value="Déconnecter" class="bouton_submit">
                    </a>
                </form>
            </div>

            <!-- nav_mobile_davy -->
            <div class="nav_mobile_davy">
                <div class="nav_mobile_center_davy">
                    <a href="<?= URL ?>/admin/gestion-experiences" class="menu_mobile_davy" title="Expériences">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" class="icon_menu_mobile_davy svg-inline--fa fa-copy fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"></path></svg>
                        <br>
                        <p class="texte_menu_mobile_davy">Expériences</p>
                    </a>
                    <a href="<?= URL ?>/admin/gestion-box" class="menu_mobile_davy" title="Box">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-plus" class="icon_menu_mobile_davy svg-inline--fa fa-cart-plus fa-w-18 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z"></path></svg>
                        <br>
                        <p class="texte_menu_mobile_davy">Box</p>
                    </a>
                    <a href="<?= URL ?>/admin/commande" class="menu_mobile_davy" title="Commande">
                        <svg version="1.1" id="Calque_1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon_menu_mobile_davy" x="0px" y="0px" viewBox="0 0 576 512" style="enable-background:new 0 0 576 512;" xml:space="preserve"><path fill="currentColor" d="M504.7,320H211.6l6.5,32h268.4c15.4,0,26.8,14.3,23.4,29.3l-5.5,24.3c18.7,9.1,31.6,28.2,31.6,50.4 c0,31.2-25.5,56.4-56.8,56c-29.8-0.4-54.4-24.6-55.2-54.4c-0.4-16.3,6.1-31,16.8-41.5H231.2c10.4,10.2,16.8,24.3,16.8,40 c0,31.8-26.5,57.4-58.7,55.9c-28.5-1.3-51.8-24.4-53.3-52.9c-1.2-22,10.4-41.5,28.1-51.6L93.9,64H24C10.7,64,0,53.3,0,40V24 C0,10.7,10.7,0,24,0h102.5c11.4,0,21.2,8,23.5,19.2l9.2,44.8H552c15.4,0,26.8,14.3,23.4,29.3l-47.3,208 C525.6,312.2,515.9,320,504.7,320z"/></svg>
                        <br>
                        <p class="texte_menu_mobile_davy">Commande</p>
                    </a>
                    <a href="<?= URL ?>/admin/mail" class="menu_mobile_davy" title="Mail">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope-open" class="icon_menu_mobile_davy svg-inline--fa fa-envelope-open fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 464c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V200.724a48 48 0 0 1 18.387-37.776c24.913-19.529 45.501-35.365 164.2-121.511C199.412 29.17 232.797-.347 256 .003c23.198-.354 56.596 29.172 73.413 41.433 118.687 86.137 139.303 101.995 164.2 121.512A48 48 0 0 1 512 200.724V464zm-65.666-196.605c-2.563-3.728-7.7-4.595-11.339-1.907-22.845 16.873-55.462 40.705-105.582 77.079-16.825 12.266-50.21 41.781-73.413 41.43-23.211.344-56.559-29.143-73.413-41.43-50.114-36.37-82.734-60.204-105.582-77.079-3.639-2.688-8.776-1.821-11.339 1.907l-9.072 13.196a7.998 7.998 0 0 0 1.839 10.967c22.887 16.899 55.454 40.69 105.303 76.868 20.274 14.781 56.524 47.813 92.264 47.573 35.724.242 71.961-32.771 92.263-47.573 49.85-36.179 82.418-59.97 105.303-76.868a7.998 7.998 0 0 0 1.839-10.967l-9.071-13.196z"></path></svg>
                        <br>
                        <p class="texte_menu_mobile_davy">Mail</p>
                    </a>
                    <a class="menu_mobile_davy" title="Menu">
                        <div class="block_icon_menu_mobile_burger_davy">
                            <input id="nav_icon_menu_mobile_burger_davy" class="checkbox_pc_burger_davy" type="checkbox" name="menu_pc">
                            <span href="#" class="nav_icon_menu_mobile_burger_davy"><span></span></span>
                        </div><br>
                        <p class="texte_menu_mobile_davy">Menu</p>
                    </a>
                </div>
            </div>

            <!-- nav_mobile_burger_davy -->
            <div class="nav_mobile_burger_davy">
                <div class="m-5">
                    <a href="<?= URL ?>" title="À propos" class="d-inline-block width_full_davy">Accueil</a>
                    <hr class="hr_admin_davy">
                    <a href="<?= URL ?>/admin/dashboard" title="Dashboard" class="d-inline-block width_full_davy">Dashboard</a>
                    <hr class="hr_admin_davy">
                    <a href="<?= URL ?>/admin/gestion-experiences" title="Gestion expériences" class="d-inline-block width_full_davy">Gestion expériences</a>
                    <hr class="hr_admin_davy">
                    <a href="<?= URL ?>/admin/ajouter-experience" title="Ajouter expérience" class="d-inline-block width_full_davy">Ajouter expérience</a>
                    <hr class="hr_admin_davy">
                    <a href="<?= URL ?>/admin/gestion-box" title="Gestion Box" class="d-inline-block width_full_davy">Gestion Box</a>
                    <hr class="hr_admin_davy">
                    <a href="<?= URL ?>/admin/ajouter-box" title="Ajouter Box" class="d-inline-block width_full_davy">Ajouter Box</a>
                    <hr class="hr_admin_davy">
                    <a href="<?= URL ?>/admin/commande" title="Commande" class="d-inline-block width_full_davy">Commande</a>
                    <hr class="hr_admin_davy">
                    <a href="<?= URL ?>/admin/mail" title="Mail" class="d-inline-block width_full_davy">Mail</a>
                    <hr class="hr_admin_davy">
                    <a href="<?= URL ?>/admin/gestion-comptes" title="Comptes" class="d-inline-block width_full_davy">Comptes</a>
                </div>
            </div>
            <div class="main_admin_davy">