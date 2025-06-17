
# CredoPay Payment Gateway

CredoPay Payment Gateway is a PHP library that provides an easy-to-use interface for interacting with the CredoPay payment gateway API. This library allows you to create orders, check order statuses, and manage transactions securely and efficiently.

## Installation

You can install the package via Composer. Run the following command:

```bash

composer require credopay/paymentgateway

```
## Features

- **Order Management**: Create and manage orders through CredoPay.
- **Transaction Management**: Handle transactions with ease.
- **Secure Authentication**: Uses secure basic authentication for API requests.
- **System Information**: Attaches system and server information to each request for better tracking and security.

## Requirements 

    - PHP 8.2 or higher
    - Composer
    - cURL extension enabled
    - CredoPay API credentials (Client ID and Client Secret)

## Usage

## Initialization

```php
require 'vendor/autoload.php';

use CredoPay\CredoPayPaymentGateway;
use CredoPay\Resources\OrderAPI;

// Initialize the payment gateway
$clientId = 'your-client-id';
$clientSecret = 'your-client-secret';
$gateway = new CredoPayPaymentGateway($clientId, $clientSecret);

// Initialize the OrderAPI
$orderAPI = new OrderAPI($gateway);

```
## Creating an Order

```php

$orderData = [
    'receiptId' => 'RE_YOURRECEIPT123',
    'amount' => 500, // Amount in smallest currency unit
    'currency' => 'INR',
    'description' => 'Test Payment',
    'customerFields' => [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'phone' => '9876543210'
    ],
    'uiMode' => 'checkout'
];

try {
    $orderResponse = $orderAPI->createOrder($orderData);
    echo "Order Response: " . $orderResponse;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

```

## Checking Order Status

```php

try {
    $orderId = 'your-order-id'; // Replace with an actual order ID
    $statusResponse = $orderAPI->checkStatus($orderId);
    echo "Order Status: " . $statusResponse;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

```
## API Endpoints

    - Create Order: POST https://api.thecenterfirst.com/nac/api/v1/pg/orders/create-checkout

    - Check Order Status: GET https://api.thecenterfirst.com/nac/api/v1/pg/orders/check-status

## Project Structure

```graphql

src/
├── Config.php            # Contains API endpoints and configurations
├── CredoPayPaymentGateway.php  # Handles HTTP requests
└── resources/
    ├── OrderAPI.php      # Methods for order operations
    └── TransactionAPI.php # Placeholder for future enhancements
```

## Contributing

Contributions are welcome! Feel free to submit issues or pull requests to enhance the library.