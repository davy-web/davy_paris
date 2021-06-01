<?php 
require_once("include/init.php");
require_once("include/fonctions.php");
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
                    <h2>Entreprise</h2>
                    <hr class="float_right_davy anime_scroll_davy">
                </div>
            </div>

            <!-- A propos -->
            <div class="container mt-5">
                <div class="row flex_flow_davy">
                    <div class="col-md mb-3">
                        <h1 class="h2_moyen_davy">Solutions <span class="color_red_davy serif_davy">pour entreprises</span></h1>
                        <hr class="anime_scroll_davy">
                        <p>Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac Constantinus iunxerat pater, Megaera quaedam mortalis, inflammatrix saevientis adsidua, humani cruoris avida nihil mitius quam maritus; qui paulatim eruditiores facti processu temporis ad nocendum per clandestinos versutosque rumigerulos conpertis leviter addere quaedam male suetos falsa et placentia sibi discentes, adfectati regni vel artium nefandarum calumnias insontibus adfligebant.</p><br>
                    </div>
                    <div class="col-md mb-3">
                        <div class="cadre_image_page_davy">
                            <img src="<?= URL ?>/images/photo-a-propos-min.jpg" class="image_page_davy" alt="entreprise">
                            <img src="<?= URL ?>/images/trait-rouge.png" class="trait_rouge" alt="Cadre">
                            <img src="<?= URL ?>/images/trait-2-rouge.png" class="trait_2_rouge" alt="Cadre">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations complémentaires -->
            <div class="container mt-5 mb-3">
                <h2 class="h2_moyen_davy">Les avantages <span class="color_red_davy serif_davy">de Dating Paris</span></h2>
                <hr class="anime_scroll_davy">
            </div>
            <div class="container mb-3">
                <div class="row">
                    <p>Hac ex causa conlaticia stipe Valerius humatur ille Publicola et subsidiis amicorum mariti inops cum liberis uxor alitur Reguli et dotatur ex aerario filia Scipionis, cum nobilitas florem adultae virginis diuturnum absentia pauperis erubesceret patris.</p>
                    <p>Cumque pertinacius ut legum gnarus accusatorem flagitaret atque sollemnia, doctus id Caesar libertatemque superbiam ratus tamquam obtrectatorem audacem excarnificari praecepit, qui ita evisceratus ut cruciatibus membra deessent, inplorans caelo iustitiam, torvum renidens fundato pectore mansit inmobilis nec se incusare nec quemquam alium passus et tandem nec confessus nec confutatus cum abiecto consorte poenali est morte multatus. et ducebatur intrepidus temporum iniquitati insultans, imitatus Zenonem illum veterem Stoicum qui ut mentiretur quaedam laceratus diutius, avulsam sedibus linguam suam cum cruento sputamine in oculos interrogantis Cyprii regis inpegit.</p>
                    <p>Alii nullo quaerente vultus severitate adsimulata patrimonia sua in inmensum extollunt, cultorum ut puta feracium multiplicantes annuos fructus, quae a primo ad ultimum solem se abunde iactitant possidere, ignorantes profecto maiores suos, per quos ita magnitudo Romana porrigitur, non divitiis eluxisse sed per bella saevissima, nec opibus nec victu nec indumentorum vilitate gregariis militibus discrepantes opposita cuncta superasse virtute.</p>
                </div>
            </div>
        </div>
        <?php nb_visit_page($pdo_object, "Entreprise"); ?>
<?php
require_once("include/footer.php");
?>