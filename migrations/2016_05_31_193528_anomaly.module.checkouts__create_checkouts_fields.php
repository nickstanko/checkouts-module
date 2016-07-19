<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleCheckoutsCreateCheckoutsFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleCheckoutsCreateCheckoutsFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'str_id'     => 'anomaly.field_type.text',
        'ip_address' => 'anomaly.field_type.text',
        'checkout'   => [
            'type'   => 'anomaly.field_type.addon',
            'config' => [
                'type'          => 'extension',
                'search'        => 'anomaly.module.checkouts::checkout.*',
                'default_value' => 'anomaly.extension.standard_checkout'
            ]
        ],
        'step'       => 'anomaly.field_type.text',
        'cart'       => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\CartsModule\Cart\CartModel'
            ]
        ],
        'order'      => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\OrdersModule\Order\OrderModel'
            ]
        ],
        'user'       => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\UsersModule\User\UserModel'
            ]
        ],
    ];

}
