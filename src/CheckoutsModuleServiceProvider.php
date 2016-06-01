<?php namespace Anomaly\CheckoutsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

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
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [];

    protected $singletons = [
        'Anomaly\CheckoutsModule\Checkout\Contract\CheckoutRepositoryInterface' => 'Anomaly\CheckoutsModule\Checkout\CheckoutRepository'
    ];
}
