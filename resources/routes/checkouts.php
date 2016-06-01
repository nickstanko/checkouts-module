<?php

return [
    'admin/checkouts'           => 'Anomaly\CheckoutsModule\Http\Controller\Admin\CheckoutsController@index',
    'admin/checkouts/create'    => 'Anomaly\CheckoutsModule\Http\Controller\Admin\CheckoutsController@create',
    'admin/checkouts/edit/{id}' => 'Anomaly\CheckoutsModule\Http\Controller\Admin\CheckoutsController@edit'
];
