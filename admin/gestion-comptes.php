<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Supprimer produit
if (!empty($_GET['supprimer'])) {
    $pdo_statement = $pdo_object->prepare("DELETE FROM membre WHERE id_membre = :id_membre");
    $pdo_statement->bindValue(":id_membre", $_GET['supprimer'], PDO::PARAM_INT);
    $pdo_statement->execute();
    header("Location:" . URL . "/admin/comptes");
}

// Gestion produit
$pdo_statement = $pdo_object->prepare("SELECT * FROM membre");
$pdo_statement->execute();

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Comptes</h1>
                    <hr class="anime_scroll_davy">
                    <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
                    <div class="table_responsive_davy">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Statut</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($pdo_statement->rowCount() > 0) : ?>
                                <?php while ($membre_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr>
                                    <td><?= $membre_array['nom'] ?></td>
                                    <td><?= $membre_array['prenom'] ?></td>
                                    <td><?= $membre_array['email'] ?></td>
                                    <td>
                                        <?php if ($membre_array['statut'] == 1) {echo "Client";} ?>
                                        <?php if ($membre_array['statut'] == 2) {echo "Admin";} ?>
                                        <?php if ($membre_array['statut'] == 3) {echo "Entreprise";} ?>
                                    </td>
                                    <td>
                                        <a href="<?= URL ?>/admin/modifier-compte?id=<?= $membre_array['id_membre'] ?>" title="Modifier">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon_gestion_admin" x="0px" y="0px" viewBox="0 0 489.663 489.663" style="enable-background:new 0 0 489.663 489.663;" xml:space="preserve"><g><path fill="currentColor" d="M467.144,103.963l5.6-5.6c22.5-22.5,22.5-58.9,0-81.4c-22.4-22.6-58.9-22.6-81.3-0.1l-5.6,5.6L467.144,103.963z"/></g><g><path fill="currentColor" d="M324.944,297.763v124.5h-257.5v-257.5h124.5l67.4-67.4h-244.6c-8.1,0-14.7,6.6-14.7,14.7v362.9c0,8.1,6.6,14.7,14.7,14.7 h362.9c8.1,0,14.7-6.6,14.7-14.7v-244.6L324.944,297.763z"/></g><g><polygon fill="currentColor" points="360.644,47.663 132.244,276.063 114.044,375.663 213.644,357.463 442.044,129.063"/></g></svg>
                                        </a>
                                        <?php if ($membre_array['statut'] != 2) : ?>
                                        <a href="<?= URL ?>/admin/gestion-comptes?supprimer=<?= $membre_array['id_membre'] ?>" onclick="return(confirm('Souhaitez-vous supprimer ?'))" title="Supprimer">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" class="icon_gestion_admin svg-inline--fa fa-trash-alt fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                        </a>
                                        <?php endif; ?>
                                    </td>
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

                    <!-- script -->
                    <script src="<?= URL ?>/include/js/script_nav_lien.js"></script>
                    <script>nav_lien_active("lien_gestion_comptes");</script>
                </div>
<?php
require_once("../include/footer-admin.php");
?>