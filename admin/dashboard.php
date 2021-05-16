<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Date de visite Accueil
$pdo_statement = $pdo_object->prepare("SELECT * FROM dashboard WHERE nom_visit_page = :nom_visit_page");
$pdo_statement->bindValue(":nom_visit_page", "Accueil", PDO::PARAM_STR);
$pdo_statement->execute();
// Nombre de visite Accueil
$pdo_statement_2 = $pdo_object->prepare("SELECT * FROM dashboard WHERE nom_visit_page = :nom_visit_page");
$pdo_statement_2->bindValue(":nom_visit_page", "Accueil", PDO::PARAM_STR);
$pdo_statement_2->execute();
// Nombre max de visite Accueil
$pdo_statement_3 = $pdo_object->prepare("SELECT MAX(nb_visit_page) FROM dashboard WHERE nom_visit_page = :nom_visit_page");
$pdo_statement_3->bindValue(":nom_visit_page", "Accueil", PDO::PARAM_STR);
$pdo_statement_3->execute();
$dashboard_array_3 = $pdo_statement_3->fetch(PDO::FETCH_ASSOC);
// Nombre mail
$pdo_statement_mail = $pdo_object->prepare("SELECT * FROM email");
$pdo_statement_mail->execute();
// Nombre commande
$pdo_statement_commande = $pdo_object->prepare("SELECT * FROM commande");
$pdo_statement_commande->execute();
// Nombre visite
$pdo_statement_visite = $pdo_object->prepare("SELECT * FROM dashboard WHERE nom_visit_page = :nom_visit_page");
$pdo_statement_visite->bindValue(":nom_visit_page", "Accueil", PDO::PARAM_STR);
$pdo_statement_visite->execute();
$nb_visite = 0;
while ($visite_array = $pdo_statement_visite->fetch(PDO::FETCH_ASSOC)) {
    $nb_visite = $nb_visite + $visite_array['nb_visit_page'];
}
// Nombre connexion
$pdo_statement_connexion = $pdo_object->prepare("SELECT * FROM membre");
$pdo_statement_connexion->execute();
$nb_connexion = 0;
while ($connexion_array = $pdo_statement_connexion->fetch(PDO::FETCH_ASSOC)) {
    $nb_connexion = $nb_connexion + $connexion_array['limit_connexion'];
}
// Nombre membre
$pdo_statement_membre = $pdo_object->prepare("SELECT * FROM membre");
$pdo_statement_membre->execute();
// Pages nom
$pdo_statement_4 = $pdo_object->prepare("SELECT DISTINCT nom_visit_page FROM dashboard");
$pdo_statement_4->execute();
// Pages nombre
$pdo_statement_5 = $pdo_object->prepare("SELECT DISTINCT nom_visit_page FROM dashboard");
$pdo_statement_5->execute();

require_once("../include/header-admin.php");
?>

                <div class="row">
                    <!-- Mail -->
                    <div class="col-md">
                        <div class="block_admin_davy my-3">
                            <h2 class="h2_moyen_davy">Mail</h2>
                            <hr>
                            <p><strong><?= $pdo_statement_mail->rowCount() ?> message(s)</strong></p>
                        </div>
                    </div>
                    <!-- Commande -->
                    <div class="col-md">
                        <div class="block_admin_davy my-3">
                            <h2 class="h2_moyen_davy">Commande</h2>
                            <hr>
                            <p><strong><?= $pdo_statement_commande->rowCount() ?> commande(s)</strong></p>
                        </div>
                    </div>
                    <!-- Visite -->
                    <div class="col-md">
                        <div class="block_admin_davy my-3">
                            <h2 class="h2_moyen_davy">Visite</h2>
                            <hr>
                            <p><strong><?= $nb_visite ?> vue(s) : Accueil</strong></p>
                        </div>
                    </div>
                </div>

                <!-- Statistique -->
                <div class="block_admin_davy my-3">
                    <h2 class="h2_moyen_davy">Statistique</h2>
                    <hr>
                    <p><strong>Nombre de visite sur la page d'accueil</strong></p>
                    <canvas id="graph_davy"></canvas>
                </div>

                <div class="row">
                    <!-- Sécurité -->
                    <div class="col-md">
                        <div class="block_admin_davy my-3">
                            <h2 class="h2_moyen_davy">Sécurité</h2>
                            <hr>
                            <p><strong><?= $nb_connexion ?> échec(s) de connexion pour aujourd'hui</strong></p>
                        </div>
                    </div>
                    <!-- Utilisateur -->
                    <div class="col-md">
                        <div class="block_admin_davy my-3">
                            <h2 class="h2_moyen_davy">Utilisateur</h2>
                            <hr>
                            <p><strong><?= $pdo_statement_membre->rowCount() ?> personne(s)</strong></p>
                        </div>
                    </div>
                </div>

                <!-- Statistique Pages -->
                <div class="block_admin_davy my-3">
                    <h2 class="h2_moyen_davy">Pages</h2>
                    <hr>
                    <p><strong>Nombre de visite</strong></p>
                    <canvas id="graph_visite_davy"></canvas>
                </div>
                
                <!-- script -->
                <script src="<?= URL ?>/include/js/script_nav_lien.js"></script>
                <script>nav_lien_active("lien_dashboard");</script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                
                <script>
                    // Statistique
                    var xValues = [
                        <?php if ($pdo_statement->rowCount() > 0) : ?>
                        <?php while ($dashboard_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                        "<?= $dashboard_array['date_visit_page'] ?>",
                        <?php endwhile; ?>
                        <?php else : ?>
                        <?= "0" ?>
                        <?php endif; ?>
                    ];
                    var yValues = [
                        <?php if ($pdo_statement_2->rowCount() > 0) : ?>
                        <?php while ($dashboard_array_2 = $pdo_statement_2->fetch(PDO::FETCH_ASSOC)) : ?>
                        <?= $dashboard_array_2['nb_visit_page'] ?>,
                        <?php endwhile; ?>
                        <?php else : ?>
                        <?= "0" ?>
                        <?php endif; ?>
                    ];
                    new Chart("graph_davy", {
                        type: "line",
                        data: {labels: xValues, datasets: [{fill: false, lineTension: 0, backgroundColor: "rgba(224, 10, 24, 1.0)", borderColor: "rgba(224, 10, 24, 0.1)", data: yValues}]},
                        options: {legend: {display: false}, scales: {yAxes: [{ticks: {min: 0, max: <?= $dashboard_array_3['MAX(nb_visit_page)'] + 10 ?>}}]}}
                    });

                    // Statistique Pages
                    var xValues2 = [
                        <?php if ($pdo_statement_4->rowCount() > 0) : ?>
                        <?php while ($dashboard_array_4 = $pdo_statement_4->fetch(PDO::FETCH_ASSOC)) : ?>
                        "<?= $dashboard_array_4['nom_visit_page'] ?>", 
                        <?php endwhile; ?>
                        <?php else : ?>
                        <?= "0" ?>
                        <?php endif; ?>
                    ];
                    var yValues2 = [
                        <?php
                        if ($pdo_statement_5->rowCount() > 0) {
                            while ($dashboard_array_5 = $pdo_statement_5->fetch(PDO::FETCH_ASSOC)) {
                                $pdo_statement_pages = $pdo_object->prepare("SELECT * FROM dashboard WHERE nom_visit_page = :nom_visit_page");
                                $pdo_statement_pages->bindValue(":nom_visit_page", $dashboard_array_5['nom_visit_page'], PDO::PARAM_STR);
                                $pdo_statement_pages->execute();
                                $nb_visite_pages = 0;
                                while ($visite_pages_array = $pdo_statement_pages->fetch(PDO::FETCH_ASSOC)) {
                                    $nb_visite_pages = $nb_visite_pages + $visite_pages_array['nb_visit_page'];
                                }
                                echo $nb_visite_pages;
                                echo ", ";
                            }
                        }
                        else {
                            echo "0";
                        }
                        ?>
                    ];

                    new Chart("graph_visite_davy", {
                        type: "bar",
                        data: {labels: xValues2, datasets: [{backgroundColor: "rgba(224, 10, 24, 1.0)", data: yValues2}]},
                        options: {legend: {display: false}}
                    });
                </script>
<?php
require_once("../include/footer-admin.php");
?>