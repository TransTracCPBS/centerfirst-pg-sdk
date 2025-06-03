<?php
use PHPUnit\Framework\TestCase;
use CredoPay\CredoPayPaymentGateway;
use CredoPay\Resources\OrderAPI;

class OrderAPITest extends TestCase {
    private $gateway;
    private $orderAPI;

    protected function setUp(): void {
        $this->gateway = new CredoPayPaymentGateway('65a621098498347eeecfe0a0', 'g2dSScWNGQwd4DMWjy8rOFptP');
        $this->orderAPI = new OrderAPI($this->gateway);
    }

    public function testCreateOrder() {
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
            'uiMode' => 'checkout'
        ];

        $this->expectException(Exception::class);
        $this->orderAPI->createOrder($orderData);
    }

    public function testCheckStatus() {
        $orderId = 'invalid-order-id';

        $this->expectException(Exception::class);
        $this->orderAPI->checkStatus($orderId);
    }
}
?>
