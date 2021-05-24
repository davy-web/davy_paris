<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Supprimer un produit du panier
if (isset($_GET['action']) && $_GET['action'] == "supprimer") {
    if (isset($_GET['id_produit'])) {
        retirer_produit_panier($_GET['id_produit']);
        header("Location:" . URL . "/panier");
    }
}
// Augmenter un produit du panier
if (isset($_GET['action']) && $_GET['action'] == "augmenter") {
    if (isset($_GET['id_produit'])) {
        $pdo_statement = $pdo_object->prepare('SELECT * FROM produit WHERE id_produit = :id_produit');
        $pdo_statement->bindValue(':id_produit', $_GET['id_produit'], PDO::PARAM_INT);
        $pdo_statement->execute();
        $produit_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
        augmenter_produit_panier($_GET['id_produit'], $produit_array['stock']);
    }
}
// Diminuer un produit du panier
if (isset($_GET['action']) && $_GET['action'] == "diminuer") {
    if (isset($_GET['id_produit'])) {
        $pdo_statement = $pdo_object->prepare('SELECT * FROM produit WHERE id_produit = :id_produit');
        $pdo_statement->bindValue(':id_produit', $_GET['id_produit'], PDO::PARAM_INT);
        $pdo_statement->execute();
        $produit_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
        diminuer_produit_panier($_GET['id_produit'], $produit_array['stock']);
    }
}
// Prix total
$prix_total = 0;
if (isset($_SESSION['panier'])) {
    for ($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) {
        $prix_total = $prix_total + ($_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i]);
    }
}
// Acheter
if (isset($_POST['acheter'])) {
    sauvegarder_produits_panier($pdo_object, "panier", $prix_total);
    header("Location:" . URL . "/paiement");
}

// Panier sauvegarder
if (isset($_SESSION['membre'])) {
    sauvegarder_produits_panier($pdo_object, "panier", $prix_total);
}

// Message Paiement
if (isset($_GET['erreur']) && $_GET['erreur'] == "vide") {
    $erreur = "Le panier est vide, paiement refusé";
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
                    <h1>Panier</h1>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div><br>

            <!-- Etape -->
            <div class="block_content_medium_davy block_center_davy text_center_davy">
                <div class="row">
                    <div class="col mb-3">
                        <a title="Panier" class="bouton_2_anim_davy active_bouton_2_anim_davy" href="<?= URL ?>/panier"><span>1</span></a><br>
                        <p>Panier</p>
                    </div>
                    <div class="col mb-3">
                        <a title="Coordonnées" class="bouton_2_anim_davy" href="#"><span>2</span></a>
                        <p>Coordonnées</p>
                    </div>
                    <div class="col mb-3">
                        <a title="Paiement" class="bouton_2_anim_davy" href="<?= URL ?>/paiement"><span>3</span></a>
                        <p>Paiement</p>
                    </div>
                </div>
            </div>
            
            <!-- Produit -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">Les produits <span class="color_red_davy serif_davy">dans le panier</span></h2>
                <hr class="anime_scroll_davy">
                <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
            </div>
            <div id="content_panier_davy">
                <div class="container">
                    <div class="d-none d-sm-none d-md-block">
                        <div class="row">
                            <div class="col-md-2 flex_center_davy">
                            </div>
                            <div class="col-md-3 flex_center_davy">
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
                            <div class="col-md-1 flex_center_davy">
                                <p><strong>Retirer</strong></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if (isset($_SESSION['panier']['id_produit']) && count($_SESSION['panier']['id_produit']) > 0) : 
                    for ($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) : 
                    
                    $pdo_statement = $pdo_object->prepare('SELECT * FROM produit WHERE id_produit = :id_produit');
                    $pdo_statement->bindValue(':id_produit', $_SESSION['panier']['id_produit'][$i], PDO::PARAM_INT);
                    $pdo_statement->execute();
                    $produit_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <hr class="hr_admin_davy">
                    <div class="row">
                        <div class="col-md-2 flex_center_davy">
                            <img src="<?= URL ?>/images/<?= $_SESSION['panier']['photo'][$i] ?>" class="width_full_davy border_radius_davy" alt="<?= $_SESSION['panier']['photo'][$i] ?>">
                        </div>
                        <div class="col-md-3 flex_center_davy">
                            <p><span class="d-sm-inline-block d-md-none"><strong>Produit :</strong></span> <?= $_SESSION['panier']['titre'][$i] ?></p>
                        </div>
                        <div class="col-md-2 flex_center_davy">
                            <p>
                                <span class="d-sm-inline-block d-md-none"><strong>Quantité :</strong></span>
                                <!-- Diminuer -->
                                <a title="Diminuer" class="p-3" onclick="ajax_davy('content_panier_davy', 'panier-ajax.php?action=diminuer&id_produit=', '<?= $_SESSION['panier']['id_produit'][$i] ?>')">-</a>
                                <!-- Quantité -->
                                <?= $_SESSION['panier']['quantite'][$i] ?>
                                <!-- Augmenter -->
                                <a title="Augmenter" class="p-3" onclick="ajax_davy('content_panier_davy', 'panier-ajax.php?action=augmenter&id_produit=', '<?= $_SESSION['panier']['id_produit'][$i] ?>')">+</a>
                            </p>
                        </div>
                        <div class="col-md-2 flex_center_davy">
                            <p><span class="d-sm-inline-block d-md-none"><strong>Prix :</strong></span> <?= $_SESSION['panier']['prix'][$i] ?> €</p>
                        </div>
                        <div class="col-md-2 flex_center_davy">
                            <p><span class="d-sm-inline-block d-md-none"><strong>Total :</strong></span> <?= $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i] ?> €</p>
                        </div>
                        <div class="col-md-1 flex_center_davy">
                            <a href="<?= URL ?>/panier?action=supprimer&id_produit=<?= $_SESSION['panier']['id_produit'][$i] ?>" onclick="return(confirm('Souhaitez-vous supprimer ce produit ?'))" class="color_red_davy h2_moyen_davy" title="Supprimer">x</a>
                        </div>
                    </div>
                    <?php endfor; ?>
                    <?php else : ?>
                    <hr class="hr_admin_davy">
                    <div class="row">
                        <div class="col flex_center_davy">
                            <p>Aucun produit</p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Vos options cadeaux -->
                <div class="container mt-5 mb-3">
                    <h2 class="h2_moyen_davy">Vos options <span class="color_red_davy serif_davy">cadeaux</span></h2>
                    <hr class="anime_scroll_davy">
                </div>
                <div class="container mb-3">
                    <div class="row">
                        <form method="post" class="color_gris_davy pe-3">
                            <br>
                            <input type="checkbox" id="personnaliser" name="personnaliser" value="personnaliser">
                            <label for="personnaliser">Personnaliser</label>
                            <br><br><br>
                            <p class="text_center_davy"><?= $prix_total ?> €</p>
                            <!-- bouton_anim_davy -->
                            <div class="text_center_davy">
                                <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer" data-text="Acheter" title="Acheter">
                                    <span>V</span>
                                    <span>a</span>
                                    <span>l</span>
                                    <span>i</span>
                                    <span>d</span>
                                    <span>e</span>
                                    <span>r</span>
                                    <input type="submit" id="acheter" name="acheter" value="Acheter" class="bouton_submit">
                                </a><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- script -->
            <script src="<?= URL ?>/include/js/script_nav_lien.js"></script>
            <script>nav_lien_active("lien_panier");</script>
        </div>
        <?php nb_visit_page($pdo_object, "Panier"); ?>
<?php
require_once("include/footer.php");
?>