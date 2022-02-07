<?php

return [
    'store_name' => env('PAGARME_STORE_NAME', 'PagarMe Gateway'),
    'token' => env('PAGARME_TOKEN', ''),
    'public_key' => env('PAGARME_PUBLIC_KEY', ''),
    'version' => env('PAGARME_VERSION', 'stable'),
    'limit_per_page' => 15
];
