<?php
require_once("include/init.php");
require_once("include/fonctions.php");
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

            <!-- stripe -->
            <form action="stripe.php" method="post" id="payment-form">
                <label class="card-element">Credit or debit card</label>
                <div id="card-element"></div>
                <div id="card-errors" role="alert"></div>
                <a aria-label="Valider" class="bouton_anim_davy bouton_envoyer" data-text="Payer" title="Payer">
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