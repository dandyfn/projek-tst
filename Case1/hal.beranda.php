<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Kereta</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #87CEEB; 
        }

        .header {
            font-size: 28px; 
            color: white; 
            margin: 20px 0; 
            text-align: center;
            padding: 20px; 
            background-color: rgba(0, 51, 102, 0.8); 
            width: 100%; 
        }

        .ticket {
            width: 90%; 
            max-width: 400px; 
            height: auto; 
            border: 2px solid #000;
            padding: 20px;
            box-sizing: border-box;
            margin: 20px 0;
            text-align: center;
            background: linear-gradient(to right, #003366, #660066); 
            border-radius: 15px; 
        }

        .ticket h2 {
            margin-top: 0;
            color: white; 
        }

        .ticket-info p {
            margin: 5px 0;
            color: white; 
        }

        .additional-order {
            margin-top: 10px;
            display: flex;
            flex-direction: column; 
            align-items: center; 
            width: 100%; 
        }

        .additional-order a {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 15px;
            font-size: 20px;
            color: white;
            background-color: green; /* Green background for "Pesanan Tambahan" */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
            width: 80%;
            max-width: 300px;
            display: inline-block;
            text-align: center;
        }

        .additional-order a:hover {
            background-color: #4CAF50; /* Lighter green on hover */
        }

        .additional-order .pesan-tiket-button {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 15px;
            font-size: 20px;
            color: white;
            background-color: #333; /* Black background for "Pesan Tiket Baru" */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
            width: 80%;
            max-width: 300px;
            display: inline-block;
            text-align: center;
        }

        .additional-order .pesan-tiket-button:hover {
            background-color: #555; /* Darker shade of black on hover */
        }

        @media (max-width: 600px) {
            .header {
                font-size: 24px; 
            }

            .ticket {
                width: 95%; 
            }

            .additional-order a, .additional-order button {
                font-size: 18px; 
            }
        }
    </style>
</head>
<body>
    <?php
    $nama = $_POST['nama'] ?? 'Tidak ada data';
    $kota_keberangkatan = $_POST['kota_keberangkatan'] ?? 'Tidak ada data';
    $kota_tujuan = $_POST['kota_tujuan'] ?? 'Tidak ada data';
    $ticketId = '42434';
    ?>
    <div class="header">
        Aplikasi Tiket Kereta 
    </div>
    <div class="ticket">
        <h2>Tiket Kereta</h2>
        <div class="ticket-info">
            <p>Nama Penumpang: <?php echo htmlspecialchars($nama); ?></p>
            <p>Kota Keberangkatan: <?php echo htmlspecialchars($kota_keberangkatan); ?> </p>
            <p>Kota Tujuan: <?php echo htmlspecialchars($kota_tujuan); ?> </p>
            <p>No ID Tiket: <?php echo htmlspecialchars($ticketId); ?></p>
        </div>
    </div>
    <div class="additional-order">
        <a href="pesantiket.php" class="pesan-tiket-button">Pesan Tiket Baru</a>
        <?php
        $data = http_build_query([
            'nama' => $nama,
            'kota_keberangkatan' => $kota_keberangkatan,
            'kota_tujuan' => $kota_tujuan
        ]);
        echo "<a href='hal.daftarrestaurant.php?$data' style='weight:10px;'>Pesanan Tambahan</a>";
        ?>
    </div>
</body>
</html>
