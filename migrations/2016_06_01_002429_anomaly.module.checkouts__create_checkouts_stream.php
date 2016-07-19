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
        'str_id'     => [
            'required' => true,
            'unique'   => true
        ],
        'ip_address' => [
            'required' => true
        ],
        'step'       => [
            'required' => true
        ],
        'cart'       => [
            'required' => true
        ],
        'order'      => [
            'required' => true
        ],
        'user',
    ];

}
