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
                    <h2>A propos</h2>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div>

            <!-- A propos -->
            <div class="container mt-5">
                <div class="row flex_flow_davy">
                    <div class="col-md mb-3">
                        <h1 class="h2_moyen_davy">Présentation <span class="color_red_davy serif_davy">de Dating Paris</span></h1>
                        <hr class="anime_scroll_davy">
                        <p>Après avoir réalisé des dates à Paris, riche en petits moments et de magies. Je décide de partager mes découvertes afin d’offrir mon expérience pour des couples et à qui le désire. C’est ainsi que le site web Dating Paris voit le jour.</p><br>
                    </div>
                    <div class="col-md mb-3">
                        <div class="cadre_image_page_davy">
                            <img src="<?= URL ?>/images/photo-a-propos-min.jpg" class="image_page_davy" alt="a-propos">
                            <img src="<?= URL ?>/images/trait-rouge.png" class="trait_rouge" alt="Cadre">
                            <img src="<?= URL ?>/images/trait-2-rouge.png" class="trait_2_rouge" alt="Cadre">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations complémentaires -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">Le <span class="color_red_davy serif_davy">fonctionnement</span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container mb-3">
                <div class="row">
                    <p>Le concept est on ne peut plus simple : vous choisissez le coffret que vous souhaitez offrir à vos proches, et ces derniers n’ont plus qu’à choisir dans le guide ou sur le site de Wonderbox l’activité qu’ils souhaitent tester, et à réserver directement la date en contactant le partenaire. Ils n’ont rien d’autre à payer !</p>
                </div>
            </div>
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">L'<span class="color_red_davy serif_davy">offre</span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container mb-3">
                <div class="row">
                    <p>Avec nos coffrets, difficile de ne pas trouver votre bonheur ! La marque propose des activités de bien-être, de gastronomie, de sport et d’aventure, de loisirs variés, et bien entendu des séjours aux durées et thèmes variables.</p>
                </div>
            </div>

            <!-- script -->
            <script src="<?= URL ?>/include/js/script_nav_lien.js"></script>
            <script>nav_lien_active("lien_a_propos");</script>
        </div>
        <?php nb_visit_page($pdo_object, "A-propos"); ?>
<?php
require_once("include/footer.php");
?>