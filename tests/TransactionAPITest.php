<?php
use PHPUnit\Framework\TestCase;
use CredoPay\CredoPayPaymentGateway;
use CredoPay\Resources\TransactionAPI;

class TransactionAPITest extends TestCase {
    private $gateway;
    private $transactionAPI;

    protected function setUp(): void {
        $this->gateway = new CredoPayPaymentGateway('65a621098498347eeecfe0a0', 'g2dSScWNGQwd4DMWjy8rOFptP');
        $this->transactionAPI = new TransactionAPI($this->gateway);
    }

    public function testTransactionAPI() {
        $this->assertNotNull($this->transactionAPI);
    }
}
?>
