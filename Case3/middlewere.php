⁠ php
<?php
header('Content-Type: application/json');

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod === 'POST') {
    $requestBody = json_decode(file_get_contents('php://input'), true);
    $orderId = $requestBody['order_id'] ?? null;

    if (!$orderId) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid order ID']);
        exit;
    }

    // Menghubungkan ke layanan SOAP
    $client = new SoapClient('http://localhost/soap-service?wsdl');
    try {
        $response = $client->checkDeliveryStatus(['order_id' => $orderId]);
        if ($response->status === 'Late') {
            $cashback = $client->calculateCashback(['order_id' => $orderId]);
            echo json_encode([
                'status' => 'success',
                'message' => 'Cashback granted!',
                'cashback_amount' => $cashback->amount
            ]);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Delivery on time, no cashback.']);
        }
    } catch (SoapFault $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method Not Allowed']);
}
?>
