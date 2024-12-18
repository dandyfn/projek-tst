⁠ php
<?php
require('Cashback.php');

$server = new SoapServer(null, ['uri' => "http://localhost/cashback"]);
$server->setClass('Cashback');
$server->handle();
?>
