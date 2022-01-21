<?php
namespace MartinsHumberto\PagarmeGateway\Traits;

use PagarmeCoreApiLib\PagarmeCoreApiClient as PagarMeClientV5;
use PagarMe\Client as PagarMeClientV4;

trait PagarmeGatewayHttpClient
{
    private $client;

    protected function setHttpClientConfig()
    {
        $this->setClient();
    }

    protected function setClient()
    {
        if ($this->version === 'stable') {
            $client = new PagarMeClientV5($this->token, '');
        } else {
            $client = new PagarMeClientV4($this->token, ['headers' => ['X-PagarMe-Version' => $this->version ]]);
        }

        $this->client = $client;
    }
}
