<?php
header('Content-Type: application/json');
include('koneksi.php'); // File koneksi database

// Membaca input dari request
$requestBody = file_get_contents("php://input");
$request = json_decode($requestBody, true);

$user_id = $request["user_id"] ?? null;
$restaurant_id = $request["restaurant_id"] ?? null;

if (!$user_id || !$restaurant_id) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid parameters."
    ]);
    exit;
}

// Query untuk menghitung jumlah transaksi
$query = "SELECT COUNT(*) AS transaction_count 
          FROM transactions 
          WHERE user_id = ? AND restaurant_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $user_id, $restaurant_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($data['transaction_count'] >= 3) {
    echo json_encode([
        "status" => "success",
        "message" => "Promo gratis tersedia!",
        "data" => [
            "promo_id" => 101,
            "discount" => 100
        ]
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Promo tidak tersedia."
    ]);
}

$stmt->close();
$conn->close();
?>
