<?php
namespace MartinsHumberto\PagarmeGateway\Traits;

use RuntimeException;

trait PagarmeGatewayRequest
{
    use PagarmeGatewayHttpClient, PagarmeGatewayApi;

    private $config;

    protected $token;

    protected $public_key;

    protected $version;

    public function setConfig(array $config = [])
    {
        if (!count($config)) {
            $config = function_exists('config') ? config('pagarmegateway') : $config;
        }

        $this->setCredentials($config);

        unset($config['token']);
        unset($config['public_key']);

        $this->config = $config;
    }

    private function setCredentials(array $credentials)
    {
        if (empty($credentials)) {
            throw new RuntimeException(
                'Empty configuration provided. Please provide valid configuration for Pagarme Gateway API.'
            );
        }

        $this->setToken($credentials['token']);

        $this->setPublicKey($credentials['public_key']);

        $this->setVersion($credentials['version']);

        $this->setHttpClientConfig();
    }

    protected function setToken(string $token)
    {
        $this->token = $token;
    }

    protected function setPublicKey(string $public_key)
    {
        $this->public_key = $public_key;
    }

    protected function setVersion(string $version)
    {
        $this->version = $version;
    }
}
