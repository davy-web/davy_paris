<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Supprimer mail
if (!empty($_GET['supprimer'])) {
    $pdo_statement = $pdo_object->prepare("DELETE FROM email WHERE id_email = :id_email");
    $pdo_statement->bindValue(":id_email", $_GET['supprimer'], PDO::PARAM_INT);
    $pdo_statement->execute();
    header("Location:" . URL . "/admin/mail");
}

// Mail
$pdo_statement = $pdo_object->prepare("SELECT * FROM email");
$pdo_statement->execute();

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Mail</h1>
                    <hr>
                    <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
                    <div class="table_responsive_davy">
                        <table>
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Sujet</th>
                                    <th>Message</th>
                                    <th>Voir</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($pdo_statement->rowCount() > 0) : ?>
                                <?php while ($email_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr>
                                    <td><?= $email_array['email'] ?></td>
                                    <td><?= $email_array['sujet'] ?></td>
                                    <td><?= $email_array['message'] ?></td>
                                    <td><a href="<?= URL ?>/admin/details-mail?id=<?= $email_array['id_email'] ?>" title="Modifier">Voir</a></td>
                                    <td><a href="<?= URL ?>/admin/email?supprimer=<?= $email_array['id_email'] ?>" title="Supprimer">Supprimer</a></td>
                                </tr>
                                <?php endwhile; ?>
                                <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text_center_davy">Aucun produit</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<?php
require_once("../include/footer-admin.php");
?>