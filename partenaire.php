<?php 
require_once("include/init.php");
require_once("include/fonctions.php");

// Vérifie partenaire
partenaire_connecte();

// Enregister
if(isset($_GET['enregister']) && $_GET['enregister'] == "oui") {
    $notification = "<strong class='color_red_davy'>Enregister !</strong>";
}

// Supprimer article partenaire
if (!empty($_GET['supprimer'])) {
    $pdo_statement = $pdo_object->prepare("DELETE FROM article WHERE id_article = :id_article AND membre_id = :membre_id");
    $pdo_statement->bindValue(":id_article", $_GET['supprimer'], PDO::PARAM_INT);
    $pdo_statement->bindValue(":membre_id", $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
    $pdo_statement->execute();
    header("Location:" . URL . "/partenaire");
}

// Gestion article partenaire
$pdo_statement = $pdo_object->prepare("SELECT * FROM article WHERE membre_id = :membre_id");
$pdo_statement->bindValue(":membre_id", $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
$pdo_statement->execute();

// Produit
$pdo_statement_2 = $pdo_object->prepare("SELECT * FROM produit");
$pdo_statement_2->execute();

// Ajouter un article partenaire
if (isset($_POST['ajouter'])) {
    // Titre
    if (!empty($_POST['titre'])) {
        // Enregister
        $photo = "louvre-min.jpg";
        if (!empty($article_array['photo'])) {
            $photo = $article_array['photo'];
        }
        if (!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo']['name'];
        }
        $map = $_POST['map'];
        if ($map == '') {
            $map = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        }
        $pdo_statement = $pdo_object->prepare("INSERT INTO article (titre, description, photo, titre_info, description_info, categorie, box, adresse, map, etat, membre_id) VALUES (:titre, :description, :photo, :titre_info, :description_info, :categorie, :box, :adresse, :map, :etat, :membre_id)");
        $pdo_statement->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
        $pdo_statement->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $pdo_statement->bindValue(':photo', htmlspecialchars($photo), PDO::PARAM_STR);
        $pdo_statement->bindValue(':titre_info', $_POST['titre_info'], PDO::PARAM_STR);
        $pdo_statement->bindValue(':description_info', $_POST['description_info'], PDO::PARAM_STR);
        $pdo_statement->bindValue(':categorie', htmlspecialchars($_POST['categorie']), PDO::PARAM_STR);
        $pdo_statement->bindValue(':box', htmlspecialchars($_POST['box']), PDO::PARAM_STR);
        $pdo_statement->bindValue(':adresse', htmlspecialchars($_POST['adresse']), PDO::PARAM_STR);
        $pdo_statement->bindValue(':map', $map, PDO::PARAM_STR);
        $pdo_statement->bindValue(':etat', 0, PDO::PARAM_INT);
        $pdo_statement->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
        $pdo_statement->execute();

        // Enregister fichier
        if (!empty($_FILES['photo']['name'])) {
            $file_name = $_FILES['photo']['name'];
            $file_tmp_name = $_FILES['photo']['tmp_name'];
            $file_size = $_FILES['photo']['size'];
            $file_error = $_FILES['photo']['error'];
            $file_destination = '../images/' . $file_name;
            $file_ext = explode('.', $file_name);
            $file_actual_ext = strtolower(end($file_ext));
            $allowed = array('jpg', 'jpeg', 'png', 'svg');
            // Format fichier
            if (in_array($file_actual_ext, $allowed)) {
                // Erreur fichier
                if ($file_error === 0) {
                    // Taille fichier
                    if ($file_size < 1000000) {
                        // Téléverse fichier
                        move_uploaded_file($file_tmp_name, $file_destination);
                    }
                    else {
                        $erreur = "<strong class='color_red_davy'>Le fichier est trop gros</strong>";
                    }
                }
                else {
                    $erreur = "<strong class='color_red_davy'>Il y a eu une erreur dans le téléversement du fichier</strong>";
                }
            }
            else {
                $erreur = "<strong class='color_red_davy'>Vous ne pouvez pas téléverser ce type de fichier</strong>";
            }
        }
        header("Location:" . URL . "/partenaire?enregister=oui");
    }
    else {
        $erreur = "<strong class='color_red_davy'>Veuillez mettre un titre</strong>";
    }
}

// Code client
if (isset($_POST['code_client'])) {
    $pdo_statement = $pdo_object->prepare("SELECT * FROM details_commande WHERE code = :code_1 AND code != :code_2 AND code != :code_3");
    $pdo_statement->bindValue(":code_1", htmlspecialchars($_POST['code']), PDO::PARAM_STR);
    $pdo_statement->bindValue(":code_2", "0", PDO::PARAM_STR);
    $pdo_statement->bindValue(":code_3", "1", PDO::PARAM_STR);
    $pdo_statement->execute();
    $details_commande_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
    if ($details_commande_array) {
        // code
        $quantite = $details_commande_array['quantite'] - 1;
        if ($quantite >= 1) {
            $code = rand(100000000000, 999999999999) . $commande_array['id_commande'];
        }
        else {
            $code = "1";
        }
        // modifier code
        $pdo_statement_2 = $pdo_object->prepare("UPDATE details_commande SET quantite = :quantite, code = :code WHERE code = :code_1 AND code != :code_2 AND code != :code_3");
        $pdo_statement_2->bindValue(":quantite", $quantite, PDO::PARAM_INT);
        $pdo_statement_2->bindValue(":code", $code, PDO::PARAM_STR);
        $pdo_statement_2->bindValue(":code_1", htmlspecialchars($_POST['code']), PDO::PARAM_STR);
        $pdo_statement_2->bindValue(":code_2", "0", PDO::PARAM_STR);
        $pdo_statement_2->bindValue(":code_3", "1", PDO::PARAM_STR);
        $pdo_statement_2->execute();
        // commande
        $pdo_statement_commande = $pdo_object->prepare("SELECT * FROM commande WHERE id_commande = :id_commande");
        $pdo_statement_commande->bindValue(":id_commande", $details_commande_array['commande_id'], PDO::PARAM_INT);
        $pdo_statement_commande->execute();
        $commande_array = $pdo_statement_commande->fetch(PDO::FETCH_ASSOC);
        // ajoute code partenaire
        if ($commande_array) {
            $pdo_statement_3 = $pdo_object->prepare("INSERT INTO partenaire (entreprise_id, client_id, prix, date) VALUES (:entreprise_id, :client_id, :prix, :date)");
            $pdo_statement_3->bindValue(":entreprise_id", $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
            $pdo_statement_3->bindValue(":client_id", $commande_array['membre_id'], PDO::PARAM_INT);
            $pdo_statement_3->bindValue(":prix", $details_commande_array['prix'], PDO::PARAM_INT);
            $pdo_statement_3->bindValue(":date", date("Y-m-d"), PDO::PARAM_STR);
            $pdo_statement_3->execute();
            $notification = "<strong class='color_red_davy'>Le code est valide</strong>";
        }
    }
    else {
        $erreur = "<strong class='color_red_davy'>Le code n'est pas valide</strong>";
    }
}

// Déconnexion
if (isset($_POST['deconnexion'])) {
    deconnexion();
}

require_once("include/header.php");
?>

        <div id="content_davy">
            <!-- style -->
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_intro_2.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_cadre.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_admin.css">
            
            <!-- intro - anime_scroll_relative_content_davy -->
            <div class="block_anime_scroll_relative_content_1_davy">
                <img class="anime_scroll_relative_content_1_2_davy anime_scroll_relative_content_1_davy" src="<?= URL ?>/images/fond-menu-2-min.png" alt="Fond menu">
                <div class="anime_scroll_relative_content_1_1_davy anime_scroll_relative_content_1_davy container">
                    <h1>Partenaire</h1>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div><br>

            <!-- déconnexion -->
            <?php if (isset($_SESSION['membre'])) : ?>
            <form method="post">
                <!-- bouton_anim_davy -->
                <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy" data-text="Déconnexion" title="Déconnexion">
                    <span>V</span>
                    <span>a</span>
                    <span>l</span>
                    <span>i</span>
                    <span>d</span>
                    <span>e</span>
                    <span>r</span>
                    <input type="submit" id="deconnexion" name="deconnexion" value="Déconnexion" class="bouton_submit">
                </a><br>
            </form>
            <?php endif; ?>
            
            <!-- code client -->
            <div class="container mt-5 mb-3">
                <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
                <h2 class="h2_moyen_davy">Code <span class="color_red_davy serif_davy">client</span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container mb-3">
                <div class="row">
                    <div class="col">
                        <!-- formulaire -->
                        <form method="post">
                            <input type="text" id="code" name="code" placeholder="Rentrer le code client pour recevoir l'argent" class="width_full_davy"><br><br>
                            <!-- bouton_anim_davy -->
                            <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy" data-text="Code client" title="Code client">
                                <span>V</span>
                                <span>a</span>
                                <span>l</span>
                                <span>i</span>
                                <span>d</span>
                                <span>e</span>
                                <span>r</span>
                                <input type="submit" id="code_client" name="code_client" value="Code client" class="bouton_submit">
                            </a><br>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- partenaire -->
            <div class="container mt-3 mb-3">
                <h2 class="h2_moyen_davy">Bienvenue <span class="color_red_davy serif_davy"><?= $_SESSION['membre']['prenom'] ?></span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container mb-3">
                <div class="row">
                    <div class="col">
                        <div class="table_responsive_davy">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Photo</th>
                                        <th>Box</th>
                                        <th>Catégorie</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($pdo_statement->rowCount() > 0) : ?>
                                    <?php while ($article_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <tr>
                                        <td><?= $article_array['titre'] ?></td>
                                        <td><img src="<?= URL ?>/images/<?= $article_array['photo'] ?>" class="image_admin_davy" alt="<?= $article_array['photo'] ?>"></td>
                                        <td><?= $article_array['box'] ?></td>
                                        <td><?= $article_array['categorie'] ?></td>
                                        <td>
                                            <a href="<?= URL ?>/experience=<?= $article_array['id_article'] ?>" title="Voir">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="136pt" version="1.1" viewBox="-1 0 136 136.21852" width="136pt" class="icon_gestion_admin"><path fill="currentColor" d="M 93.148438 80.832031 C 109.5 57.742188 104.03125 25.769531 80.941406 9.421875 C 57.851562 -6.925781 25.878906 -1.460938 9.53125 21.632812 C -6.816406 44.722656 -1.351562 76.691406 21.742188 93.039062 C 38.222656 104.707031 60.011719 105.605469 77.394531 95.339844 L 115.164062 132.882812 C 119.242188 137.175781 126.027344 137.347656 130.320312 133.269531 C 134.613281 129.195312 134.785156 122.410156 130.710938 118.117188 C 130.582031 117.980469 130.457031 117.855469 130.320312 117.726562 Z M 51.308594 84.332031 C 33.0625 84.335938 18.269531 69.554688 18.257812 51.308594 C 18.253906 33.0625 33.035156 18.269531 51.285156 18.261719 C 69.507812 18.253906 84.292969 33.011719 84.328125 51.234375 C 84.359375 69.484375 69.585938 84.300781 51.332031 84.332031 C 51.324219 84.332031 51.320312 84.332031 51.308594 84.332031 Z M 51.308594 84.332031"/></svg>
                                            </a>
                                            <a href="<?= URL ?>/partenaire-modifier=<?= $article_array['id_article'] ?>" title="Modifier">
                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon_gestion_admin" x="0px" y="0px" viewBox="0 0 489.663 489.663" style="enable-background:new 0 0 489.663 489.663;" xml:space="preserve"><g><path fill="currentColor" d="M467.144,103.963l5.6-5.6c22.5-22.5,22.5-58.9,0-81.4c-22.4-22.6-58.9-22.6-81.3-0.1l-5.6,5.6L467.144,103.963z"/></g><g><path fill="currentColor" d="M324.944,297.763v124.5h-257.5v-257.5h124.5l67.4-67.4h-244.6c-8.1,0-14.7,6.6-14.7,14.7v362.9c0,8.1,6.6,14.7,14.7,14.7 h362.9c8.1,0,14.7-6.6,14.7-14.7v-244.6L324.944,297.763z"/></g><g><polygon fill="currentColor" points="360.644,47.663 132.244,276.063 114.044,375.663 213.644,357.463 442.044,129.063"/></g></svg>
                                            </a>
                                            <a href="<?= URL ?>/partenaire?supprimer=<?= $article_array['id_article'] ?>" onclick="return(confirm('Souhaitez-vous supprimer ?'))" title="Supprimer">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" class="icon_gestion_admin svg-inline--fa fa-trash-alt fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                    <?php else : ?>
                                    <tr>
                                        <td colspan="6" class="text_center_davy">Aucun article</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ajouter un article -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">Ajouter <span class="color_red_davy serif_davy">un article</span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container mb-3">
                <div class="row">
                    <div class="col">
                        <!-- formulaire -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="titre"><strong>Titre</strong></label><br>
                                    <input type="text" id="titre" name="titre" placeholder="Titre" class="width_full_davy"><br><br>
                                    <label for="description"><strong>Description</strong></label><br>
                                    <textarea id="description" tabindex="5" rows="9" name="description" placeholder="Description" class="width_full_davy"></textarea><br><br>
                                </div>
                                <div class="col-md-4">
                                    <label for="photo"><strong>Photo</strong></label><br>
                                    <input type="file" accept="image/*" id="photo" name="photo" placeholder="Photo" class="width_full_davy">
                                    <label for="photo"><img src="<?= URL ?>/images/icon-file.svg" alt="icon" class="icon_admin"> Choisir un fichier...</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="titre_info"><strong>Deuxième titre</strong></label><br>
                                    <input type="text" id="titre_info" name="titre_info" placeholder="Deuxième titre" class="width_full_davy"><br><br>
                                    <label for="description_info"><strong>Deuxième description</strong></label><br>
                                    <textarea id="description_info" tabindex="5" rows="9" name="description_info" placeholder="Description" class="width_full_davy"></textarea><br><br>
                                    <label for="map"><strong>Google Map</strong></label><br>
                                    <textarea id="map" tabindex="5" rows="9" name="map" placeholder="Google Map" class="width_full_davy"></textarea><br><br>
                                </div>
                                <div class="col-md-4">
                                    <label for="categorie"><strong>Categorie</strong></label><br>
                                    <input type="text" id="categorie" name="categorie" placeholder="Categorie" class="width_full_davy"><br><br>
                                    <label for="box"><strong>Box</strong></label><br>
                                    <select id="box" name="box" class="width_full_davy">
                                        <option value="">Sélectionner ...</option>
                                        <?php if ($pdo_statement_2->rowCount() > 0) : ?>
                                        <?php while ($produit_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC)) : ?>
                                        <option value="<?= $produit_array['titre'] ?>"><?= $produit_array['titre'] ?></option>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                    </select><br><br>
                                    <label for="adresse"><strong>Adresse</strong></label><br>
                                    <input type="text" id="adresse" name="adresse" placeholder="Adresse" class="width_full_davy"><br><br>
                                </div>
                            </div>
                            <!-- bouton_anim_davy -->
                            <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy" data-text="Ajouter" title="Ajouter">
                                <span>V</span>
                                <span>a</span>
                                <span>l</span>
                                <span>i</span>
                                <span>d</span>
                                <span>e</span>
                                <span>r</span>
                                <input type="submit" id="ajouter" name="ajouter" value="Ajouter" class="bouton_submit">
                            </a><br>
                        </form>
                    </div>
                </div>
            </div>

            <!-- script -->
            <script src="<?= URL ?>/include/js/script_nav_lien.js"></script>
            <script>nav_lien_active("lien_profil");</script>
        </div>
        <?php nb_visit_page($pdo_object, "Partenaire"); ?>
<?php
require_once("include/footer.php");
?>