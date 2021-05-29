<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Favoris
if (isset($_SESSION['membre'])) {
    $pdo_statement = $pdo_object->prepare("SELECT * FROM favoris WHERE membre_id = :membre_id");
    $pdo_statement->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
    $pdo_statement->execute();
}
else {
    header("Location:" . URL . "/connexion");
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
                    <h1>Favoris</h1>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div>
            
            <!-- Mon favoris -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">Mes <span class="color_red_davy serif_davy">favoris</span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container">
                <div class="row">
                    <?php if ($pdo_statement->rowCount() > 0) : ?>
                    <?php while ($favoris_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                    <?php
                    $pdo_statement_2 = $pdo_object->prepare("SELECT * FROM article WHERE id_article = :id_article");
                    $pdo_statement_2->bindValue(':id_article', $favoris_array['article_id'], PDO::PARAM_INT);
                    $pdo_statement_2->execute();
                    $article_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-3 pb-4">
                        <div class="cadre_davy">
                            <div class="image_cadre_davy">
                                <img src="<?= URL ?>/images/<?= $article_array['photo'] ?>" class="image_cadre_2_davy" alt="Louvre">
                                <img src="<?= URL ?>/images/cadre-2-min.png" class="image_cadre_1_davy" alt="Cadre">
                            </div>
                            <p class="texte_cadre_davy">
                                <!-- Note -->
                                <?php
                                if (isset($_SESSION['membre'])) {
                                    $note = 0;
                                    $pdo_statement_note = $pdo_object->prepare("SELECT * FROM commentaire WHERE produit_id = :produit_id AND membre_id = :membre_id");
                                    $pdo_statement_note->bindValue(':produit_id', $article_array['id_article'], PDO::PARAM_INT);
                                    $pdo_statement_note->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
                                    $pdo_statement_note->execute();
                                    if ($pdo_statement_note->rowCount() > 0) {
                                        while ($note_array = $pdo_statement_note->fetch(PDO::FETCH_ASSOC)) {
                                            $note = $note + $note_array['note'];
                                        }
                                        $note = round($note / $pdo_statement_note->rowCount());
                                    }
                                    else {
                                        $note = 4;
                                    }
                                }
                                else {
                                    $note = 4;
                                }
                                ?>
                                <?php for ($i = 0; $i < $note; $i++) : ?>
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <?php endfor; ?>
                                <?php for ($i = 0; $i < (5 - $note); $i++) : ?>
                                <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <?php endfor; ?>
                                <br>
                                <strong><?= $article_array['titre'] ?></strong><br>
                                <?= $article_array['categorie'] ?><br><br>
                                <strong><?= $article_array['box'] ?></strong>
                                <a href="<?= URL ?>/experience=<?= $article_array['id_article'] ?>" title="<?= URL ?>/experience=<?= $article_array['id_article'] ?>"><i class="icon_cadre_davy"><img src="<?= URL ?>/images/icon-voir-min.png" class="image_cadre_icon_davy" alt="Icon voir"></i></a>
                            </p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <div class="col">
                        <p>Aucun favoris</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- script -->
            <script src="<?= URL ?>/include/js/script_nav_lien.js"></script>
            <script>nav_lien_active("lien_favoris");</script>
        </div>
        <?php nb_visit_page($pdo_object, "Favoris"); ?>
<?php
require_once("include/footer.php");
?>