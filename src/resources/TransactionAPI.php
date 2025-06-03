<?php
namespace CredoPay\Resources;

use CredoPay\CredoPayPaymentGateway;

class TransactionAPI {
    private $gateway;

    public function __construct(CredoPayPaymentGateway $gateway) {
        $this->gateway = $gateway;
    }

    // Define transaction-related methods here
}
?>
