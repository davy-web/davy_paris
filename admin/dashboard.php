<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Date de visite
$pdo_statement = $pdo_object->prepare("SELECT * FROM dashboard WHERE nom_visit_page = :nom_visit_page");
$pdo_statement->bindValue(":nom_visit_page", "Accueil", PDO::PARAM_STR);
$pdo_statement->execute();
// Nombre de visite
$pdo_statement_2 = $pdo_object->prepare("SELECT * FROM dashboard WHERE nom_visit_page = :nom_visit_page");
$pdo_statement_2->bindValue(":nom_visit_page", "Accueil", PDO::PARAM_STR);
$pdo_statement_2->execute();
// Nombre max de visite
$pdo_statement_3 = $pdo_object->prepare("SELECT MAX(nb_visit_page) FROM dashboard WHERE nom_visit_page = :nom_visit_page");
$pdo_statement_3->bindValue(":nom_visit_page", "Accueil", PDO::PARAM_STR);
$pdo_statement_3->execute();
$dashboard_array_3 = $pdo_statement_3->fetch(PDO::FETCH_ASSOC);

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Admin</h1>
                    <hr>
                    <!-- Nombre de visite sur la page d'accueil -->
                    <p><strong>Nombre de visite sur la page d'accueil</strong></p>
                    <canvas id="graph_davy"></canvas>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                    <script>
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
                    </script>
                </div>
<?php
require_once("../include/footer-admin.php");
?>