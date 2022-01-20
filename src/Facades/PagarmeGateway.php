<?php

namespace MartinsHumberto\PagarmeGateway\Facades;

use Illuminate\Support\Facades\Facade;

class PagarmeGateway extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MartinsHumberto\PagarmeGateway\PagarmeGatewayFacadeAccessor';
    }
}
