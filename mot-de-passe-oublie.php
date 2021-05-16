<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Vérifie connexion
if (isset($_SESSION['membre'])) {
    header("Location:" . URL);
}

$erreur_email = "";
$erreur_mdp = "";
$erreur_mdp_confirm = "";

// Supprimer vieux tokens
$pdo_statement = $pdo_object->prepare("DELETE FROM mdpoublier WHERE date != DATE(NOW())");
$pdo_statement->execute();

if(!isset($_GET['token'])) {
    // Envoyer mail pour mot de passe oublé
    if (isset($_POST['envoyer'])) {
        // Champs rempli
        if (!empty($_POST['email'])) {
            // Email format
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                // Vérifie Email membre
                $pdo_statement = $pdo_object->prepare("SELECT * FROM membre WHERE email = :email");
                $pdo_statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
                $pdo_statement->execute();
                $membre_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
                if (!empty($membre_array)) {
                    // Créer token
                    $token = bin2hex(random_bytes(12));
                    // Vérifie Email mdpoublier
                    $pdo_statement = $pdo_object->prepare("SELECT * FROM mdpoublier WHERE email = :email");
                    $pdo_statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
                    $pdo_statement->execute();
                    $mdpoublier_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
                    if (empty($mdpoublier_array)) {
                        $pdo_statement = $pdo_object->prepare("INSERT INTO mdpoublier (email, token, date) VALUES (:email, :token, :date)");
                        $pdo_statement->bindValue(':email', htmlspecialchars($_POST['email']), PDO::PARAM_STR);
                        $pdo_statement->bindValue(':token', htmlspecialchars($token), PDO::PARAM_STR);
                        $pdo_statement->bindValue(':date', date("Y-m-d"), PDO::PARAM_STR);
                        $pdo_statement->execute();
                    }
                    else {
                        $pdo_statement = $pdo_object->prepare("UPDATE mdpoublier SET token = :token, date = :date WHERE email = :email");
                        $pdo_statement->bindValue(':email', htmlspecialchars($_POST['email']), PDO::PARAM_STR);
                        $pdo_statement->bindValue(':token', htmlspecialchars($token), PDO::PARAM_STR);
                        $pdo_statement->bindValue(':date', date("Y-m-d"), PDO::PARAM_STR);
                        $pdo_statement->execute();
                    }
                    // Envoie email
                    $destinataire = $_POST['email'];
                    $object = "[Dating Paris] - Changer votre mot de passe";
                    $message = "Bonjour,\n\nVous trouverez ci-dessous le lien de changement de mot de passe valable jusqu'à minuit :\n" . URL . "/mot-de-passe-oublie?token=" . $token . "\n\nCordialement,\nL'équipe de Dating Paris\nhttps://dating-paris.one-website.com";
                    $headers = "From: contact@dating-paris.one-website.com";
                    if (mail($destinataire, $object, $message, $headers)) {
                        $notification = "<strong class='color_red_davy'>L'email de changement de mot de passe a été envoyé</strong>";
                    }
                    else {
                        $error = "<strong class='color_red_davy'>Échec de l'envoi du message</strong>";
                    }
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
}
else {
    // Changer de mot de passe
    if (isset($_POST['envoyer'])) {
        $pdo_statement = $pdo_object->prepare("SELECT * FROM mdpoublier WHERE token = :token");
        $pdo_statement->bindValue(':token', $_GET['token'], PDO::PARAM_STR);
        $pdo_statement->execute();
        $mdpoublier_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
        if (!empty($mdpoublier_array)) {
            // verifie token
            if ($_GET['token'] === $mdpoublier_array['token']) {
                // Champs rempli
                if (!empty($_POST['mdp']) && !empty($_POST['mdp_confirm'])) {
                    // Mdp longueur
                    if (strlen($_POST['mdp']) >= 8) {
                        // Mdp confirmation
                        if ($_POST['mdp'] === $_POST['mdp_confirm']) {
                            // Enregister
                            $pdo_statement = $pdo_object->prepare("UPDATE membre SET mdp = :mdp WHERE email = :email");
                            $pdo_statement->bindValue(':mdp', password_hash($_POST['mdp'], PASSWORD_DEFAULT), PDO::PARAM_STR);
                            $pdo_statement->bindValue(':email', htmlspecialchars($mdpoublier_array['email']), PDO::PARAM_STR);
                            $pdo_statement->execute();
                            // Supprimer token mdpoublier
                            $pdo_statement = $pdo_object->prepare("DELETE FROM mdpoublier WHERE token = :token");
                            $pdo_statement->bindValue(':token', $_GET['token'], PDO::PARAM_STR);
                            $pdo_statement->execute();
                            $notification = "<strong class='color_red_davy'>Votre mot de passe a bien été modifié</strong>";
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
                    $erreur = "<strong class='color_red_davy'>Veuillez remplir tous les champs</strong>";
                }
            }
            else {
                $erreur = "<strong class='color_red_davy'>Le token n'est pas valable</strong>";
            }
        }
        else {
            $erreur = "<strong class='color_red_davy'>Le token n'existe pas</strong>";
        }
    }
}

require_once("include/header.php");
?>

        <div id="content_davy">
            <!-- style -->
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_intro_2.css">
            
            <!-- intro - anime_scroll_relative_content_davy -->
            <div class="block_anime_scroll_relative_content_1_davy">
                <img class="anime_scroll_relative_content_1_2_davy anime_scroll_relative_content_1_davy" src="<?= URL ?>/images/fond-menu-2-min.png" alt="Fond menu">
                <div class="anime_scroll_relative_content_1_1_davy anime_scroll_relative_content_1_davy container">
                    <h1>Mot de passe oublié</h1>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div>
            
            <!-- notification -->
            <div class="block_content_medium_davy block_center_davy text_center_davy">
                <p class="color_red_davy"><?= $notification ?><?= $erreur ?></p>
            </div>
            
            <!-- formulaire -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md mb-3">
                        <form method="post">
                            <!-- envoyer mail pour mot de passe oublé -->
                            <?php if(!isset($_GET['token'])) : ?>
                            <label for="email"><strong>Email</strong></label> <?= $erreur_email ?>
                            <input type="email" id="email" name="email" placeholder="Saisir votre email" class="width_full_davy"><br><br>
                            <?php endif; ?>
                            <!-- changer de mot de passe -->
                            <?php if(isset($_GET['token'])) : ?>
                            <label for="mdp"><strong>Mot de passe</strong></label> <?= $erreur_mdp ?><br>
                            <input type="password" id="mdp" name="mdp" placeholder="Saisir votre mot de passe" class="width_full_davy"><br><br>
                            <label for="mdp_confirm"><strong>Confirmation du mot de passe</strong></label> <?= $erreur_mdp_confirm ?><br>
                            <input type="password" id="mdp_confirm" name="mdp_confirm" placeholder="Confirmer votre mot de passe" class="width_full_davy"><br><br>
                            <?php endif; ?>
                            <!-- bouton_anim_davy -->
                            <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy width_full_davy" data-text="Envoyer" title="Envoyer">
                                <span>V</span>
                                <span>a</span>
                                <span>l</span>
                                <span>i</span>
                                <span>d</span>
                                <span>e</span>
                                <span>r</span>
                                <input type="submit" id="envoyer" name="envoyer" value="Envoyer" class="bouton_submit">
                            </a><br>
                        </form>
                    </div>
                    <div class="col-md mb-3">
                        <img src="<?= URL ?>/images/louvre-min.jpg" alt="Image contact" width="100%">
                    </div>
                </div>
            </div>
        </div>
        <?php nb_visit_page($pdo_object, "MDP-oublier"); ?>
<?php
require_once("include/footer.php");
?>