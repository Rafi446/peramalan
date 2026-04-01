<?php

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$data = query("SELECT * FROM daftarhp");

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();


$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
</head>
<body>
    <h2>Daftar HP Xiaomi</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Gambar</th>
        </tr>';
       
        $i = 1;
        foreach ($data as $row) {
            $html .=
            '<tr>
                <td>' . $i . '</td>
                <td>' . $row["nama"] . '</td>
                <td>' . $row["harga"] . '</td>
                <td> <img src="img/' . $row["gambar"] . '" width="50">   </td>
            </tr>';
            $i++;
        }

    $html .='</table>
</body>
</html>';

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('daftarhp.pdf', \Mpdf\Output\Destination::INLINE);

?>