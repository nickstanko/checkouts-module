<?php namespace Anomaly\CheckoutsModule\Checkout;

use Anomaly\StoreModule\Contract\CheckoutInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CheckoutService
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CheckoutService implements CheckoutInterface
{

    use DispatchesJobs;

}
