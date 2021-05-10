<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Liste produits
$pdo_statement = $pdo_object->prepare("SELECT * FROM produit ORDER BY RAND() LIMIT 4");
$pdo_statement->execute();
// Liste articles
$pdo_statement_2 = $pdo_object->prepare("SELECT * FROM article ORDER BY RAND() LIMIT 5");
$pdo_statement_2->execute();
$pdo_statement_3 = $pdo_object->prepare("SELECT * FROM article ORDER BY RAND() LIMIT 5");
$pdo_statement_3->execute();
$tableau_3 = [];

require_once("include/header.php");
?>

        <div id="content_davy">
            <!-- style -->
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_intro.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_slick.min.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_slick_theme.min.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_slider.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_cadre.css">
            
            <!-- intro - anime_scroll_relative_content_davy -->
            <div class="block_anime_scroll_relative_content_1_davy">
                <img class="anime_scroll_relative_content_1_5_davy anime_scroll_relative_content_1_davy" src="<?= URL ?>/images/fond-menu-min.png" alt="Fond menu">
                <img class="anime_scroll_relative_content_1_4_davy anime_scroll_relative_content_1_davy" src="<?= URL ?>/images/dating-paris-2-min.png" alt="Dating Paris">
                <img class="anime_scroll_relative_content_1_3_davy anime_scroll_relative_content_1_davy" src="<?= URL ?>/images/couple-min.png" alt="Couple">
                <img class="anime_scroll_relative_content_1_2_davy anime_scroll_relative_content_1_davy" src="<?= URL ?>/images/dating-paris-min.png" alt="Dating Paris">
                <div class="anime_scroll_relative_content_1_1_davy anime_scroll_relative_content_1_davy container">
                    <h1>Box de voyage</h1>
                    <p>Offrir un moment intime</p>
                    <p>
                        <!-- bouton_anim_davy -->
                        <a aria-label="Voyage" class="bouton_anim_davy float_right_davy" data-text="Personnaliser" href="#" title="Box voyage">
                            <span>V</span>
                            <span>o</span>
                            <span>y</span>
                            <span>a</span>
                            <span>g</span>
                            <span>e</span>
                        </a>
                    </p>
                </div>
            </div>

            <!-- Présentation -->
            <div class="block_content_medium_davy block_center_davy text_center_davy">
                <h2>Présentation</h2>
                <hr class="block_center_davy anime_scroll_davy">
                <p>Après un voyage de noces autour du monde, riche en expériences et petits moments magiques, ils décident de partager leur amour de la découverte afin d’offrir une parenthèse enchantée, d’abord à leurs proches, puis à qui le désire.<br>C’est ainsi que la société Dating Paris voit le jour.</p>
            </div>
            
            <!-- Les activités -->
            <div class="slider_davy mt-5">
                <div class="slider slider-nav">
                    <?php $i = 1; ?>
                    <?php while ($article_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC)) : ?>
                    <?php $i++; ?>
                    <div class="block_slider_davy">
                        <div class="gauche_slider_davy">
                            <div class="cadre_image_slider_davy">
                                <img src="<?= URL ?>/images/<?= $article_array['photo'] ?>" class="image_slider_davy" alt="Louvre">
                                <img src="<?= URL ?>/images/trait-rouge.png" class="trait_rouge" alt="Cadre">
                                <img src="<?= URL ?>/images/trait-2-rouge.png" class="trait_2_rouge" alt="Cadre">
                            </div>
                        </div>
                        <div class="droite_slider_davy">
                            <h2 class="titre_slider_davy h2_grand_davy"><?= $article_array['categorie'] ?></h2>
                            <h2 class="color_red_davy h2_grand_davy"><?= $article_array['titre'] ?></h2>
                            <p><?= $article_array['description'] ?></p>
                            <br>
                            <p class="bouton_slider_davy">
                                <!-- bouton_anim_davy -->
                                <a aria-label="Voir" class="bouton_anim_davy" data-text="En savoir plus" href="<?= URL ?>/experience=<?= $article_array['id_article'] ?>" title="Voir">
                                    <span>V</span>
                                    <span>o</span>
                                    <span>i</span>
                                    <span>r</span>
                                </a>
                                <a href="#" data-slide="<?php echo $i; ?>" class="bouton_2_anim_davy" title="Suivant">
                                    <span>></span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div><br><br>
            
            <!-- Nos Box de voyages -->
            <div class="container mt-5 mb-3">
                <h2>Nos box <span class="color_red_davy serif_davy">de voyages</span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container">
                <div class="row">
                    <?php if ($pdo_statement->rowCount() > 0) : ?>
                    <?php while ($produit_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="cadre_davy">
                            <div class="image_cadre_davy">
                                <img src="<?= URL ?>/images/<?= $produit_array['photo'] ?>" class="image_cadre_2_davy" alt="<?= $produit_array['photo'] ?>">
                                <img src="<?= URL ?>/images/cadre-2-min.png" class="image_cadre_1_davy" alt="Cadre">
                            </div>
                            <p class="texte_cadre_davy">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <br>
                                <strong><?= $produit_array['titre'] ?></strong><br>
                                Lieu touristique<br><br>
                                <strong class="prix_cadre_davy"><?= $produit_array['prix'] ?>€</strong>
                                <a href="<?= URL ?>/box=<?= $produit_array['id_produit'] ?>" title="<?= URL ?>/box=<?= $produit_array['id_produit'] ?>"><i class="icon_cadre_davy"><img src="<?= URL ?>/images/icon-voir-min.png" class="image_cadre_icon_davy" alt="Icon voir"></i></a>
                            </p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <p>Aucun produit</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="text_center_davy">
                <!-- bouton_anim_davy -->
                <a aria-label="Voyage" class="bouton_anim_davy block_center_davy" data-text="Voir nos Box" href="<?= URL ?>/liste-box" title="Box voyage">
                    <span>V</span>
                    <span>o</span>
                    <span>y</span>
                    <span>a</span>
                    <span>g</span>
                    <span>e</span>
                </a>
            </div><br>
            
            <!-- Photos -->
            <div class="my-5">
                <div class="slider slider-for-2">
                    <?php $i = 0; ?>
                    <?php while ($article_photo_array = $pdo_statement_3->fetch(PDO::FETCH_ASSOC)) : ?>
                    <?php $tableau_3[$i] = $article_photo_array['photo']; ?>
                    <div class="cadre_2_davy">
                        <img src="<?= URL ?>/images/<?= $article_photo_array['photo'] ?>" class="width_full_davy" alt="Louvre">
                    </div>
                    <?php $i++; ?>
                    <?php endwhile; ?>
                </div>
                <div class="slider slider-nav-2 block_content_medium_davy">
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                    <div class="bouton_2_davy">
                        <img src="<?= URL ?>/images/<?= $tableau_3[$i] ?>" class="width_full_davy" alt="Louvre">
                    </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- script -->
            <script src="<?= URL ?>/include/js/script_jquery.min.js"></script>
            <script src="<?= URL ?>/include/js/script_slick.min.js"></script>
            <script src="<?= URL ?>/include/js/script_slider.js"></script>
        </div>
<?php
require_once("include/footer.php");
?>