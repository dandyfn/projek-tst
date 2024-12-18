<?php
// Mendapatkan ID pesanan dari parameter URL
$order_id = $_GET['order_id'];

// Memastikan ID pesanan valid
if (!isset($order_id) || empty($order_id)) {
    echo "Pesanan tidak ditemukan.";
    exit();
}

// Koneksi ke layanan untuk mengklaim cashback
$client = new SoapClient('http://localhost/wsclub/wsclub/cek/cashback_service.wsdl');

try {
    // Mengklaim cashback untuk pesanan terlambat
    $response = $client->ClaimCashback($order_id);
    
    if ($response->status == 'success') {
        echo "Cashback Anda telah berhasil diklaim!";
    } else {
        echo "Terjadi kesalahan saat mengklaim cashback: " . $response->message;
    }
} catch (SoapFault $e) {
    echo "Error: {$e->getMessage()}";
}
?>
