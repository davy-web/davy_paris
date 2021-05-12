<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Fiche article
if (isset($_GET['id'])) {
    // Articles
    $pdo_statement = $pdo_object->prepare("SELECT * FROM article WHERE id_article = :id_article");
    $pdo_statement->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement->execute();
    $article_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
    if (!$article_array) {
        header("Location:" . URL . "/liste-experiences");
    }
    // Commentaires
    $pdo_statement_2 = $pdo_object->prepare("SELECT * FROM commentaire WHERE produit_id = :produit_id");
    $pdo_statement_2->bindValue(':produit_id', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement_2->execute();
    // Articles similaires
    $pdo_statement_3 = $pdo_object->prepare("SELECT * FROM article WHERE box = :box AND id_article != :id_article ORDER BY RAND() LIMIT 4");
    $pdo_statement_3->bindValue(':box', $article_array['box'], PDO::PARAM_STR);
    $pdo_statement_3->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement_3->execute();
    // Produit lier
    $pdo_statement_4 = $pdo_object->prepare("SELECT * FROM produit WHERE titre = :titre");
    $pdo_statement_4->bindValue(':titre', $article_array['box'], PDO::PARAM_STR);
    $pdo_statement_4->execute();
    $produit_array = $pdo_statement_4->fetch(PDO::FETCH_ASSOC);
}
else {
    header("Location:" . URL . "/liste-experiences");
}

require_once("include/header.php");
?>

        <div id="content_davy">
            <!-- style -->
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_intro_2.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_cadre.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_page.css">
            
            <!-- intro - anime_scroll_relative_content_davy -->
            <div class="block_anime_scroll_relative_content_1_davy">
                <img class="anime_scroll_relative_content_1_2_davy anime_scroll_relative_content_1_davy" src="<?= URL ?>/images/fond-menu-2-min.png" alt="Fond menu">
                <div class="anime_scroll_relative_content_1_1_davy anime_scroll_relative_content_1_davy container">
                    <h2><?= $article_array['categorie'] ?></h2>
                    <hr class="float_right_davy">
                </div>
            </div>
            
            <!-- File d'ariane -->
            <div class="container mt-5 mb-3">
                <a href="<?= URL ?>" title="Accueil">Accueil > </a> <a href="<?= URL ?>/liste-experiences" title="Liste expériences">Liste expériences > </a> <a href="<?= URL ?>/experience=<?= $article_array['titre'] ?>" title="<?= $article_array['titre'] ?>"><?= $article_array['titre'] ?></a>
            </div><br>
            
            <!-- Description de l'éxperience -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md mb-3">
                        <div class="cadre_image_page_davy">
                            <img src="<?= URL ?>/images/<?= $article_array['photo'] ?>" class="image_page_davy" alt="<?= $article_array['photo'] ?>">
                            <img src="<?= URL ?>/images/trait-rouge.png" class="trait_rouge" alt="Cadre">
                            <img src="<?= URL ?>/images/trait-2-rouge.png" class="trait_2_rouge" alt="Cadre">
                        </div>
                    </div>
                    <div class="col-md mb-3">
                        <h1 class="h2_moyen_davy"><?= $article_array['titre'] ?></h1>
                        <hr class="anime_scroll_davy">
                        <p><?= $article_array['description'] ?></p><br>
                        <!-- bouton_anim_davy -->
                        <a aria-label="Découvrir" class="bouton_anim_davy" data-text="Voir la box" href="<?= URL ?>/box=<?= $produit_array['id_produit'] ?>" title="Voir la box">
                            <span>D</span>
                            <span>é</span>
                            <span>c</span>
                            <span>o</span>
                            <span>u</span>
                            <span>v</span>
                            <span>r</span>
                            <span>i</span>
                            <span>r</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Informations complémentaires -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy"><?= $article_array['titre_info'] ?></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container mb-3">
                <div class="row">
                    <p>
                        <?= $article_array['description_info'] ?><br><br>
                        <strong>Adresse : </strong><?= $article_array['adresse'] ?><br>
                    </p>
                </div>
            </div>
            
            <!-- Cartes -->
            <div class="container mt-5 mb-3">
                <div class="row">
                    <?= $article_array['map'] ?>
                </div>
            </div>
            
            <!-- Les commentaires des clients -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">Commentaires <span class="color_red_davy serif_davy">des clients</span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container">
                <div class="row">
                    <?php if ($pdo_statement_2->rowCount() > 0) : ?>
                    <?php while ($commentaire_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC)) : ?>
                    <div class="col-md-3 mb-3 text_center_davy">
                        <p><?= $commentaire_array['message'] ?></p>
                        <p><?= $commentaire_array['note'] ?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <div class="col-md mb-3">
                        <p>Aucun Commentaire</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Vous aimerez aussi -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">Vous aimerez <span class="color_red_davy serif_davy">aussi</span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container">
                <div class="row">
                    <?php while ($article_similaire_array = $pdo_statement_3->fetch(PDO::FETCH_ASSOC)) : ?>
                    <div class="col-sm-12 col-md-6 col-lg-3 pb-4">
                        <div class="cadre_davy">
                            <div class="image_cadre_davy">
                                <img src="<?= URL ?>/images/<?= $article_similaire_array['photo'] ?>" class="image_cadre_2_davy" alt="Louvre">
                                <img src="<?= URL ?>/images/cadre-2-min.png" class="image_cadre_1_davy" alt="Cadre">
                            </div>
                            <p class="texte_cadre_davy">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <br>
                                <strong><?= $article_similaire_array['titre'] ?></strong><br>
                                <?= $article_similaire_array['categorie'] ?><br><br>
                                <strong><?= $article_similaire_array['box'] ?></strong>
                                <a href="<?= URL ?>/experience=<?= $article_similaire_array['id_article'] ?>" title="<?= URL ?>/experience=<?= $article_similaire_array['id_article'] ?>"><i class="icon_cadre_davy"><img src="<?= URL ?>/images/icon-voir-min.png" class="image_cadre_icon_davy" alt="Icon voir"></i></a>
                            </p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <?php nb_visit_page($pdo_object, $article_array['titre']); ?>
<?php
require_once("include/footer.php");
?>