⁠ php
<?php
$client = new SoapClient(null, [
    'location' => "http://localhost/cashback/server.php",
    'uri' => "http://localhost/cashback",
    'trace' => 1
]);

try {
    $response = $client->checkLateOrder('001'); // Contoh Order ID
    print_r($response);
} catch (SoapFault $e) {
    echo "Error: {$e->getMessage()}";
}
?>
