<?php namespace Anomaly\CheckoutsModule\Checkout;

use Anomaly\StoreModule\Contract\CartInterface;
use Anomaly\StoreModule\Contract\CheckoutInterface;
use Anomaly\StoreModule\Contract\OrderInterface;
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

    /**
     * The checkout manager.
     *
     * @var CheckoutManager
     */
    protected $manager;

    /**
     * Create a new CheckoutService instance.
     *
     * @param CheckoutManager $manager
     */
    public function __construct(CheckoutManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Return the order instance.
     *
     * @return CartInterface
     */
    public function cart()
    {
        return $this->manager->cart();
    }
}
