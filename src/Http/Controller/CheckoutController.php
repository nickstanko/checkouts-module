<?php namespace Anomaly\CheckoutsModule\Http\Controller;

use Anomaly\CheckoutsModule\Checkout\CheckoutManager;
use Anomaly\CartsModule\Cart\CartManager;
use Anomaly\CartsModule\Cart\Contract\CartRepositoryInterface;
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
    public function start(CheckoutManager $manager, CartRepositoryInterface $carts, Store $session)
    {
        /* @var CartInterface $cart */
        $instance = $session->get('cart');
        $cart = $carts->findByStrId($instance);

        if (!$cart->count()) {
            return $this->redirect->route('store::cart');
        }

        $manager->checkout($cart);

        return $this->redirect->to('checkout/address');
    }
}
