<?php
namespace CredoPay;

class Config {
    public const BASE_URL = 'https://ucpbsapi.credopay.info/nac/api/v1';
    public const CREATE_ORDER_URL = self::BASE_URL . '/pg/orders/create-checkout';
    public const CHECK_STATUS_URL = self::BASE_URL . '/pg/orders/check-status';
}
?>
