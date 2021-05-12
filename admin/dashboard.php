<?php 
require_once("../include/init.php");
require_once("../include/fonctions.php");

// Vérifie Admin
admin_connecte();

// Nombre de visite
$pdo_statement = $pdo_object->prepare("SELECT nb_visit_page FROM dashboard");
$pdo_statement->execute();
$total_date = $pdo_statement->rowCount();

require_once("../include/header-admin.php");
?>

                <div class="block_admin_davy">
                    <h1 class="h1_moyen_davy">Admin</h1>
                    <hr>
                    <!-- Nombre de visite -->
                    <p><strong>Nombre de visite</strong></p>
                    <canvas id="graph_davy"></canvas>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                    <script>
                    var xValues = [
                        <?php if ($pdo_statement->rowCount() > 0) : ?>
                        <?php while ($dashboard_array = $pdo_statement->fetch(PDO::FETCH_ASSOC)) : ?>
                        <?= $dashboard_array['nb_visit_page'] ?>,
                        <?php endwhile; ?>
                        <?php else : ?>
                        <?= "0" ?>
                        <?php endif; ?>
                    ];
                    var yValues = [
                        <?php if ($pdo_statement->rowCount() > 0) : ?>
                        <?php for ($i = 0; $i < $total_date; $i++) {echo $i . ",";} ?>
                        <?php else : ?>
                        <?= "0" ?>
                        <?php endif; ?>
                    ];
                    new Chart("graph_davy", {
                        type: "line",
                        data: {labels: xValues, datasets: [{fill: false, lineTension: 0, backgroundColor: "rgba(0,0,255,1.0)", borderColor: "rgba(0,0,255,0.1)", data: yValues}]},
                        options: {legend: {display: false}, scales: {yAxes: [{ticks: {min: 0, max: 30}}]}}
                    });
                    </script>
                </div>
<?php
require_once("../include/footer-admin.php");
?>