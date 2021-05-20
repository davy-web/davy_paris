<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Détails du mail
if (isset($_GET['id'])) {
    $pdo_statement = $pdo_object->prepare("SELECT * FROM email WHERE id_email = :id_email");
    $pdo_statement->bindValue(':id_email', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement->execute();
    $email_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
    if (!$email_array) {
        header("Location:" . URL . "/admin/gestion-mails");
    }
}
else {
    header("Location:" . URL . "/admin/gestion-mails");
}

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Détails du mail</h1>
                    <hr class="anime_scroll_davy">
                    <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
                    <!-- formulaire -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md">
                                <label for="nom"><strong>Nom</strong></label><br>
                                <input type="text" id="nom" name="nom" placeholder="Nom" class="width_full_davy" value="<?= $email_array['nom'] ?>"><br><br>
                            </div>
                            <div class="col-md">
                                <label for="email"><strong>Email</strong></label><br>
                                <input type="text" id="email" name="email" placeholder="Email" class="width_full_davy" value="<?= $email_array['email'] ?>"><br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="sujet"><strong>Sujet</strong></label><br>
                                <input type="text" id="sujet" name="sujet" placeholder="Sujet" class="width_full_davy" value="<?= $email_array['sujet'] ?>"><br><br>
                                <label for="message"><strong>Message</strong></label><br>
                                <textarea id="message" tabindex="5" rows="9" name="message" placeholder="Message" class="width_full_davy"><?= $email_array['message'] ?></textarea><br><br>
                            </div>
                        </div>
                        <!-- bouton_anim_davy -->
                        <a href="<?= URL ?>/admin/gestion-mails" aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy" data-text="Retour" title="Retour">
                            <span>V</span>
                            <span>a</span>
                            <span>l</span>
                            <span>i</span>
                            <span>d</span>
                            <span>e</span>
                            <span>r</span>
                        </a><br>
                    </form>
                </div>
<?php
require_once("../include/footer-admin.php");
?>