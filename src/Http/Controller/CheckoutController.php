<?php namespace Anomaly\CheckoutsModule\Http\Controller;

use Anomaly\CartsModule\Cart\CartManager;
use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutInterface;
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
        Agent $agent
    ) {
        $cart = $carts->cart('cart');

        if (!$checkout = $checkouts->findByStrId($this->request->cookie('checkout'))) {

            /* @var CheckoutInterface $checkout */
            $checkout = $checkouts->create(
                [
                    'agent'      => serialize($agent->getHttpHeaders()),
                    'ip_address' => $this->request->ip(),
                    'state'      => 'shipping',

                    'cart'  => $cart,
                    'order' => (new OrderModel())->save()
                ]
            );

            $this->container->make('cookie')->queue('checkout', $checkout->getStrId());
        }

        return $this->redirect->to('checkout/address');
    }

    public function address(CheckoutRepositoryInterface $checkouts)
    {
        $checkout = $checkouts->findByStrId($this->request->cookie('checkout'));

        if ($input = $this->request->input()) {

            $checkout->getOrder()->fill($input)->save();

            return $this->redirect->to('checkout/shipping');
        }

        return $this->view->make('anomaly.module.checkouts::address', compact('checkout'));
    }

    public function shipping(CheckoutRepositoryInterface $checkouts)
    {
        $checkout = $checkouts->findByStrId($this->request->cookie('checkout'));

        if ($input = $this->request->input()) {

            $checkout->getOrder()->fill($input)->save();

            return $this->redirect->to('checkout/billing');
        }

        return $this->view->make('anomaly.module.checkouts::shipping', compact('checkout'));
    }

    public function billing(CheckoutRepositoryInterface $checkouts)
    {
        $checkout = $checkouts->findByStrId($this->request->cookie('checkout'));

        if ($input = $this->request->input()) {

            $checkout->getOrder()->fill($input)->save();

            return $this->redirect->to('checkout/billing');
        }

        return $this->view->make('anomaly.module.checkouts::billing', compact('checkout'));
    }
}
