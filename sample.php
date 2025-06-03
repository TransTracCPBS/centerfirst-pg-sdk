<?php
require_once 'vendor/autoload.php';
require_once 'src/Config.php';
require_once 'src/CredoPayPaymentGateway.php';
require_once 'src/resources/OrderAPI.php';

use CredoPay\CredoPayPaymentGateway;
use CredoPay\Resources\OrderAPI;

try {

    // Initialize the payment gateway with your client credentials
    $clientId = '67a34eb6df8f95fd82f0fcd7'; // Replace with your actual client ID
    $clientSecret = 'rJ22xzItJd0d908MeGPBaFJ7i'; // Replace with your actual client secret

    $gateway = new CredoPayPaymentGateway($clientId, $clientSecret);

    // Initialize the payment gateway
    $orderAPI = new OrderAPI($gateway);

    // Create an order
    $orderData = [
        'receiptId' => 'RE_DVGSD24535SFGER01',
        'amount' => 1,
        'currency' => 'INR',
        'description' => 'Test Payment',
        'customerFields' => [
            'name' => 'Madhan R',
            'email' => 'madhan.k@credopay.in',
            'phone' => '1234567890'
        ],
        'uiMode' => 'checkout',
    ];
    $orderResponse = $orderAPI->createOrder($orderData); // Use createOrder() here
    echo "Order Response: " . $orderResponse . "<br>";

    // Check order status
    $orderId = json_decode($orderResponse, true)['orderId'] ?? null; // Assuming `orderId` is in the response
    if (!$orderId) {
        throw new Exception('Order ID not found in the response.');
    }
    echo "ORDER ID: " . $orderId . "<br>";

    $statusResponse = $orderAPI->checkStatus($orderId); // Use checkStatus() here
    echo "Order Status: " . $statusResponse . "<br>";

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . "<br>";
}
?>
