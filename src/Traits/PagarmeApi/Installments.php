<?php
namespace MartinsHumberto\PagarmeGateway\Traits\PagarmeApi;

trait Installments
{
    public function calculate(array $data)
    {
        $this->validate(
            $data,
            [
              'amount' => 'required',
              'free_installments' => 'required',
              'max_installments' => 'required',
              'interest_rate' => 'required'
            ]
        );

        return $this->client->transactions()->calculateInstallments($data);
    }
}
