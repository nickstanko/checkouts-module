<?php namespace Anomaly\CheckoutsModule;

use Anomaly\CheckoutsModule\Checkout\CheckoutModel;
use Anomaly\CheckoutsModule\Checkout\CheckoutRepository;
use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutRepositoryInterface;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Checkouts\CheckoutsCheckoutsEntryModel;

/**
 * Class CheckoutsModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckoutsModule
 */
class CheckoutsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        CheckoutsCheckoutsEntryModel::class => CheckoutModel::class,
    ];

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        CheckoutRepositoryInterface::class => CheckoutRepository::class,
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'checkout' => [
            'as'   => 'anomaly.module.checkouts::checkouts.start',
            'uses' => 'Anomaly\CheckoutsModule\Http\Controller\CheckoutController@start',
        ],
    ];
}
