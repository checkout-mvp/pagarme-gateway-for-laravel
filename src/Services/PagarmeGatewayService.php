<?php
namespace MartinsHumberto\PagarmeGateway\Services;

use RuntimeException;
use MartinsHumberto\PagarmeGateway\Traits\PagarmeGatewayRequest as PagarmeGatewayRequest;

class PagarmeGatewayService
{
    use PagarmeGatewayRequest;

    public function __construct($config = '')
    {
        if (is_array($config)) {
            $this->setConfig($config);
        }
    }

    protected function setOptions($credentials)
    {
        if (empty($credentials['token'])) {
            throw new RuntimeException(
                "Please provide valid token for $credentials[store_name] store to use PagarMe Gateway API."
            );
        }

        $this->config = $credentials;
    }
}
