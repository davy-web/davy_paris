<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Supprimer produit
if (!empty($_GET['supprimer'])) {
    $pdo_statement = $pdo_object->prepare("DELETE FROM produit WHERE id_produit = :id_produit");
    $pdo_statement->bindValue(":id_produit", $_GET['supprimer'], PDO::PARAM_INT);
    $pdo_statement->execute();
    header("Location:" . URL . "/admin/gestion-box");
}

// Gestion produit
$pdo_statement = $pdo_object->prepare("SELECT * FROM produit");
$pdo_statement->execute();

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Liste des produits</h1>
                    <hr>
                    <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
                    <div class="table_responsive_davy">
                        <table>
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Photo</th>
                                    <th>Prix</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($pdo_statement->rowCount() > 0) : ?>
                                <?php while ($produit_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr>
                                    <td><?= $produit_array['titre'] ?></td>
                                    <td><?= $produit_array['photo'] ?></td>
                                    <td><?= $produit_array['prix'] ?> €</td>
                                    <td><a href="<?= URL ?>/admin/modifier-box?id=<?= $produit_array['id_produit'] ?>" title="Modifier">Modifier</a></td>
                                    <td><a href="<?= URL ?>/admin/gestion-box?supprimer=<?= $produit_array['id_produit'] ?>" title="Supprimer">Supprimer</a></td>
                                </tr>
                                <?php endwhile; ?>
                                <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text_center_davy">Aucun produit</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<?php
require_once("../include/footer-admin.php");
?>