<?php
require_once("include/init.php");
require_once("include/fonctions.php");

// Vérifie Membre
if (isset($_SESSION['membre'])) {
    // Vérifie panier
    $pdo_statement = $pdo_object->prepare("SELECT * FROM commande WHERE membre_id = :membre_id");
    $pdo_statement->bindValue(":membre_id", $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
    $pdo_statement->execute();
    $commande_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
    if (!$commande_array) {
        header("Location:" . URL . "/panier");
    }
}
else {
    header("Location:" . URL . "/connexion");
}

// Message Validation
if (isset($_GET['validation']) && $_GET['validation'] == "oui") {
    $notification = "Paiement accepté";
}
if (isset($_GET['validation']) && $_GET['validation'] == "non") {
    $erreur = "Paiement refusé";
}


require_once("include/header.php");
?>

        <div id="content_davy">
            <!-- style -->
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_intro_2.css">
            <link rel="stylesheet" href="<?= URL ?>/include/css/style_page.css">
            <!-- script -->
            <script src="https://js.stripe.com/v3/"></script>
            
            <!-- intro - anime_scroll_relative_content_davy -->
            <div class="block_anime_scroll_relative_content_1_davy">
                <img class="anime_scroll_relative_content_1_2_davy anime_scroll_relative_content_1_davy" src="<?= URL ?>/images/fond-menu-2-min.png" alt="Fond menu">
                <div class="anime_scroll_relative_content_1_1_davy anime_scroll_relative_content_1_davy container">
                    <h1>Paiement</h1>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div><br>

            <!-- Etape -->
            <div class="block_content_medium_davy block_center_davy text_center_davy">
                <div class="row">
                    <div class="col mb-3">
                        <a title="Panier" class="bouton_2_anim_davy" href="<?= URL ?>/panier"><span>1</span></a><br>
                        <p>Panier</p>
                    </div>
                    <div class="col mb-3">
                        <a title="Coordonnées" class="bouton_2_anim_davy" href="#"><span>2</span></a>
                        <p>Coordonnées</p>
                    </div>
                    <div class="col mb-3">
                        <a title="Paiement" class="bouton_2_anim_davy active_bouton_2_anim_davy" href="<?= URL ?>/paiement"><span>3</span></a>
                        <p>Paiement</p>
                    </div>
                </div>
            </div>

            <!-- stripe -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">Carte de crédit</h2>
                <hr class="anime_scroll_davy">
                <p class="color_red_davy"><?= $erreur ?><?= $notification ?></p>
            </div>
            <div class="container mb-3">
                <form action="stripe.php" method="post" id="payment-form">
                    <div id="card-element" class="input_davy"></div><br>
                    <div id="card-errors" role="alert"></div><br><br>
                    <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer block_center_davy" data-text="Payer" title="Payer">
                        <span>V</span>
                        <span>a</span>
                        <span>l</span>
                        <span>i</span>
                        <span>d</span>
                        <span>e</span>
                        <span>r</span>
                        <input type="submit" id="payer" name="payer" value="Payer" class="bouton_submit">
                    </a><br>
                </form>
            </div>

            <!-- script -->
            <script>
                var stripe = Stripe('pk_test_51ItdYEFCtQw6ANyJw0aPhgxhCc31bbS75zXCsOXFdiSBr0aSXZx0SZcs0g8mHVbTXm97ohllTxakkz8xUtU2dfzH00bHE1sl7d');
                var elements = stripe.elements();
                var style = {
                    base: {
                        fontSize: '16px',
                        color: '#2c2739',
                    }
                }

                var card = elements.create('card', {style: style});
                card.mount('#card-element');
                card.addEventListener('change', function (event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    }
                    else {
                        displayError.textContent = '';
                    }
                });

                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    stripe.createToken(card).then(function (result) {
                        var errorElement = document.getElementById('card-errors');
                        if (result.error) {
                            errorElement.textContent = result.error.message;
                        }
                        else {
                            stripeTokenHandler(result.token);
                        }
                    });
                });

                function stripeTokenHandler(token) {
                    var form = document.getElementById('payment-form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            </script>
        </div>
<?php
require_once("include/footer.php");
?>