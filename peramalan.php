<?php 

require 'functions.php';
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$query = "SELECT * FROM sales_data ORDER BY tanggal_penjualan ASC LIMIT 12";
    $result = mysqli_query($conn, $query);

    $rows = [];

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row["qty"];
    }

    $alpha = 0.3;

    $forecast = [];
    $forecast[0] = $rows[0];

    for ($i = 1; $i < count($rows); $i++) {
        $forecast[$i] = $alpha * $rows[$i - 1] + (1 - $alpha) * $forecast[$i - 1];
    }

    
    $last_index = count($rows) - 1;

    $next_forecast = $alpha * $rows[$last_index] + (1 - $alpha) * $forecast[$last_index];

    // mape
    $total_error = 0;
    $n = count($rows);

    for ($i = 1; $i < $n; $i++) {
        $error = abs($rows[$i] - $forecast[$i] / $rows[$i]);
        $total_error =+ $error;
    }

    $mape = $total_error / ($n -1) * 100;
    
    // simpan ke dalam databasse

    for ($i = 0; $i < count($rows); $i++) {
        $f = $forecast[$i];
        $aktual = $rows[$i];
        $periode = $i + 1;
        $a = 0.3;
        $query = "INSERT INTO peramalan (periode, aktual, forecast, alpha, mape, date)
        VALUES ('$periode', '$aktual', '$f', '$a', '$mape', NOW())";
        mysqli_query($conn, $query);

        if (!$query) {
        die("Error: " . mysqli_error($conn));
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peramalan</title>
</head>
<body>
    <h2>Peramalan Single Exponential Smoothing</h2>
    <table border="2">
        <tr>
            <th>Periode</th>
            <th>Aktual</th>
            <th>Forecast</th>
        </tr>
        <?php for($i = 0; $i < count($rows); $i++) : ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $rows[$i]; ?></td>
            <td><?php echo round($forecast[$i], 3); ?></td>
        </tr>
        <?php endfor; ?>
    </table>
    <p>Hasil Peramalan pada Periode ke-13 = <?php echo round($next_forecast, 2); ?></p>
    <p>Hasil Evaluasi Peramalan (MAPE) = <?= round($mape, 3); ?></p>
    <p>Interpretasi Nilai MAMPE = 
        <?php // penilaian mape
    if ($mape <= 10) {
        echo "Sangat Baik";
    } elseif ($mape <= 20) {
        echo "Baik";
    } elseif ($mape <= 50) {
        echo "Cukup";
    } else {
        echo "Buruk";
    } ?>
    </p>
    

</body>
</html>