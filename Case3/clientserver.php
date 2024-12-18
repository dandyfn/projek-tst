php
<?php
// Menghubungkan ke layanan SOAP menggunakan WSDL
$client = new SoapClient('http://localhost/wsclub/wsclub/cek/cashback_service.wsdl');

try {
    // Data pengguna dan pesanan
    $order_id = 'ORD12345'; // ID Pesanan
    $user_id = 'USER67890'; // ID Pengguna

    // Permintaan untuk mengecek status cashback
    $response = $client->CheckCashbackStatus(['order_id' => $order_id, 'user_id' => $user_id]);

    // Memproses hasil respon
    if ($response->status == 'success' && $response->cashback_applied) {
        echo "Cashback sebesar Rp " . $response->cashback_amount . " telah ditambahkan ke akun Anda!";
    } elseif ($response->status == 'success') {
        echo "Tidak ada cashback yang diberikan untuk pesanan ini.";
    } else {
        echo "Terjadi kesalahan: " . $response->message;
    }
} catch (SoapFault $e) {
    // Menangani error SOAP
    echo "SOAP Error: {$e->getMessage()}";
}
?>
