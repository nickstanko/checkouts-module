<?php namespace Anomaly\CheckoutsModule\Http\Controller;

use Anomaly\CartsModule\Cart\CartManager;
use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutRepositoryInterface;
use Anomaly\OrdersModule\Order\OrderModel;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Session\Store;
use Jenssegers\Agent\Agent;

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

    public function start(
        CheckoutRepositoryInterface $checkouts,
        CartManager $carts,
        Store $session,
        Agent $agent,
        Guard $auth
    ) {
        $cart = $carts->cart('cart');

        if (!$checkout = $checkouts->findBySessionAndCart($session, $cart)) {
            $checkout = $checkouts->create(
                [
                    'user'       => $auth->user(),
                    'mobile'     => $agent->isMobile(),
                    'ip_address' => $this->request->ip(),
                    'state'      => 'shipping',
                    'session'    => $session->getId(),

                    'cart'  => $cart,
                    'order' => (new OrderModel())->save()
                ]
            );
        }
    }

    public
    function address()
    {
        return $this->view->make('anomaly.module.checkouts::checkout');
    }
}
