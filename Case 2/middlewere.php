<?php
header('Content-Type: application/json');

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod === 'POST') {
    $requestBody = json_decode(file_get_contents('php://input'), true);
    $userId = $requestBody['user_id'];
    $restaurantId = $requestBody['restaurant_id'];

    // Kirim data ke API backend
    $apiUrl = 'http://localhost/api/check-promo';
    $apiResponse = callApi($apiUrl, $requestBody);

    echo $apiResponse;
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method Not Allowed']);
}

// Fungsi untuk menghubungkan ke API backend
function callApi($url, $data) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
?>
