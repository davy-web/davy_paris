<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Modifier un membre
if(isset($_GET['enregister']) && $_GET['enregister'] == "oui") {
    $notification = "<strong class='color_red_davy'>Enregister !</strong>";
}
if (isset($_GET['id'])) {
    $pdo_statement = $pdo_object->prepare("SELECT * FROM membre WHERE id_membre = :id_membre");
    $pdo_statement->bindValue(':id_membre', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement->execute();
    $membre_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
    
    if (!$membre_array) {
        header("Location:" . URL . "/admin/gestion-comptes");
    }
    if (isset($_POST['modifier'])) {
        // Champs rempli
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])) {
            // Email format
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                // Enregister
                $pdo_statement = $pdo_object->prepare("UPDATE membre SET nom = :nom, prenom = :prenom, email = :email, statut = :statut WHERE id_membre = :id_membre");
                $pdo_statement->bindValue(':id_membre', $_GET['id'], PDO::PARAM_INT);
                $pdo_statement->bindValue(':nom', htmlspecialchars($_POST['nom']), PDO::PARAM_STR);
                $pdo_statement->bindValue(':prenom', htmlspecialchars($_POST['prenom']), PDO::PARAM_STR);
                $pdo_statement->bindValue(':email', htmlspecialchars($_POST['email']), PDO::PARAM_STR);
                $pdo_statement->bindValue(':statut', $_POST['statut'], PDO::PARAM_INT);
                $pdo_statement->execute();
                // Redirection
                header("Location:" . URL . "/admin/modifier-comptes?id=" . $_GET['id'] . "&enregister=oui");
            }
            else {
                $erreur_email = "<strong class='color_red_davy'>Mettre une adresse email valable</strong>";
            }
        }
        else {
            $erreur = "<strong class='color_red_davy'>Veuillez remplir tous les champs</strong>";
        }
    }
}
else {
    header("Location:" . URL . "/admin/gestion-comptes");
}

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Modifier un membre</h1>
                    <hr>
                    <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
                    <!-- formulaire -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md">
                                <label for="nom"><strong>Nom</strong></label><br>
                                <input type="text" id="nom" name="nom" placeholder="Nom" class="width_full_davy" value="<?= $membre_array['nom'] ?>"><br><br>
                            </div>
                            <div class="col-md">
                                <label for="prenom"><strong>Prénom</strong></label><br>
                                <input type="text" id="prenom" name="prenom" placeholder="Prénom" class="width_full_davy" value="<?= $membre_array['prenom'] ?>"><br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="email"><strong>Email</strong></label><br>
                                <input type="text" id="email" name="email" placeholder="Email" class="width_full_davy" value="<?= $membre_array['email'] ?>"><br><br>
                                <label for="statut"><strong>Statut</strong></label><br>
                                <select id="statut" name="statut" class="width_full_davy">
                                    <option value="<?= $membre_array['statut'] ?>">
                                        <?php if ($membre_array['statut'] == 1) {echo "Client";} ?>
                                        <?php if ($membre_array['statut'] == 2) {echo "Admin";} ?>
                                        <?php if ($membre_array['statut'] == 3) {echo "Entreprise";} ?>
                                    </option>
                                    <option value="1">Client</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Entreprise</option>
                                </select><br><br>
                            </div>
                        </div>
                        <!-- bouton_anim_davy -->
                        <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy" data-text="Modifier" title="Modifier">
                            <span>V</span>
                            <span>a</span>
                            <span>l</span>
                            <span>i</span>
                            <span>d</span>
                            <span>e</span>
                            <span>r</span>
                            <input type="submit" id="modifier" name="modifier" value="Modifier" class="bouton_submit">
                        </a><br>
                    </form>

                    <!-- script -->
                    <script src="<?= URL ?>/include/js/script_nav_lien.js"></script>
                    <script>nav_lien_active("lien_modifier_comptes");</script>
                </div>
<?php
require_once("../include/footer-admin.php");
?>