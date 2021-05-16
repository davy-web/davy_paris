<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Ajouter un produit
if(isset($_GET['enregister']) && $_GET['enregister'] == "oui") {
    $notification = "<strong class='color_red_davy'>Enregister !</strong>";
}
if (isset($_POST['ajouter'])) {
    // Titre
    if (!empty($_POST['titre'])) {
        // Enregister
        $photo = "louvre-min.jpg";
        if (!empty($produit_array['photo'])) {
            $photo = $produit_array['photo'];
        }
        if (!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo']['name'];
        }
        $pdo_statement = $pdo_object->prepare("INSERT INTO produit (titre, description, photo, prix, stock) VALUES (:titre, :description, :photo, :prix, :stock)");
        $pdo_statement->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
        $pdo_statement->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $pdo_statement->bindValue(':photo', htmlspecialchars($photo), PDO::PARAM_STR);
        $pdo_statement->bindValue(':prix', htmlspecialchars($_POST['prix']), PDO::PARAM_STR);
        $pdo_statement->bindValue(':stock', $_POST['stock'], PDO::PARAM_INT);
        $pdo_statement->execute();
        $notification = "<strong class='color_red_davy'>Enregister !</strong>";
        
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
        header("Location:" . URL . "/admin/ajouter-box?enregister=oui");
    }
    else {
        $erreur = "<strong class='color_red_davy'>Veuillez mettre un titre</strong>";
    }
}

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Ajouter un produit</h1>
                    <hr>
                    <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
                    <!-- formulaire -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md">
                                <label for="titre"><strong>Titre</strong></label><br>
                                <input type="text" id="titre" name="titre" placeholder="Titre" class="width_full_davy"><br><br>
                                <label for="description"><strong>Description</strong></label><br>
                                <textarea id="description" tabindex="5" rows="9" name="description" placeholder="Description" class="width_full_davy"></textarea><br><br>
                                <label for="prix"><strong>Prix</strong></label><br>
                                <input type="text" id="prix" name="prix" placeholder="Prix" class="width_full_davy"><br><br>
                                <label for="stock"><strong>Stock</strong></label><br>
                                <input type="text" id="stock" name="stock" placeholder="Stock" class="width_full_davy"><br><br>
                            </div>
                            <div class="col-md">
                                <label for="photo"><strong>Photo</strong></label><br>
                                <img class="width_full_davy border_radius_davy" src="" alt=""><br>
                                <input type="file" accept="image/*" id="photo" name="photo" placeholder="Photo" class="width_full_davy">
                                <label for="photo"><img src="<?= URL ?>/images/icon-file.svg" alt="icon" class="icon_admin"> Choisir un fichier...</label>
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

                    <!-- script -->
                    <script src="<?= URL ?>/include/js/script_nav_lien.js"></script>
                    <script>nav_lien_active("lien_ajouter_box");</script>
                </div>
<?php
require_once("../include/footer-admin.php");
?>