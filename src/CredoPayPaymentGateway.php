<?php
namespace CredoPay;

class CredoPayPaymentGateway {
    private $clientId;
    private $clientSecret;

    public function __construct($clientId, $clientSecret) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    private function getBasicAuthHeader() {
        $credentials = base64_encode("{$this->clientId}:{$this->clientSecret}");
        return "Basic {$credentials}";
    }

    public function handleRequest($method, $url, $jsonInputString = null) {
        if (strpos($url, 'https://') !== 0) {
            throw new \Exception('Only HTTPS protocol is supported');
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: ' . $this->getBasicAuthHeader(),
            'System-Name: ' . php_uname('s'),
            'Node-Name: ' . gethostname(),
            'Release: ' . php_uname('r'),
            'Version: ' . phpversion(),
            'Machine: ' . php_uname('m'),
            'Processor: ' . php_uname('p'),
            'Hostname: ' . gethostname(),
            'IP-Address: ' . gethostbyname(gethostname())
        ]);

        if ($jsonInputString) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonInputString);
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpCode >= 400) {
            throw new \Exception("Server returned HTTP response code: {$httpCode}", $httpCode);
        }

        if (curl_errno($ch)) {
            throw new \Exception('Curl error: ' . curl_error($ch));
        }

        curl_close($ch);
        return $response;
    }
}
?>
