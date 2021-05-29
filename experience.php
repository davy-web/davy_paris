<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Fiche article
if (isset($_GET['id'])) {
    // Articles
    $pdo_statement = $pdo_object->prepare("SELECT * FROM article WHERE id_article = :id_article AND etat = :etat");
    $pdo_statement->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement->bindValue(':etat', 1, PDO::PARAM_INT);
    $pdo_statement->execute();
    $article_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
    if (!$article_array) {
        header("Location:" . URL . "/liste-experiences");
    }
    // Commentaires
    $pdo_statement_2 = $pdo_object->prepare("SELECT * FROM commentaire WHERE produit_id = :produit_id ORDER BY RAND() LIMIT 4");
    $pdo_statement_2->bindValue(':produit_id', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement_2->execute();
    if (isset($_POST['ajouter'])) {
        if (isset($_SESSION['membre']['id_membre'])) {
            $pdo_statement = $pdo_object->prepare("INSERT INTO commentaire (produit_id, membre_id, message, note) VALUES (:produit_id, :membre_id, :message, :note)");
            $pdo_statement->bindValue(':produit_id', $_GET['id'], PDO::PARAM_INT);
            $pdo_statement->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
            $pdo_statement->bindValue(':message', htmlspecialchars($_POST['message']), PDO::PARAM_STR);
            $pdo_statement->bindValue(':note', $_POST['note'], PDO::PARAM_INT);
            $pdo_statement->execute();
            header("Location:" . URL . "/experience=" . $_GET['id']);
        }
    }
    // Articles similaires
    $pdo_statement_3 = $pdo_object->prepare("SELECT * FROM article WHERE box = :box AND id_article != :id_article AND etat = :etat ORDER BY RAND() LIMIT 4");
    $pdo_statement_3->bindValue(':box', $article_array['box'], PDO::PARAM_STR);
    $pdo_statement_3->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement_3->bindValue(':etat', 1, PDO::PARAM_INT);
    $pdo_statement_3->execute();
    // Produit lier
    $pdo_statement_4 = $pdo_object->prepare("SELECT * FROM produit WHERE titre = :titre");
    $pdo_statement_4->bindValue(':titre', $article_array['box'], PDO::PARAM_STR);
    $pdo_statement_4->execute();
    $produit_array = $pdo_statement_4->fetch(PDO::FETCH_ASSOC);
    // Favoris
    if (isset($_SESSION['membre'])) {
    $pdo_statement_favoris = $pdo_object->prepare("SELECT * FROM favoris WHERE membre_id = :membre_id AND article_id = :article_id");
    $pdo_statement_favoris->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
    $pdo_statement_favoris->bindValue(':article_id', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement_favoris->execute();
    }
    // Ajouter et retire Favoris
    if (isset($_GET['favoris'])) {
        $erreur = ajouter_retirer_favoris($pdo_object, $_GET['id']);
        if ($erreur == "erreur") {
            header("Location:" . URL . "/experience=" . $_GET['id'] . "&erreur");
        }
        else {
            header("Location:" . URL . "/experience=" . $_GET['id']);
        }
    }
    // Erreur
    if (isset($_GET['erreur'])) {
        $erreur = "<strong class='color_red_davy'>Veuillez vous connecter pour ajouter au favoris</strong>";
    }
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
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div>
            
            <!-- File d'ariane -->
            <div class="container mt-5 mb-3">
                <a href="<?= URL ?>" title="Accueil">Accueil > </a> <a href="<?= URL ?>/liste-experiences" title="Liste expériences">Liste expériences > </a> <a href="<?= URL ?>/experience=<?= $article_array['titre'] ?>" title="<?= $article_array['titre'] ?>"><?= $article_array['titre'] ?></a><br>
                <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
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
                        <div class="flex_center_davy">
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
                            <a href="<?= URL ?>/experience=<?= $article_array['id_article'] ?>&favoris" title="Ajouter au favoris">
                                <svg viewBox="0 -28 512.00002 512" xmlns="http://www.w3.org/2000/svg" class="icon_favoris_davy <?php if (isset($_SESSION['membre']) && $pdo_statement_favoris->rowCount() > 0) {echo 'icon_favoris_active_davy';} ?>"><path fill="currentColor" d="m471.382812 44.578125c-26.503906-28.746094-62.871093-44.578125-102.410156-44.578125-29.554687 0-56.621094 9.34375-80.449218 27.769531-12.023438 9.300781-22.917969 20.679688-32.523438 33.960938-9.601562-13.277344-20.5-24.660157-32.527344-33.960938-23.824218-18.425781-50.890625-27.769531-80.445312-27.769531-39.539063 0-75.910156 15.832031-102.414063 44.578125-26.1875 28.410156-40.613281 67.222656-40.613281 109.292969 0 43.300781 16.136719 82.9375 50.78125 124.742187 30.992188 37.394531 75.535156 75.355469 127.117188 119.3125 17.613281 15.011719 37.578124 32.027344 58.308593 50.152344 5.476563 4.796875 12.503907 7.4375 19.792969 7.4375 7.285156 0 14.316406-2.640625 19.785156-7.429687 20.730469-18.128907 40.707032-35.152344 58.328125-50.171876 51.574219-43.949218 96.117188-81.90625 127.109375-119.304687 34.644532-41.800781 50.777344-81.4375 50.777344-124.742187 0-42.066407-14.425781-80.878907-40.617188-109.289063zm0 0"/></svg>
                            </a>
                        </div>
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
                        <?php for ($i = 0; $i < $commentaire_array['note']; $i++) : ?>
                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < (5 - $commentaire_array['note']); $i++) : ?>
                        <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                        <?php endfor; ?>
                    </div>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <div class="col-md mb-3">
                        <p>Aucun Commentaire</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (isset($_SESSION['membre'])) : ?>
            <div class="container mt-5 mb-3">
                <div class="row">
                    <form method="post">
                        <label for="message"><strong>Écrire un commentaire</strong></label><br>
                        <textarea id="message" tabindex="5" rows="9" name="message" placeholder="Votre commentaire" class="width_full_davy"></textarea><br><br>
                        <select id="note" name="note" class="mb-3">
                            <option value="4">Note sur 5</option>
                            <option value="1">1 / 5</option>
                            <option value="2">2 / 5</option>
                            <option value="3">3 / 5</option>
                            <option value="4">4 / 5</option>
                            <option value="5">5 / 5</option>
                        </select>
                        <!-- bouton_anim_davy -->
                        <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer" data-text="Ajouter" title="Ajouter">
                            <span>V</span>
                            <span>a</span>
                            <span>l</span>
                            <span>i</span>
                            <span>d</span>
                            <span>e</span>
                            <span>r</span>
                            <input type="submit" id="ajouter" name="ajouter" value="Ajouter" class="bouton_submit">
                        </a><br>
                    </form>
                </div>
            </div>
            <?php endif; ?>
            
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
                                <!-- Note -->
                                <?php
                                if (isset($_SESSION['membre'])) {
                                    $note = 0;
                                    $pdo_statement_note = $pdo_object->prepare("SELECT * FROM commentaire WHERE produit_id = :produit_id AND membre_id = :membre_id");
                                    $pdo_statement_note->bindValue(':produit_id', $_GET['id'], PDO::PARAM_INT);
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