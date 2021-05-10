<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Détails de la commande
if (isset($_GET['id'])) {
    $pdo_statement = $pdo_object->prepare("SELECT * FROM details_commande WHERE commande_id = :commande_id");
    $pdo_statement->bindValue(':commande_id', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement->execute();
}
else {
    header("Location:" . URL . "/admin/commande");
}

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Détails de la commande</h1>
                    <hr>
                    <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
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
                    <?php while ($details_commande_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                    <?php
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
                    <?php endif; ?>
                    <!-- bouton_anim_davy -->
                    <a href="<?= URL ?>/admin/commande" aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy" data-text="Retour" title="Retour">
                        <span>V</span>
                        <span>a</span>
                        <span>l</span>
                        <span>i</span>
                        <span>d</span>
                        <span>e</span>
                        <span>r</span>
                    </a><br>
                </div>
<?php
require_once("../include/footer-admin.php");
?>