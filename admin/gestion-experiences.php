<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Supprimer article
if (!empty($_GET['supprimer'])) {
    $pdo_statement = $pdo_object->prepare("DELETE FROM article WHERE id_article = :id_article");
    $pdo_statement->bindValue(":id_article", $_GET['supprimer'], PDO::PARAM_INT);
    $pdo_statement->execute();
    header("Location:" . URL . "/admin/gestion-experiences");
}

// Gestion article
$pdo_statement = $pdo_object->prepare("SELECT * FROM article");
$pdo_statement->execute();

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Liste des articles</h1>
                    <hr>
                    <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
                    <div class="table_responsive_davy">
                        <table>
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Photo</th>
                                    <th>Box</th>
                                    <th>Catégorie</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($pdo_statement->rowCount() > 0) : ?>
                                <?php while ($article_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr>
                                    <td><?= $article_array['titre'] ?></td>
                                    <td><?= $article_array['photo'] ?></td>
                                    <td><?= $article_array['box'] ?></td>
                                    <td><?= $article_array['categorie'] ?></td>
                                    <td><a href="<?= URL ?>/admin/modifier-experience?id=<?= $article_array['id_article'] ?>" title="Modifier">Modifier</a></td>
                                    <td><a href="<?= URL ?>/admin/gestion-experience?supprimer=<?= $article_array['id_article'] ?>" title="Supprimer">Supprimer</a></td>
                                </tr>
                                <?php endwhile; ?>
                                <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text_center_davy">Aucun article</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<?php
require_once("../include/footer-admin.php");
?>