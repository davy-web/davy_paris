<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Pagination
$element_par_page = 12;
$pdo_statement = $pdo_object->prepare("SELECT * FROM produit");
$pdo_statement->execute();
$nb_total_elements = $pdo_statement->rowCount();
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
$query_elements = "SELECT * FROM produit ORDER BY id_produit DESC LIMIT " . $premiere_element . ", " . $element_par_page;

// Liste produit
$pdo_statement = $pdo_object->prepare($query_elements);
$pdo_statement->execute();

// Liste produit chercher
$pdo_statement_2 = $pdo_object->prepare("SELECT * FROM produit");
$pdo_statement_2->execute();

// Chercher
function find_davy($str1, $str2) {
    $i = 0;
    $j = 0;
    
    while ($i < strlen($str1)) {
        if (($j < strlen($str2)) && ($str1[$i] == $str2[$j])) {
            $j++;
        }
        else {
            $j = 0;
        }
        if ($j == strlen($str2)) {
            return 1;
        }
        $i++;
    }
    return 0;
}

require_once("include/header.php");
?>

        <div id="content_davy">
            <!-- style -->
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_intro_2.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_cadre.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_accordion.css">
            
            <!-- intro - anime_scroll_relative_content_davy -->
            <div class="block_anime_scroll_relative_content_1_davy">
                <img class="anime_scroll_relative_content_1_2_davy anime_scroll_relative_content_1_davy" src="<?= URL ?>/images/fond-menu-2-min.png" alt="Fond menu">
                <div class="anime_scroll_relative_content_1_1_davy anime_scroll_relative_content_1_davy container">
                    <h1>Nos box de voyage</h1>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div>
            
            <!-- File d'ariane -->
            <div class="container mt-5 mb-3">
                <a href="<?= URL ?>" title="Accueil">Accueil > </a> <a href="<?= URL ?>/liste-box" title="Liste Box">Liste Box</a>
            </div>
            
            <!-- Liste -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">Liste <span class="color_red_davy serif_davy">des Box</span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 mb-3">
                        <form method="post" enctype="multipart/form-data" class="color_gris_davy pe-3">
                            <strong>Filtre</strong>
                            <hr class="hr_admin_davy"><br>
                            <strong>Rechercher</strong><br><br>
                            <input type="text" id="mot_chercher" name="mot_chercher" placeholder="Chercher" class="width_full_davy mb-2" onkeyup="ajax_davy('content_produit_davy', 'liste-box-ajax.php?chercher=', this.value)"><br><br>
                            <div class="block_accordion_davy">
                                <!-- bouton_anim_davy -->
                                <a id="bouton_option_filtre_davy" aria-label="Plus" class="bouton_anim_davy bouton_envoyer background_gris_davy width_full_davy" data-text="Options" title="Options">
                                    <span>P</span>
                                    <span>l</span>
                                    <span>u</span>
                                    <span>s</span>
                                </a><br><br>
                            </div>
                            <div class="panel_davy desactive_accordion">
                                <strong>Catégorie</strong><br><br>
                                <input type="checkbox" id="gastronomie" name="gastronomie" value="Gastronomie">
                                <label for="gastronomie">Gastronomie</label><br>
                                <input type="checkbox" id="aventure" name="aventure" value="Aventure">
                                <label for="aventure">Aventure</label><br>
                                <input type="checkbox" id="bien_etre" name="bien_etre" value="Bien-être">
                                <label for="bien_etre">Bien-être</label><br>
                                <input type="checkbox" id="loisirs" name="loisirs" value="Loisirs">
                                <label for="loisirs">Loisirs</label><br><br>
                                <strong>Prix</strong><br><br>
                                <input type="checkbox" id="de_50_a_100" name="de_50_a_100" value="De 50 à 100 €">
                                <label for="de_50_a_100">De 45 à 65 €</label><br>
                                <input type="checkbox" id="de_100_a_200" name="de_100_a_200" value="De 100 à 200 €">
                                <label for="de_100_a_200">De 65 à 85 €</label><br>
                                <input type="checkbox" id="plus_de_200" name="plus_de_200" value="Plus de 200 €">
                                <label for="plus_de_200">Plus de 85 €</label><br><br>
                                <strong>Notes des clients</strong><br><br>
                                <input type="checkbox" id="1_note" name="1_note" value="1">
                                <label for="1_note">
                                    <?php for ($i = 0; $i < 1; $i++) : ?>
                                    <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                    <?php endfor; ?>
                                    <?php for ($i = 0; $i < (5 - 1); $i++) : ?>
                                    <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                    <?php endfor; ?>
                                </label><br>
                                <input type="checkbox" id="2_notes" name="2_notes" value="2">
                                <label for="2_note">
                                    <?php for ($i = 0; $i < 2; $i++) : ?>
                                    <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                    <?php endfor; ?>
                                    <?php for ($i = 0; $i < (5 - 2); $i++) : ?>
                                    <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                    <?php endfor; ?>
                                </label><br>
                                <input type="checkbox" id="3_notes" name="3_notes" value="3">
                                <label for="3_note">
                                    <?php for ($i = 0; $i < 3; $i++) : ?>
                                    <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                    <?php endfor; ?>
                                    <?php for ($i = 0; $i < (5 - 3); $i++) : ?>
                                    <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                    <?php endfor; ?>
                                </label><br>
                                <input type="checkbox" id="4_notes" name="4_notes" value="4">
                                <label for="4_note">
                                    <?php for ($i = 0; $i < 4; $i++) : ?>
                                    <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                    <?php endfor; ?>
                                    <?php for ($i = 0; $i < (5 - 4); $i++) : ?>
                                    <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                    <?php endfor; ?>
                                </label><br>
                                <input type="checkbox" id="5_notes" name="5_notes" value="5">
                                <label for="5_note">
                                    <?php for ($i = 0; $i < 5; $i++) : ?>
                                    <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                    <?php endfor; ?>
                                    <?php for ($i = 0; $i < (5 - 5); $i++) : ?>
                                    <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                    <?php endfor; ?>
                                </label><br>
                            </div>
                            <hr class="hr_admin_davy"><br>
                            <!-- bouton_anim_davy -->
                            <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer width_full_davy" data-text="Chercher" title="Chercher">
                                <span>V</span>
                                <span>a</span>
                                <span>l</span>
                                <span>i</span>
                                <span>d</span>
                                <span>e</span>
                                <span>r</span>
                                <input type="submit" id="chercher" name="chercher" value="Chercher" class="bouton_submit">
                            </a><br>
                        </form>
                    </div>
                    <div class="col-lg-9 col-md-8 mb-3">
                        <div id="content_produit_davy" class="row">
                        <?php if (isset($_POST['chercher'])) : ?>
                            <?php while ($produit_chercher_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC)) : ?>
                            <?php if ((!empty($_POST['gastronomie']) && ((find_davy($produit_chercher_array["titre"], $_POST['gastronomie']) == 1))) || (!empty($_POST['aventure']) && ((find_davy($produit_chercher_array["titre"], $_POST['aventure']) == 1))) || (!empty($_POST['bien_etre']) && ((find_davy($produit_chercher_array["titre"], $_POST['bien_etre']) == 1))) || (!empty($_POST['loisirs']) && ((find_davy($produit_chercher_array["titre"], $_POST['loisirs']) == 1))) || (!empty($_POST['mot_chercher']) && ((find_davy($produit_chercher_array["titre"], $_POST['mot_chercher']) == 1) || (find_davy($produit_chercher_array["description"], $_POST['mot_chercher']) == 1)))) : ?>
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="cadre_davy">
                                    <div class="image_cadre_davy">
                                        <img src="<?= URL ?>/images/<?= $produit_chercher_array['photo'] ?>" class="image_cadre_2_davy" alt="<?= $produit_chercher_array['photo'] ?>">
                                        <img src="<?= URL ?>/images/cadre-2-min.png" class="image_cadre_1_davy" alt="Cadre">
                                    </div>
                                    <p class="texte_cadre_davy">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <br>
                                        <strong><?= $produit_chercher_array['titre'] ?></strong><br>
                                        Pour 2 personnes<br><br>
                                        <strong class="prix_cadre_davy"><?= $produit_chercher_array['prix'] ?>€</strong>
                                        <a href="<?= URL ?>/box=<?= $produit_chercher_array['id_produit'] ?>" title="<?= URL ?>/box=<?= $produit_chercher_array['id_produit'] ?>"><i class="icon_cadre_davy"><img src="<?= URL ?>/images/icon-voir-min.png" class="image_cadre_icon_davy" alt="Icon voir"></i></a>
                                    </p>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        <?php elseif (isset($_GET['chercher']) && $_GET['chercher'] != "") : ?>
                            <?php while ($produit_chercher_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC)) : ?>
                            <?php if ((!empty($_POST['gastronomie']) && ((find_davy($produit_chercher_array["titre"], $_POST['gastronomie']) == 1))) || (!empty($_POST['aventure']) && ((find_davy($produit_chercher_array["titre"], $_POST['aventure']) == 1))) || (!empty($_POST['bien_etre']) && ((find_davy($produit_chercher_array["titre"], $_POST['bien_etre']) == 1))) || (!empty($_POST['loisirs']) && ((find_davy($produit_chercher_array["titre"], $_POST['loisirs']) == 1))) || (!empty($_GET['chercher']) && ((find_davy($produit_chercher_array["titre"], $_GET['chercher']) == 1) || (find_davy($produit_chercher_array["description"], $_GET['chercher']) == 1)))) : ?>
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="cadre_davy">
                                    <div class="image_cadre_davy">
                                        <img src="<?= URL ?>/images/<?= $produit_chercher_array['photo'] ?>" class="image_cadre_2_davy" alt="<?= $produit_chercher_array['photo'] ?>">
                                        <img src="<?= URL ?>/images/cadre-2-min.png" class="image_cadre_1_davy" alt="Cadre">
                                    </div>
                                    <p class="texte_cadre_davy">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <br>
                                        <strong><?= $produit_chercher_array['titre'] ?></strong><br>
                                        Pour 2 personnes<br><br>
                                        <strong class="prix_cadre_davy"><?= $produit_chercher_array['prix'] ?>€</strong>
                                        <a href="<?= URL ?>/box=<?= $produit_chercher_array['id_produit'] ?>" title="<?= URL ?>/box=<?= $produit_chercher_array['id_produit'] ?>"><i class="icon_cadre_davy"><img src="<?= URL ?>/images/icon-voir-min.png" class="image_cadre_icon_davy" alt="Icon voir"></i></a>
                                    </p>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php if ($pdo_statement->rowCount() > 0) : ?>
                            <?php while ($produit_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                            <div class="col-lg-4 col-md-6 mb-3">
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
                                        Pour 2 personnes<br><br>
                                        <strong class="prix_cadre_davy"><?= $produit_array['prix'] ?>€</strong>
                                        <a href="<?= URL ?>/box=<?= $produit_array['id_produit'] ?>" title="<?= URL ?>/box=<?= $produit_array['id_produit'] ?>"><i class="icon_cadre_davy"><img src="<?= URL ?>/images/icon-voir-min.png" class="image_cadre_icon_davy" alt="Icon voir"></i></a>
                                    </p>
                                </div>
                            </div>
                            <?php endwhile; ?>
                            <?php else : ?>
                            <p>Aucun produit</p>
                            <?php endif; ?>
                            <!-- Pagination -->
                            <div class="text_center_davy mt-3">
                                <?php if ($nb_pages > 1) : ?>
                                <?php for ($i = 1; $i <= $nb_pages; $i++) : ?>
                                <a title="Voir Page" class="mx-1 px-3 py-1 bouton_2_anim_davy <?php if ($page_actuelle == $i) {echo 'active_bouton_2_anim_davy';} ?>" href="?page=<?= $i ?>"><span><?= $i ?></span></a>
                                <?php endfor; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- script -->
            <script src="<?= URL ?>/include/js/script_accordion.js"></script>
            <script src="<?= URL ?>/include/js/script_nav_lien.js"></script>
            <script>nav_lien_active("lien_liste_box");</script>
        </div>
        <?php nb_visit_page($pdo_object, "Liste-box"); ?>
<?php
require_once("include/footer.php");
?>