<?php
require 'fungsi.php';

// Mengambil data mahasiswa dari database
$inputdata = query("SELECT * FROM tabel1");

// Mengonversi data ke format JSON
$json_data = json_encode($inputdata);

// Menyimpan data JSON ke file
file_put_contents('data_mahasiswa.json', $json_data);

// Mengatur header untuk output JSON
header('Content-Type: application/json');
echo $json_data;
?>