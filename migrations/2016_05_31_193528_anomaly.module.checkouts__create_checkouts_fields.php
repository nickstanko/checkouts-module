<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\UsersModule\User\UserModel;

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
                'default_value' => 'anomaly.extension.standard_checkout',
            ],
        ],
        'step'       => 'anomaly.field_type.text',
        'cart'       => 'anomaly.field_type.polymorphic',
        'order'      => 'anomaly.field_type.polymorphic',
        'user'       => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => UserModel::class,
            ],
        ],
    ];

}
