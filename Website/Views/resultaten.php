<?php
require_once "../Models/FietsPlaatsData.php";
require_once "../Controllers/ResultatenController.php";
include_once "header.php";

$db = new FietsPlaatsData();
$fietsPerdagBij = json_decode(json_encode($db->fetchBezetPerDag()), true);
$fietsPerdagAf = json_decode(json_encode($db->fetchNietBezetPerDag()), true);

$resultatenController = new ResultatenController();
if (isset($_POST['creator'])) {
    $resultatenController->maakCsvReady();
}

if (isset($_POST['deletor'])) {
    $resultatenController->verwijderCsv();
}
?>
    <script src="js/resultaten.js"></script>
    <div class="container-fluid">
        <div class="row mt-5 col-md-12">
            <div class="container col-sm-12 col-md-12 col-lg-10 text-light">
                <div class="row">
                    <button type="button" class="btn btn-primary col-sm" id="createCSV">Maak het csv bestand aan
                    </button>
                    <a href="/PAD/Website/downloads/fietsstalling.csv" class="col-sm">
                        <button type="button" class="btn btn-info col-sm">Download het csv bestand</button>
                    </a>
                    <button type="button" class="btn btn-danger col-sm" id="deleteCSV">Verwijder het csv bestand
                    </button>
                </div>

                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var ctxL = document.getElementById("myChart").getContext('2d');
            var myLineChart;


            myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: [<?php echo('"' . implode('", "', array_column($fietsPerdagBij, 'label')) . '"'); ?>],
                    datasets: [{
                        label: "Hoeveel fietsen er bij komen per dag",
                        data: [<?php echo(implode(', ', array_column($fietsPerdagBij, 'data'))); ?>],
                        backgroundColor: [
                            'rgba(105, 0, 132, .2)',
                        ],
                        borderColor: [
                            'rgba(200, 99, 132, .7)',
                        ],
                        borderWidth: 2
                    }, {
                        label: "Hoeveel fietsen er weggaan per dag",
                        data: [<?php echo(implode(', ', array_column($fietsPerdagAf, 'data'))); ?>],
                        backgroundColor: [
                            'rgba(200, 100, 100, .2)',
                        ],
                        borderColor: [
                            'rgba(200, 99, 132, .7)',
                        ],
                        borderWidth: 2
                    }
                    ]
                },
                options: {
                    responsive: true
                }
            });
        });

    </script>
<?php include "footer.php"; ?>