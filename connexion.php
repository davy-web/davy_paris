<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Vérifie connexion
if (isset($_SESSION['membre'])) {
    header("Location:" . URL);
}

// Connexion
$erreur_email = "";

if(isset($_SESSION['inscription']) && $_SESSION['inscription'] == "enregistre") {
    $notification = "Vous êtes bien inscrit. Vous pouvez vous connecter";
    unset($_SESSION["inscription"]);
}

// Limit connexion
$pdo_statement = $pdo_object->prepare("SELECT * FROM membre");
$pdo_statement->execute();
$membre_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
if (!empty($membre_array)) {
    $pdo_statement_2 = $pdo_object->prepare("UPDATE membre SET limit_connexion = :limit_connexion WHERE limit_date != DATE(NOW())");
    $pdo_statement_2->bindValue(':limit_connexion', 0, PDO::PARAM_INT);
    $pdo_statement_2->execute();
}

if (isset($_POST['connexion'])) {
    // Champs rempli
    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
        // Email format
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Vérifie Email
            $pdo_statement = $pdo_object->prepare("SELECT * FROM membre WHERE email = :email");
            $pdo_statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
            $pdo_statement->execute();
            $membre_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
            if (!empty($membre_array)) {
                // Vérifie Mdp
                if (password_verify($_POST['mdp'], $membre_array['mdp']) && $membre_array['limit_connexion'] < 10) {
                    // Enregister
                    $_SESSION['membre']['id_membre'] = $membre_array['id_membre'];
                    $_SESSION['membre']['nom'] = $membre_array['nom'];
                    $_SESSION['membre']['prenom'] = $membre_array['prenom'];
                    $_SESSION['membre']['email'] = $membre_array['email'];
                    $_SESSION['membre']['statut'] = $membre_array['statut'];
                    // Redirection
                    if($_SESSION['membre']['statut'] == 2) {
                        header("Location:" . URL . "/admin/dashboard");
                    }
                    else {
                        header("Location:" . URL . "/profil");
                    }
                }
                else {
                    // Limit connexion
                    $pdo_statement_2 = $pdo_object->prepare("UPDATE membre SET limit_connexion = :limit_connexion, limit_date = :limit_date WHERE id_membre = :id_membre");
                    $pdo_statement_2->bindValue(':limit_connexion', $membre_array['limit_connexion'] + 1, PDO::PARAM_INT);
                    $pdo_statement_2->bindValue(':id_membre', $membre_array['id_membre'], PDO::PARAM_STR);
                    $pdo_statement_2->bindValue(':limit_date', date("Y-m-d"), PDO::PARAM_STR);
                    $pdo_statement_2->execute();
                    if ($membre_array['limit_connexion'] < 10) {
                        $tentative = 10 - $membre_array['limit_connexion'];
                        $erreur = "<strong class='color_red_davy'>L'email ou le mot de passe n'est pas valable. Il vous reste " . $tentative . " tentatives</strong>";
                    }
                    else {
                        $erreur = "<strong class='color_red_davy'>Le compte est bloqué jusqu'à minuit</strong>";
                    }
                }
            }
            else {
                $erreur = "<strong class='color_red_davy'>L'email ou le mot de passe n'est pas valable</strong>";
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
                    <h1>Connexion</h1>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div>
            
            <!-- notification -->
            <div class="block_content_medium_davy block_center_davy text_center_davy">
                <p class="color_red_davy"><?= $notification ?><?= $erreur ?></p>
            </div>
            
            <!-- formulaire -->
            <div class="container mt-5">
                <div class="row flex_flow_davy">
                    <div class="col-md mb-3">
                        <!-- connexion e-mail -->
                        <form method="post">
                            <label for="email"><strong>Email</strong></label> <?= $erreur_email ?>
                            <input type="email" id="email" name="email" placeholder="Saisir votre email" class="width_full_davy"><br><br>
                            <label for="mdp"><strong>Mot de passe</strong></label>
                            <!-- mot de passe oublié -->
                            <?php if(isset($_POST['connexion'])) : ?>
                            <a href="<?= URL ?>/mot-de-passe-oublie" title="Mot de passe oublié" class="color_red_davy"> Oublié ?</a>
                            <?php endif; ?>
                            <input type="password" id="mdp" name="mdp" placeholder="Saisir votre mot de passe" class="width_full_davy"><br><br>
                            <!-- bouton_anim_davy -->
                            <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy width_full_davy" data-text="Connexion" title="Connexion">
                                <span>V</span>
                                <span>a</span>
                                <span>l</span>
                                <span>i</span>
                                <span>d</span>
                                <span>e</span>
                                <span>r</span>
                                <input type="submit" id="connexion" name="connexion" value="Connexion" class="bouton_submit">
                            </a><br>
                        </form>
                        <!-- inscription -->
                        <div class="text_center_davy">
                            <a class="color_red_davy" href="<?= URL ?>/inscription" title="Inscription">Inscrivez-vous ici</a>
                        </div>
 
                        <br><br>
                        
                        <!-- connexion facebook -->
                        <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy width_full_davy background_blue_davy" data-text="Avec Facebook" title="Connexion">
                            <span>F</span>
                            <span>a</span>
                            <span>c</span>
                            <span>e</span>
                            <span>b</span>
                            <span>o</span>
                            <span>o</span>
                            <span>k</span>
                            <input type="submit" id="connexion" name="connexion" value="Connexion" class="bouton_submit">
                        </a><br>
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
        <?php nb_visit_page($pdo_object, "Connexion"); ?>
<?php
require_once("include/footer.php");
?>