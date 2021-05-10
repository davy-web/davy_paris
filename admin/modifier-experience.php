<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Modifier un article
if(isset($_GET['enregister']) && $_GET['enregister'] == "oui") {
    $notification = "<strong class='color_red_davy'>Enregister !</strong>";
}
if (isset($_GET['id'])) {
    $pdo_statement = $pdo_object->prepare("SELECT * FROM article WHERE id_article = :id_article");
    $pdo_statement->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);
    $pdo_statement->execute();
    $article_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
    $pdo_statement_2 = $pdo_object->prepare("SELECT * FROM produit");
    $pdo_statement_2->execute();
    
    if (!$article_array) {
        header("Location:" . URL . "/admin/gestion-articles");
    }
    if (isset($_POST['modifier'])) {
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
            $pdo_statement = $pdo_object->prepare("UPDATE article SET titre = :titre, description = :description, photo = :photo, titre_info = :titre_info, description_info = :description_info, categorie = :categorie, box = :box, adresse = :adresse, map = :map WHERE id_article = :id_article");
            $pdo_statement->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);
            $pdo_statement->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
            $pdo_statement->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
            $pdo_statement->bindValue(':photo', $photo, PDO::PARAM_STR);
            $pdo_statement->bindValue(':titre_info', $_POST['titre_info'], PDO::PARAM_STR);
            $pdo_statement->bindValue(':description_info', $_POST['description_info'], PDO::PARAM_STR);
            $pdo_statement->bindValue(':categorie', $_POST['categorie'], PDO::PARAM_STR);
            $pdo_statement->bindValue(':box', $_POST['box'], PDO::PARAM_STR);
            $pdo_statement->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
            $pdo_statement->bindValue(':map', $map, PDO::PARAM_STR);
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
            header("Location:" . URL . "/admin/modifier-experience?id=" . $_GET['id'] . "&enregister=oui");
        }
        else {
            $erreur = "<strong class='color_red_davy'>Veuillez mettre un titre</strong>";
        }
    }
}
else {
    header("Location:" . URL . "/admin/gestion-articles");
}

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Modifier un article</h1>
                    <hr>
                    <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
                    <!-- formulaire -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="titre"><strong>Titre</strong></label><br>
                                <input type="text" id="titre" name="titre" placeholder="Titre" class="width_full_davy" value="<?= $article_array['titre'] ?>"><br><br>
                                <label for="description"><strong>Description</strong></label><br>
                                <textarea id="description" tabindex="5" rows="9" name="description" placeholder="Description" class="width_full_davy"><?= $article_array['description'] ?></textarea><br><br>
                            </div>
                            <div class="col-md-4">
                                <label for="photo"><strong>Photo</strong></label><br>
                                <img class="width_full_davy border_radius_davy" src="<?= URL ?>/images/<?= $article_array['photo'] ?>" alt="<?= $article_array['photo'] ?>"><br>
                                <input type="file" id="photo" name="photo" placeholder="Photo" class="width_full_davy" value="<?= $article_array['photo'] ?>">
                                <label for="photo"><img src="<?= URL ?>/images/icon-file.svg" alt="icon" class="icon_admin"> Choisir un fichier...</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label for="titre_info"><strong>Deuxième titre</strong></label><br>
                                <input type="text" id="titre_info" name="titre_info" placeholder="Deuxième titre" class="width_full_davy" value="<?= $article_array['titre_info'] ?>"><br><br>
                                <label for="description_info"><strong>Deuxième description</strong></label><br>
                                <textarea id="description_info" tabindex="5" rows="9" name="description_info" placeholder="Description" class="width_full_davy"><?= $article_array['description_info'] ?></textarea><br><br>
                                <label for="map"><strong>Google Map</strong></label><br>
                                <textarea id="map" tabindex="5" rows="9" name="map" placeholder="Google Map" class="width_full_davy"><?= $article_array['map'] ?></textarea><br><br>
                            </div>
                            <div class="col-md-4">
                                <label for="categorie"><strong>Categorie</strong></label><br>
                                <input type="text" id="categorie" name="categorie" placeholder="Categorie" class="width_full_davy" value="<?= $article_array['categorie'] ?>"><br><br>
                                <label for="box"><strong>Box</strong></label><br>
                                <select id="box" name="box" class="width_full_davy">
                                    <option value="<?= $article_array['box'] ?>"><?= $article_array['box'] ?></option>
                                    <?php if ($pdo_statement_2->rowCount() > 0) : ?>
                                    <?php while ($produit_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <option value="<?= $produit_array['titre'] ?>"><?= $produit_array['titre'] ?></option>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                </select><br><br>
                                <!--input type="text" id="box" name="box" placeholder="Box" class="width_full_davy"><br><br-->
                                <label for="adresse"><strong>Adresse</strong></label><br>
                                <input type="text" id="adresse" name="adresse" placeholder="Adresse" class="width_full_davy" value="<?= $article_array['adresse'] ?>"><br><br>
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
                </div>
<?php
require_once("../include/footer-admin.php");
?>