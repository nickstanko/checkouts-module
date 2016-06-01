<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModuleCheckoutsCreateCheckoutsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'      => 'checkouts',
        'trashable' => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'ip_address' => [
            'required' => true
        ],
        'state'      => [
            'required' => true
        ],
        'session'    => [
            'required' => true,
            'unique'   => true
        ],
        'cart'       => [
            'required' => true
        ],
        'order'      => [
            'required' => true
        ],
        'customer',
        'agent'
    ];

}
