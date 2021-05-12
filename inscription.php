<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Vérifie connexion
if (isset($_SESSION['membre'])) {
    header("Location:" . URL);
}

// Inscription
$erreur_email = "";
$erreur_mdp = "";
$erreur_mdp_confirm = "";

if (isset($_POST['inscription'])) {
    // Champs rempli
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdp_confirm'])) {
        // Email format
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Email double
            $pdo_statement = $pdo_object->prepare("SELECT * FROM membre WHERE email = :email");
            $pdo_statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
            $pdo_statement->execute();
            $membre_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
            if (empty($membre_array)) {
                // Mdp longueur
                if (strlen($_POST['mdp']) >= 8) {
                    // Mdp confirmation
                    if ($_POST['mdp'] === $_POST['mdp_confirm']) {
                        // Enregister
                        $pdo_statement = $pdo_object->prepare("INSERT INTO membre (nom, prenom, email, mdp, statut, limit_connexion, limit_date) VALUES (:nom, :prenom, :email, :mdp, :statut, :limit_connexion, :limit_date)");
                        $pdo_statement->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
                        $pdo_statement->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
                        $pdo_statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
                        $pdo_statement->bindValue(':mdp', password_hash($_POST['mdp'], PASSWORD_DEFAULT), PDO::PARAM_STR);
                        $pdo_statement->bindValue(':statut', 1, PDO::PARAM_INT);
                        $pdo_statement->bindValue(':limit_connexion', 0, PDO::PARAM_INT);
                        $pdo_statement->bindValue(':limit_date', date("Y-m-d"), PDO::PARAM_STR);
                        $pdo_statement->execute();
                        // Redirection
                        $_SESSION['inscription'] = "enregistre";
                        header("Location:" . URL . "/connexion");
                    }
                    else {
                        $erreur_mdp_confirm = "<strong class='color_red_davy'>Les mots de passe saisis ne sont pas identiques</strong>";
                    }
                }
                else {
                    $erreur_mdp = "<strong class='color_red_davy'>Le mot de passe doit comporter au minimum 8 caractères</strong>";
                }
            }
            else {
                $erreur_email = "<strong class='color_red_davy'>L'adresse email a déjà été utilisé</strong>";
            }
        }
        else {
            $erreur_email = "<strong class='color_red_davy'>Mettre une adresse email valable</strong>";
        }
    }
    else {
        $erreur = "<strong class='color_red_davy'>Veuillez remplir tous les champs</strong>";
    }
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
                    <h1>Inscription</h1>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div>
            
            <!-- notification -->
            <div class="block_content_medium_davy block_center_davy text_center_davy">
                <p class="color_red_davy"><?= $erreur ?></p>
            </div>
            
            <!-- formulaire -->
            <div class="container mt-5">
                <div class="row flex_flow_davy">
                    <div class="col-md mb-3">
                        <!-- inscription -->
                        <form method="post">
                            <div class="row">
                                <div class="col-md pe-md-2">
                                    <label for="nom"><strong>Nom</strong></label><br>
                                    <input type="text" id="nom" name="nom" placeholder="Saisir votre nom" class="width_full_davy"><br><br>
                                </div>
                                <div class="col-md ps-md-2">
                                    <label for="prenom"><strong>Prénom</strong></label><br>
                                    <input type="text" id="prenom" name="prenom" placeholder="Saisir votre prenom" class="width_full_davy"><br><br>
                                </div>
                            </div>
                            <label for="email"><strong>Email</strong></label> <?= $erreur_email ?><br>
                            <input type="email" id="email" name="email" placeholder="Saisir votre email" class="width_full_davy"><br><br>
                            <label for="mdp"><strong>Mot de passe</strong></label> <?= $erreur_mdp ?><br>
                            <input type="password" id="mdp" name="mdp" placeholder="Saisir votre mot de passe" class="width_full_davy"><br><br>
                            <label for="mdp_confirm"><strong>Confirmation du mot de passe</strong></label> <?= $erreur_mdp_confirm ?><br>
                            <input type="password" id="mdp_confirm" name="mdp_confirm" placeholder="Confirmer votre mot de passe" class="width_full_davy"><br><br>
                            <!-- bouton_anim_davy -->
                            <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy width_full_davy" data-text="Inscription" title="Inscription">
                                <span>V</span>
                                <span>a</span>
                                <span>l</span>
                                <span>i</span>
                                <span>d</span>
                                <span>e</span>
                                <span>r</span>
                                <input type="submit" id="inscription" name="inscription" value="Inscription" class="bouton_submit">
                            </a><br>
                        </form>
                    </div>
                    <div class="col-md mb-3">
                        <div class="cadre_image_page_davy">
                            <img src="<?= URL ?>/images/louvre-min.jpg" class="image_page_davy" alt="louvre-min.jpg">
                            <img src="<?= URL ?>/images/trait-rouge.png" class="trait_rouge" alt="Cadre">
                            <img src="<?= URL ?>/images/trait-2-rouge.png" class="trait_2_rouge" alt="Cadre">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php nb_visit_page($pdo_object, "Inscription"); ?>
<?php
require_once("include/footer.php");
?>