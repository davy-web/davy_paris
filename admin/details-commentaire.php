<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Détails du commentaire
if (isset($_GET['id'])) {
    $pdo_statement = $pdo_object->prepare("SELECT * FROM commentaire WHERE id_commentaire = :id_commentaire");
    $pdo_statement->bindValue(':id_commentaire', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement->execute();
    $commentaire_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
    if (!$commentaire_array) {
        header("Location:" . URL . "/admin/gestion-commentaires");
    }
    // Article
    $pdo_statement_2 = $pdo_object->prepare("SELECT * FROM article WHERE id_article = :id_article");
    $pdo_statement_2->bindValue(':id_article', $commentaire_array['produit_id'], PDO::PARAM_INT);
    $pdo_statement_2->execute();
    $article_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC);
    // Membre
    $pdo_statement_3 = $pdo_object->prepare("SELECT * FROM membre WHERE id_membre = :id_membre");
    $pdo_statement_3->bindValue(':id_membre', $commentaire_array['membre_id'], PDO::PARAM_INT);
    $pdo_statement_3->execute();
    $membre_array = $pdo_statement_3->fetch(PDO::FETCH_ASSOC);
}
else {
    header("Location:" . URL . "/admin/gestion-commentaires");
}

require_once("../include/header-admin.php");
?>

                <!-- style -->
                <link rel="stylesheet" href="<?= URL ?>/include/css/style_cadre.css">

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Détails du commentaire</h1>
                    <hr class="anime_scroll_davy">
                    <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
                    <!-- formulaire -->
                    <form method="post">
                        <div class="row">
                            <div class="col-md">
                                <label for="produit_id"><strong>Article</strong></label><br>
                                <input type="text" id="produit_id" name="produit_id" placeholder="produit_id" class="width_full_davy" value="<?= $article_array['titre'] ?>"><br><br>
                            </div>
                            <div class="col-md">
                                <label for="membre_id"><strong>Client</strong></label><br>
                                <input type="text" id="membre_id" name="membre_id" placeholder="membre_id" class="width_full_davy" value="<?= $membre_array['prenom'] ?>"><br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="message"><strong>Message</strong></label><br>
                                <textarea id="message" tabindex="5" rows="9" name="message" placeholder="Message" class="width_full_davy"><?= $commentaire_array['message'] ?></textarea><br><br>
                                <label for="note"><strong>Note</strong></label><br>
                                <?php for ($i = 0; $i < $commentaire_array['note']; $i++) : ?>
                                <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <?php endfor; ?>
                                <?php for ($i = 0; $i < (5 - $commentaire_array['note']); $i++) : ?>
                                <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                <?php endfor; ?>
                            </div>
                        </div>
                        <!-- bouton_anim_davy -->
                        <a href="<?= URL ?>/admin/gestion-commentaires" aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy" data-text="Retour" title="Retour">
                            <span>V</span>
                            <span>a</span>
                            <span>l</span>
                            <span>i</span>
                            <span>d</span>
                            <span>e</span>
                            <span>r</span>
                        </a><br>
                    </form>
                </div>
<?php
require_once("../include/footer-admin.php");
?>