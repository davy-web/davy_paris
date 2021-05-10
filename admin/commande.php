<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Supprimer commande
if (!empty($_GET['supprimer'])) {
    $pdo_statement = $pdo_object->prepare("DELETE FROM commande WHERE id_commande = :id_commande");
    $pdo_statement->bindValue(":id_commande", $_GET['supprimer'], PDO::PARAM_INT);
    $pdo_statement->execute();
    header("Location:" . URL . "/admin/commande");
}

// Commande
$pdo_statement = $pdo_object->prepare("SELECT * FROM commande");
$pdo_statement->execute();

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Commande</h1>
                    <hr>
                    <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
                    <div class="table_responsive_davy">
                        <table>
                            <thead>
                                <tr>
                                    <th>Commande</th>
                                    <th>Client</th>
                                    <th>Prix</th>
                                    <th>Date</th>
                                    <th>Etat</th>
                                    <th>Détails</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($pdo_statement->rowCount() > 0) : ?>
                                <?php while ($commande_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr>
                                    <td><?= $commande_array['id_commande'] ?></td>
                                    <td><?= $commande_array['membre_id'] ?></td>
                                    <td><?= $commande_array['prix_total'] ?> €</td>
                                    <td><?= $commande_array['date'] ?></td>
                                    <td><?= $commande_array['etat'] ?></td>
                                    <td><a href="<?= URL ?>/admin/details-commande?id=<?= $commande_array['id_commande'] ?>" title="Modifier">Détails</a></td>
                                    <td><a href="<?= URL ?>/admin/commande?supprimer=<?= $commande_array['id_commande'] ?>" title="Supprimer">Supprimer</a></td>
                                </tr>
                                <?php endwhile; ?>
                                <?php else : ?>
                                <tr>
                                    <td colspan="7" class="text_center_davy">Aucun produit</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<?php
require_once("../include/footer-admin.php");
?>