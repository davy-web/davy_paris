        <footer>
            <div class="background_beige_davy px-5 py-3"><p class="text_center_davy"><strong>Copyright© 2021 Dating Paris. <a href="<?= URL ?>/mentions" title="<?= URL ?>/mentions">Mentions légales.</a></strong></p></div>
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
                    Nous utilisons des cookies. Voir les paramètres.
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
        <script src="<?= URL ?>/include/js/script_scroll.js"></script>
        <script src="<?= URL ?>/include/js/script_scroll_relative_content.js"></script>
    </body>
</html>