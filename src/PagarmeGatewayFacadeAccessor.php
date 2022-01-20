<?php
namespace MartinsHumberto\PagarmeGateway;

use Exception;
use MartinsHumberto\PagarmeGateway\Services\PagarmeGatewayService as PagarmeClient;

class PagarmeGatewayFacadeAccessor
{
    public static $provider;

    public static function getProvider()
    {
        return self::$provider;
    }

    public static function setProvider()
    {
        self::$provider = new PagarmeClient();

        return self::getProvider();
    }
}
