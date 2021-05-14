<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Détails commande
if (isset($_SESSION['membre'])) {
    $pdo_statement = $pdo_object->prepare("SELECT * FROM commande WHERE membre_id = :membre_id");
    $pdo_statement->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
    $pdo_statement->execute();
}
else {
    header("Location:" . URL . "/connexion");
}

// Déconnexion
if (isset($_POST['deconnexion'])) {
    deconnexion();
}

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
                    <h1>Profil</h1>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div><br>

            <!-- Produit -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">Les produits <span class="color_red_davy serif_davy">commandés</span></h2>
                <hr class="anime_scroll_davy">
                <?php if (isset($_SESSION['membre'])) : ?>
                <form method="post">
                    <!-- bouton_anim_davy -->
                    <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy" data-text="Déconnexion" title="Déconnexion">
                        <span>V</span>
                        <span>a</span>
                        <span>l</span>
                        <span>i</span>
                        <span>d</span>
                        <span>e</span>
                        <span>r</span>
                        <input type="submit" id="deconnexion" name="deconnexion" value="Déconnexion" class="bouton_submit">
                    </a><br>
                </form>
                <?php endif; ?>
            </div>
            <div class="container">
                <div class="d-none d-sm-none d-md-block">
                    <div class="row">
                        <div class="col-md-2 flex_center_davy">
                        </div>
                        <div class="col-md-4 flex_center_davy">
                            <p><strong>Produit</strong></p>
                        </div>
                        <div class="col-md-2 flex_center_davy">
                            <p><strong>Quantité</strong></p>
                        </div>
                        <div class="col-md-2 flex_center_davy">
                            <p><strong>Prix</strong></p>
                        </div>
                        <div class="col-md-2 flex_center_davy">
                            <p><strong>Total</strong></p>
                        </div>
                    </div>
                </div>
                <?php if ($pdo_statement->rowCount() > 0) : ?>
                <?php
                // Détails de la commande
                while ($commande_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) :
                $pdo_statement_1 = $pdo_object->prepare("SELECT * FROM details_commande WHERE commande_id = :commande_id");
                $pdo_statement_1->bindValue(':commande_id', $commande_array['id_commande'], PDO::PARAM_INT);
                $pdo_statement_1->execute();
                // Produit
                while ($details_commande_array = $pdo_statement_1->fetch(PDO::FETCH_ASSOC)) :
                $pdo_statement_2 = $pdo_object->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
                $pdo_statement_2->bindValue(':id_produit', $details_commande_array['produit_id'], PDO::PARAM_INT);
                $pdo_statement_2->execute();
                $produit_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC);
                ?>
                <hr class="hr_admin_davy">
                <div class="row">
                    <div class="col-md-2 flex_center_davy">
                        <img src="<?= URL ?>/images/<?= $produit_array['photo'] ?>" class="width_full_davy border_radius_davy" alt="<?= $produit_array['photo'] ?>">
                    </div>
                    <div class="col-md-4 flex_center_davy">
                        <p><span class="d-sm-inline-block d-md-none"><strong>Produit :</strong></span> <?= $produit_array['titre'] ?></p>
                    </div>
                    <div class="col-md-2 flex_center_davy">
                        <p><span class="d-sm-inline-block d-md-none"><strong>Quantité :</strong></span> <?= $details_commande_array['quantite'] ?></p>
                    </div>
                    <div class="col-md-2 flex_center_davy">
                        <p><span class="d-sm-inline-block d-md-none"><strong>Prix :</strong></span> <?= $produit_array['prix'] ?> €</p>
                    </div>
                    <div class="col-md-2 flex_center_davy">
                        <p><span class="d-sm-inline-block d-md-none"><strong>Total :</strong></span> <?= $produit_array['prix'] * $details_commande_array['quantite'] ?> €</p>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endwhile; ?>
                <?php else : ?>
                <hr class="hr_admin_davy">
                <div class="row">
                    <div class="col flex_center_davy">
                        <p>Aucun produit</p>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- script -->
            <script src="<?= URL ?>/include/js/script_nav_lien.js"></script>
            <script>nav_lien_active("lien_profil");</script>
        </div>
        <?php nb_visit_page($pdo_object, "Profil"); ?>
<?php
require_once("include/footer.php");
?>