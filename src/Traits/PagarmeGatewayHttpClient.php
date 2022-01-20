<?php
namespace MartinsHumberto\PagarmeGateway\Traits;

use PagarMe\Client as PagarMeClient;

trait PagarmeGatewayHttpClient
{
    private $client;

    protected function setHttpClientConfig()
    {
        $this->setClient();
    }

    protected function setClient()
    {
        $client = new PagarMeClient($this->token, ['headers' => ['X-PagarMe-Version' => $this->version ]]);

        $this->client = $client;
    }
}
