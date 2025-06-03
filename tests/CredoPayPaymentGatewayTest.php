<?php
use PHPUnit\Framework\TestCase;
use CredoPay\CredoPayPaymentGateway;

class CredoPayPaymentGatewayTest extends TestCase {
    public function testHandleRequest() {
        $gateway = new CredoPayPaymentGateway('65a621098498347eeecfe0a0', 'g2dSScWNGQwd4DMWjy8rOFptP');
        $this->expectException(Exception::class);
        $gateway->handleRequest('GET', 'http://example.com');
    }
}
?>
