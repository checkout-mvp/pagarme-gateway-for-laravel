<?php
namespace MartinsHumberto\PagarmeGateway\Traits\PagarmeApi;

use MartinsHumberto\PagarmeGateway\Rules\CardValidation;

trait CardToken
{
    public function createToken(array $data)
    {
        $this->validate($data, CardValidation::rules($this->version));

        if ($this->version === 'stable') {
            return $this->client->getTokens()->createToken($data);
        }
    }
}
