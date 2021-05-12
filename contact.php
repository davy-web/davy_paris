<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Contact
$erreur_email = "";

if (isset($_POST['envoyer'])) {
    // Champs rempli
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['sujet']) && !empty($_POST['message'])) {
        // Email format
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Enregister
            $pdo_statement = $pdo_object->prepare("INSERT INTO email (nom, email, sujet, message) VALUES (:nom, :email, :sujet, :message)");
            $pdo_statement->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
            $pdo_statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
            $pdo_statement->bindValue(':sujet', $_POST['sujet'], PDO::PARAM_STR);
            $pdo_statement->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
            $pdo_statement->execute();
            // Envoyer email
            $destinataire = "chendavyweb@gmail.com";
            $object = "[Dating Paris] - " . $_POST['sujet'];
            $message = "Nom : " . $_POST['nom'] . "\nE-mail : " . $_POST['email'] . "\n\nMessage : \n" . $_POST['message'];
            $headers = "From: contact@dating-paris.code-website.com";
            if (mail($destinataire, $object, $message, $headers)) {
                $notification = "<strong class='color_red_davy'>Envoyé !</strong>";
            }
            $notification = "<strong class='color_red_davy'>Envoyé !</strong>";
        }
        else {
            $erreur_email = "<strong class='color_red_davy'>Mettre un email valable</strong>";
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
                    <h2>Contact</h2>
                    <hr class="float_right_davy">
                </div>
            </div>

            <!-- notification -->
            <div class="block_content_medium_davy block_center_davy text_center_davy">
                <p class="color_red_davy"><?= $notification ?><?= $erreur ?></p>
            </div>

            <!-- Contact -->
            <div class="container mt-5">
                <div class="row flex_flow_davy">
                    <div class="col-md mb-3">
                        <!-- Formulaire -->
                        <form method="post">
                            <div class="row">
                                <div class="col-md pe-md-2">
                                    <label for="nom"><strong>Nom</strong></label><br>
                                    <input type="text" id="nom" name="nom" placeholder="Saisir votre nom" class="width_full_davy"><br><br>
                                </div>
                                <div class="col-md ps-md-2">
                                    <label for="email"><strong>Email</strong></label> <?= $erreur_email ?><br>
                                    <input type="email" id="email" name="email" placeholder="Saisir votre email" class="width_full_davy"><br><br>
                                </div>
                            </div>
                            <label for="sujet"><strong>Sujet</strong></label><br>
                            <input type="text" id="sujet" name="sujet" placeholder="Saisir votre sujet" class="width_full_davy"><br><br>
                            <label for="message"><strong>Message</strong></label><br>
                            <textarea id="message" tabindex="5" rows="9" name="message" placeholder="Ecrire votre message ici ..." class="width_full_davy"></textarea><br><br>
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
                        <div class="cadre_image_page_davy">
                            <img src="<?= URL ?>/images/louvre-min.jpg" class="image_page_davy" alt="louvre-min.jpg">
                            <img src="<?= URL ?>/images/trait-rouge.png" class="trait_rouge" alt="Cadre">
                            <img src="<?= URL ?>/images/trait-2-rouge.png" class="trait_2_rouge" alt="Cadre">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php nb_visit_page($pdo_object, "Contact"); ?>
<?php
require_once("include/footer.php");
?>