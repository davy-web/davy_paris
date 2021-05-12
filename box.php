<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Fiche produit
if (isset($_GET['id'])) {
    // Produit
    $pdo_statement_1 = $pdo_object->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
    $pdo_statement_1->bindValue(':id_produit', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement_1->execute();
    $produit_array = $pdo_statement_1->fetch(PDO::FETCH_ASSOC);
    if (!$produit_array) {
        header("Location:" . URL . "/liste-box");
    }

    // Pagination
    $element_par_page = 8;
    $pdo_statement_2 = $pdo_object->prepare("SELECT * FROM article WHERE box = :box");
    $pdo_statement_2->bindValue(':box', $produit_array['titre'], PDO::PARAM_STR);
    $pdo_statement_2->execute();
    $nb_total_elements = $pdo_statement_2->rowCount();
    $nb_pages = ceil($nb_total_elements / $element_par_page);
    if (isset($_GET['page'])) {
        $page_actuelle = $_GET['page'];
        if ($page_actuelle > $nb_pages) {
            $page_actuelle = $nb_pages;
        }
    }
    else {
        $page_actuelle = 1;
    }
    $premiere_element = ($page_actuelle - 1) * $element_par_page;

    // Article
    $pdo_statement = $pdo_object->prepare("SELECT * FROM article WHERE box = :box ORDER BY id_article DESC LIMIT " . $premiere_element . ", " . $element_par_page);
    $pdo_statement->bindValue(':box', $produit_array['titre'], PDO::PARAM_STR);
    $pdo_statement->execute();

    // Ajouter au panier
    if (isset($_POST['ajouter_panier'])) {
        ajouter_produit_panier($produit_array['id_produit'], $produit_array['titre'], $produit_array['photo'], $produit_array['prix'], $_POST['quantite']);
        header("Location:" . URL . "/box=" . $produit_array['id_produit']);
    }
}
else {
    header("Location:" . URL . "/liste-box");
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
                    <h1>Box <?= $produit_array['titre'] ?></h1>
                    <hr class="float_right_davy">
                </div>
            </div>
            
            <!-- File d'ariane -->
            <div class="container mt-5 mb-3">
                <a href="<?= URL ?>" title="Accueil">Accueil > </a> <a href="<?= URL ?>/liste-box" title="Liste Box">Liste Box > </a> <a href="<?= URL ?>/box=<?= $produit_array['titre'] ?>" title="<?= $produit_array['titre'] ?>">Box <?= $produit_array['titre'] ?></a>
            </div><br>
            
            <!-- Description de la Box -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md mb-3">
                        <div class="cadre_image_page_davy">
                            <img src="<?= URL ?>/images/<?= $produit_array['photo'] ?>" class="image_page_davy" alt="<?= $produit_array['photo'] ?>">
                            <img src="<?= URL ?>/images/trait-rouge.png" class="trait_rouge" alt="Cadre">
                            <img src="<?= URL ?>/images/trait-2-rouge.png" class="trait_2_rouge" alt="Cadre">
                        </div>
                    </div>
                    <div class="col-md mb-3">
                        <h2 class="h2_moyen_davy">Description <span class="color_red_davy serif_davy">de la Box <?= $produit_array['titre'] ?></span></h2>
                        <hr class="anime_scroll_davy">
                        <p><?= $produit_array['description'] ?></p>
                        <p class="h2_moyen_davy"><?= $produit_array['prix'] ?> €</p>
                        <form method="post">
                            <input type="hidden" name="id_produit" value="<?= $produit_array['id_produit'] ?>">
                            <input type="hidden" name="photo" value="<?= $produit_array['photo'] ?>">
                            <select name="quantite">
                                <?php for($i = 1; $i <= $produit_array['stock'] && $i <= 10; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                            <!-- bouton_anim_davy -->
                            <a aria-label="Acheter" class="bouton_anim_davy" data-text="Ajouter au panier" href="#" title="Ajouter au panier">
                                <span>A</span>
                                <span>c</span>
                                <span>h</span>
                                <span>e</span>
                                <span>t</span>
                                <span>e</span>
                                <span>r</span>
                                <input type="submit" id="ajouter_panier" name="ajouter_panier" value="Ajouter au panier" class="bouton_submit">
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Les activités de la Box -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">Les activités <span class="color_red_davy serif_davy">de la Box</span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container">
                <div class="row">
                    <?php if ($pdo_statement->rowCount() > 0) : ?>
                    <?php while ($article_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                    <div class="col-sm-12 col-md-6 col-lg-3 pb-4">
                        <div class="cadre_davy">
                            <div class="image_cadre_davy">
                                <img src="<?= URL ?>/images/<?= $article_array['photo'] ?>" class="image_cadre_2_davy" alt="Louvre">
                                <img src="<?= URL ?>/images/cadre-2-min.png" class="image_cadre_1_davy" alt="Cadre">
                            </div>
                            <p class="texte_cadre_davy">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
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
                    <p>Aucune activité</p>
                    <?php endif; ?>
                </div>
                <!-- Pagination -->
                <div class="text_center_davy mt-3">
                    <?php if ($nb_pages > 1) : ?>
                    <?php for ($i = 1; $i <= $nb_pages; $i++) : ?>
                    <a title="Voir Page" class="mx-1 px-3 py-1 bouton_2_anim_davy <?php if ($page_actuelle == $i) {echo 'active_bouton_2_anim_davy';} ?>" href="?page=<?= $i ?>"><span><?= $i ?></span></a>
                    <?php endfor; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php nb_visit_page($pdo_object, $produit_array['titre']); ?>
<?php
require_once("include/footer.php");
?>