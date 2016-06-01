<?php

return [
    'checkout'               => 'Anomaly\CheckoutsModule\Http\Controller\CheckoutController@start',
    'checkout/address'  => 'Anomaly\CheckoutsModule\Http\Controller\CheckoutController@address',
    'checkout/shipping' => 'Anomaly\CheckoutsModule\Http\Controller\CheckoutController@shipping',
    'checkout/billing'  => 'Anomaly\CheckoutsModule\Http\Controller\CheckoutController@billing',
];
