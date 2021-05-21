<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Pagination
$element_par_page = 12;
$pdo_statement = $pdo_object->prepare("SELECT * FROM article WHERE etat = :etat");
$pdo_statement->bindValue(':etat', 1, PDO::PARAM_INT);
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
$query_elements = "SELECT * FROM article WHERE etat = 1 ORDER BY id_article DESC LIMIT " . $premiere_element . ", " . $element_par_page;

// Liste article
$pdo_statement = $pdo_object->prepare($query_elements);
$pdo_statement->execute();

// Liste article chercher
$pdo_statement_2 = $pdo_object->prepare("SELECT * FROM article WHERE etat = :etat");
$pdo_statement_2->bindValue(':etat', 1, PDO::PARAM_INT);
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
?>

                        <?php if (isset($_POST['chercher'])) : ?>
                            <?php while ($article_chercher_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC)) : ?>
                            <?php if ((!empty($_POST['gastronomie']) && ((find_davy($article_chercher_array["box"], $_POST['gastronomie']) == 1))) || (!empty($_POST['aventure']) && ((find_davy($article_chercher_array["box"], $_POST['aventure']) == 1))) || (!empty($_POST['bien_etre']) && ((find_davy($article_chercher_array["box"], $_POST['bien_etre']) == 1))) || (!empty($_POST['loisirs']) && ((find_davy($article_chercher_array["box"], $_POST['loisirs']) == 1))) || (!empty($_POST['mot_chercher']) && ((find_davy($article_chercher_array["titre"], $_POST['mot_chercher']) == 1) || (find_davy($article_chercher_array["description"], $_POST['mot_chercher']) == 1) || (find_davy($article_chercher_array["categorie"], $_POST['mot_chercher']) == 1) || (find_davy($article_chercher_array["box"], $_POST['mot_chercher']) == 1)))) : ?>
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="cadre_davy">
                                    <div class="image_cadre_davy">
                                        <img src="<?= URL ?>/images/<?= $article_chercher_array['photo'] ?>" class="image_cadre_2_davy" alt="<?= $article_chercher_array['photo'] ?>">
                                        <img src="<?= URL ?>/images/cadre-2-min.png" class="image_cadre_1_davy" alt="Cadre">
                                    </div>
                                    <p class="texte_cadre_davy">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <br>
                                        <strong><?= $article_chercher_array['titre'] ?></strong><br>
                                        <?= $article_chercher_array['categorie'] ?><br><br>
                                        <strong><?= $article_chercher_array['box'] ?></strong>
                                        <a href="<?= URL ?>/experience=<?= $article_chercher_array['id_article'] ?>" title="<?= URL ?>/experience=<?= $article_chercher_array['id_article'] ?>"><i class="icon_cadre_davy"><img src="<?= URL ?>/images/icon-voir-min.png" class="image_cadre_icon_davy" alt="Icon voir"></i></a>
                                    </p>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        <?php elseif (isset($_GET['chercher']) && $_GET['chercher'] != "") : ?>
                            <?php while ($article_chercher_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC)) : ?>
                            <?php if ((!empty($_POST['gastronomie']) && ((find_davy($article_chercher_array["box"], $_POST['gastronomie']) == 1))) || (!empty($_POST['aventure']) && ((find_davy($article_chercher_array["box"], $_POST['aventure']) == 1))) || (!empty($_POST['bien_etre']) && ((find_davy($article_chercher_array["box"], $_POST['bien_etre']) == 1))) || (!empty($_POST['loisirs']) && ((find_davy($article_chercher_array["box"], $_POST['loisirs']) == 1))) || (!empty($_GET['chercher']) && ((find_davy($article_chercher_array["titre"], $_GET['chercher']) == 1) || (find_davy($article_chercher_array["description"], $_GET['chercher']) == 1) || (find_davy($article_chercher_array["categorie"], $_GET['chercher']) == 1) || (find_davy($article_chercher_array["box"], $_GET['chercher']) == 1)))) : ?>
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="cadre_davy">
                                    <div class="image_cadre_davy">
                                        <img src="<?= URL ?>/images/<?= $article_chercher_array['photo'] ?>" class="image_cadre_2_davy" alt="<?= $article_chercher_array['photo'] ?>">
                                        <img src="<?= URL ?>/images/cadre-2-min.png" class="image_cadre_1_davy" alt="Cadre">
                                    </div>
                                    <p class="texte_cadre_davy">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <img src="<?= URL ?>/images/icon-coeur-vide-min.png" class="image_cadre_note_davy" alt="Icon coeur">
                                        <br>
                                        <strong><?= $article_chercher_array['titre'] ?></strong><br>
                                        <?= $article_chercher_array['categorie'] ?><br><br>
                                        <strong><?= $article_chercher_array['box'] ?></strong>
                                        <a href="<?= URL ?>/experience=<?= $article_chercher_array['id_article'] ?>" title="<?= URL ?>/experience=<?= $article_chercher_array['id_article'] ?>"><i class="icon_cadre_davy"><img src="<?= URL ?>/images/icon-voir-min.png" class="image_cadre_icon_davy" alt="Icon voir"></i></a>
                                    </p>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php if ($pdo_statement->rowCount() > 0) : ?>
                            <?php while ($article_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="cadre_davy">
                                    <div class="image_cadre_davy">
                                        <img src="<?= URL ?>/images/<?= $article_array['photo'] ?>" class="image_cadre_2_davy" alt="<?= $article_array['photo'] ?>">
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
                            <p>Aucun article</p>
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