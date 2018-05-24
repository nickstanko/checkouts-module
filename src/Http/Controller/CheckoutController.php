<?php namespace Anomaly\CheckoutsModule\Http\Controller;

use Anomaly\CheckoutsModule\Checkout\CheckoutManager;
use Anomaly\CartsModule\Cart\CartManager;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Session\Store;

/**
 * Class CheckoutController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckoutsModule\Http\Controller
 */
class CheckoutController extends PublicController
{

    use DispatchesJobs;

    /**
     * Start a new checkout process.
     *
     * @param CheckoutManager $manager
     * @param ServiceManager $services
     * @return \Illuminate\Http\RedirectResponse
     */
    public function start(CheckoutManager $manager, CartManager $carts, Store $session)
    {
        /* @var CartInterface $cart */
        $instance = $session->get('cart');
        $cart = $carts->cart($instance);

        if (!$cart->count()) {
            return $this->redirect->route('store::cart');
        }

        $manager->checkout($cart);

        return $this->redirect->to('checkout/address');
    }
}
