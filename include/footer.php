<?php
require_once("include/init.php");

// Gestion produit
$pdo_statement = $pdo_object->prepare("SELECT * FROM produit");
$pdo_statement->execute();
?>
        <footer>
            <div class="container-fluid background_beige_davy">
                <div class="container pt-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 px-5 py-3">
                            <a href="<?= URL ?>" title="<?= URL ?>">
                                <img src="<?= URL ?>/images/logo-dating-paris-min.png" alt="Logo Dating Paris" width="100%">
                            </a><br>
                        </div>
                        <div class="col-lg-3 col-md-4 px-5 py-3">
                            <strong>BESOIN D'AIDE</strong><br><br>
                            <a href="<?= URL ?>/a-propos" title="<?= URL ?>/a-propos">Fonctionnement</a><br>
                            <a href="<?= URL ?>/contact" title="<?= URL ?>/contact">Nous contacter</a><br>
                            <a href="<?= URL ?>/mentions" title="<?= URL ?>/mentions">Informations légales</a><br>
                            <a href="<?= URL ?>/connexion" title="<?= URL ?>/connexion">Connexion</a><br>
                            <a href="<?= URL ?>/inscription" title="<?= URL ?>/inscription">Inscription</a><br>
                        </div>
                        <div class="col-lg-3 col-md-4 px-5 py-3">
                            <strong>NOS COFFRETS</strong><br><br>
                            <?php if ($pdo_statement->rowCount() > 0) : ?>
                            <?php while ($produit_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                            <a href="<?= URL ?>/box=<?= $produit_array['id_produit'] ?>" title="<?= URL ?>/box=<?= $produit_array['id_produit'] ?>"><?= $produit_array['titre'] ?></a><br>
                            <?php endwhile; ?>
                            <?php else : ?>
                            Aucun produit
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-3 col-md-4 px-5 py-3">
                            <strong>SUIVEZ-NOUS</strong><br><br>
                            <a href="https://www.instagram.com/datingparis/" title="https://www.instagram.com/datingparis/" class="flex_center_davy">
                                <svg class="icon_nav_davy" version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve"><path fill="currentColor" d="M297.9,250c0,26.4-21.4,47.9-47.9,47.9s-47.9-21.4-47.9-47.9s21.4-47.9,47.9-47.9S297.9,223.6,297.9,250z"/><path fill="currentColor" d="M361.9,165.3c-2.3-6.2-6-11.9-10.7-16.5c-4.6-4.8-10.3-8.4-16.5-10.7c-5.1-2-12.7-4.3-26.7-4.9c-15.1-0.7-19.7-0.8-58-0.8 c-38.3,0-42.9,0.1-58,0.8c-14,0.6-21.6,3-26.7,4.9c-6.2,2.3-11.9,6-16.5,10.7c-4.8,4.6-8.4,10.3-10.7,16.5 c-2,5.1-4.3,12.7-4.9,26.7c-0.7,15.1-0.8,19.7-0.8,58c0,38.3,0.1,42.9,0.8,58c0.6,14,3,21.6,4.9,26.7c2.3,6.2,6,11.9,10.7,16.5 c4.6,4.8,10.3,8.4,16.5,10.7c5.1,2,12.7,4.3,26.7,4.9c15.1,0.7,19.7,0.8,58,0.8c38.3,0,42.9-0.1,58-0.8c14-0.6,21.6-3,26.7-4.9 c12.5-4.8,22.4-14.7,27.2-27.2c2-5.1,4.3-12.7,4.9-26.7c0.7-15.1,0.8-19.7,0.8-58c0-38.3-0.1-42.9-0.8-58 C366.2,178,363.9,170.4,361.9,165.3z M250,323.7c-40.7,0-73.7-33-73.7-73.7s33-73.7,73.7-73.7c40.7,0,73.7,33,73.7,73.7 S290.7,323.7,250,323.7z M326.6,190.6c-9.5,0-17.2-7.7-17.2-17.2s7.7-17.2,17.2-17.2s17.2,7.7,17.2,17.2 C343.9,182.9,336.1,190.6,326.6,190.6z"/> <path fill="currentColor" d="M250,0C111.9,0,0,111.9,0,250s111.9,250,250,250s250-111.9,250-250S388.1,0,250,0z M392.7,309.2 c-0.7,15.3-3.1,25.7-6.7,34.8c-7.5,19.3-22.7,34.5-42,42c-9.1,3.5-19.6,6-34.8,6.7c-15.3,0.7-20.2,0.9-59.2,0.9 c-39,0-43.9-0.2-59.2-0.9c-15.3-0.7-25.7-3.1-34.8-6.7c-9.6-3.6-18.3-9.3-25.4-16.6c-7.3-7.2-13-15.8-16.6-25.4 c-3.5-9.1-6-19.6-6.7-34.8c-0.7-15.3-0.9-20.2-0.9-59.2s0.2-43.9,0.9-59.2c0.7-15.3,3.1-25.7,6.7-34.8c3.6-9.6,9.3-18.3,16.6-25.4 c7.2-7.3,15.8-13,25.4-16.6c9.1-3.5,19.6-6,34.8-6.7c15.3-0.7,20.2-0.9,59.2-0.9s43.9,0.2,59.2,0.9c15.3,0.7,25.7,3.1,34.8,6.7 c9.6,3.6,18.3,9.3,25.4,16.6c7.3,7.2,13,15.8,16.6,25.4c3.6,9.1,6,19.6,6.7,34.8c0.7,15.3,0.9,20.2,0.9,59.2 S393.4,293.9,392.7,309.2z"/></svg>
                                <span class="ps-2">Instagram</span>
                            </a><br>
                            <a href="https://www.facebook.com/Dating-Paris-103194175335045" title="https://www.facebook.com/Dating-Paris-103194175335045" class="flex_center_davy">
                                <svg class="icon_nav_davy" version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve"><path fill="currentColor" d="M500.2,249.9C500.2,111.9,388.3,0,250.2,0S0.3,111.9,0.3,249.9s111.9,249.9,249.9,249.9c1.5,0,2.9,0,4.4-0.1V305.3h-53.7 v-62.6h53.7v-46.1c0-53.4,32.6-82.5,80.2-82.5c22.8,0,42.5,1.7,48.1,2.4v55.8h-32.8c-25.9,0-30.9,12.3-30.9,30.4v39.8h62l-8.1,62.6 h-53.9v185C423.7,460.2,500.2,364,500.2,249.9z"/></svg>
                                <span class="ps-2">Facebook</span>
                            </a><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background_beige_davy px-5 py-3">
                <div class="container">
                    <p class="text_center_davy"><strong>Copyright© 2021 Dating Paris. <a href="<?= URL ?>/mentions" title="<?= URL ?>/mentions">Mentions légales.</a> <a href="<?= URL ?>/cgv" title="<?= URL ?>/cgv">Conditions générales de vente.</a></strong></p>
                </div>
            </div>
        </footer>
        
        <!-- cookie -->
        <?php
        if (isset($_POST['accepter_cookie'])) {
            $_SESSION['cookie'] = "accepter";
        }
        if (isset($_POST['rejeter_cookie'])) {
            $_SESSION['cookie'] = "rejeter";
        }
        if (!isset($_SESSION['cookie'])) :
        ?>
        <div class="block_cookie_davy text_center_davy">
            <form method="post">
                <p>
                    Nous utilisons des cookies.
                    <!-- bouton_anim_davy -->
                    <a aria-label="Valider" class="bouton_anim_davy bouton_cookie_davy bouton_envoyer" data-text="Accepter" title="Accepter">
                        <span>V</span>
                        <span>a</span>
                        <span>l</span>
                        <span>i</span>
                        <span>d</span>
                        <span>e</span>
                        <span>r</span>
                        <input type="submit" id="accepter_cookie" name="accepter_cookie" value="Accepter" class="bouton_submit">
                    </a>
                    <a aria-label="Retirer" class="bouton_anim_davy bouton_cookie_davy bouton_envoyer" data-text="Rejeter" title="Rejeter">
                        <span>R</span>
                        <span>e</span>
                        <span>t</span>
                        <span>i</span>
                        <span>r</span>
                        <span>e</span>
                        <span>r</span>
                        <input type="submit" id="rejeter_cookie" name="rejeter_cookie" value="Rejeter" class="bouton_submit">
                    </a>
                </p>
            </form>
        </div>
        <?php endif; ?>
        
        <script src="<?= URL ?>/include/js/script_nav.js"></script>
        <script src="<?= URL ?>/include/js/script_nav_mobile_burger.js"></script>
        <script src="<?= URL ?>/include/js/script_scroll.js"></script>
        <script src="<?= URL ?>/include/js/script_scroll_relative_content.js"></script>
        <script src="<?= URL ?>/include/js/script_ajax.js"></script>
    </body>
</html>