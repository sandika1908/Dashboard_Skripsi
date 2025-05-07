<?php

    include 'connect.php';

    $sql_ID = mysqli_query($conn, "SELECT MAX(ID) FROM daily_monitoring");
    $data_ID = mysqli_fetch_array($sql_ID);
    $ID_akhir = $data_ID['MAX(ID)'];
    $ID_awal = $ID_akhir - 5 ;

    $created_daily = mysqli_query($conn, "SELECT created_daily FROM daily_monitoring WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY id ASC");
    $power = mysqli_query($conn, "SELECT power FROM daily_monitoring WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY id ASC");

?>

<div class="panel panel-primary">
    <!-- <div class="panel-heading">
        Gafik power
    </div> -->

    <div class="panel-body">
        <canvas id="myChart_power"></canvas>

        <script type="text/javascript">
            var canvas = document.getElementById('myChart_power').getContext('2d');
            var data = {
                labels: [
                    <?php
                        while($data_created_daily = mysqli_fetch_array($created_daily))
                        {
                            echo '"'.$data_created_daily['created_daily'].'",' ;
                        }
                    ?>
                ],
                datasets: [{
                    label: "power",
                    fill: true,
                    backgroundColor: "rgba(245, 23, 2, 0.5)",
                    borderColor: "rgba(245, 23, 2, 1)",
                    lineTension: 0.5,
                    pointRadius: 5, 
                    data: [
                        <?php
                        while($data_power = mysqli_fetch_array($power))
                        {
                            echo $data_power['power'].',' ;
                        }
                    ?>
                    ]
                }]
            };

            var options = {
                responsive: true,
                animation: {
                    duration: 4000, // Animasi berlangsung 2 detik
                    easing: 'easeInOutQuart' // Efek animasi yang halus
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            var myLineChart = new Chart(canvas, {
                type: 'line',
                data: data,
                options: options
            });

        </script>
    </div>
</div>