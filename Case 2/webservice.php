<?php
header('Content-Type: application/json');
// Dummy data transaksi untuk demo
$transactions = [
    ["user_id" => 12345, "restaurant_id" => 67890],
    ["user_id" => 12345, "restaurant_id" => 67890],
    ["user_id" => 12345, "restaurant_id" => 67890]
];

// Membaca input dari request
$requestBody = file_get_contents("php://input");
$request = json_decode($requestBody, true);

$user_id = $request["user_id"] ?? null;
$restaurant_id = $request["restaurant_id"] ?? null;

$response = [];

if ($user_id && $restaurant_id) {
    // Hitung jumlah transaksi untuk user_id dan restaurant_id tertentu
    $transactionCount = 0;
    foreach ($transactions as $transaction) {
        if ($transaction["user_id"] == $user_id && $transaction["restaurant_id"] == $restaurant_id) {
            $transactionCount++;
        }
    }

    // Jika transaksi >= 3, promo tersedia
    if ($transactionCount >= 3) {
        $response = [
            "status" => "success",
            "message" => "Promo gratis tersedia!",
            "data" => [
                "promo_id" => 101,
                "discount" => 100
            ]
        ];
    } else {
        $response = [
            "status" => "error",
            "message" => "Promo tidak tersedia."
        ];
    }
} else {
    $response = [
        "status" => "error",
        "message" => "Invalid parameters."
    ];
}

// Return JSON response
echo json_encode($response);
?>
