<?php

return [
    'store_name' => env('PAGARME_STORE_NAME', 'PagarMe Gateway Provider'),
    'token' => env('PAGARME_TOKEN', ''),
    'version' => env('PAGARME_VERSION', 'stable'),
    'limit_per_page' => 15
];
