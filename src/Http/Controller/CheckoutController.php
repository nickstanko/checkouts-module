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
        Agent $agent
    ) {
        $cart = $carts->cart('cart');

        if (!$checkouts->findBySessionAndCart($session->getId(), $cart)) {
            $checkouts->create(
                [
                    'agent'      => serialize($agent->getHttpHeaders()),
                    'ip_address' => $this->request->ip(),
                    'state'      => 'shipping',
                    'session'    => $session->getId(),

                    'cart'  => $cart,
                    'order' => (new OrderModel())->save()
                ]
            );
        }

        return $this->redirect->to('checkout/address');
    }

    public function address(CartManager $carts, Store $session, CheckoutRepositoryInterface $checkouts)
    {
        $checkout = $checkouts->findBySessionAndCart($session->getId(), $carts->cart('cart'));

        return $this->view->make('anomaly.module.checkouts::address', compact('checkout'));
    }
}
