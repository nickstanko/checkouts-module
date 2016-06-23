<?php namespace Anomaly\CheckoutsModule\Http\Controller;

use Anomaly\CartsModule\Cart\CartManager;
use Anomaly\CartsModule\Cart\Command\GetCart;
use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutInterface;
use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutRepositoryInterface;
use Anomaly\OrdersModule\Order\OrderModel;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Bus\DispatchesJobs;
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

    use DispatchesJobs;

    public function start(CheckoutRepositoryInterface $checkouts, Agent $agent, Store $session)
    {
        $cart = $this->dispatch(new GetCart());

        if (!$checkout = $checkouts->findByStrId($session->get('checkout'))) {

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

            $session->set('checkout', $checkout->getStrId());
        }

        return $this->redirect->to('checkout/address');
    }

    public function address(CheckoutRepositoryInterface $checkouts, Store $session)
    {
        $checkout = $checkouts->findByStrId($session->get('checkout'));

        if ($input = $this->request->input()) {

            $checkout->getOrder()->fill($input)->save();

            return $this->redirect->to('checkout/shipping');
        }

        return $this->view->make('anomaly.module.checkouts::address', compact('checkout'));
    }

    public function shipping(CheckoutRepositoryInterface $checkouts, Store $session)
    {
        $checkout = $checkouts->findByStrId($session->get('checkout'));

        if ($input = $this->request->input()) {

            $checkout->getOrder()->fill($input)->save();

            return $this->redirect->to('checkout/billing');
        }

        return $this->view->make('anomaly.module.checkouts::shipping', compact('checkout'));
    }

    public function billing(CheckoutRepositoryInterface $checkouts, Store $session)
    {
        $checkout = $checkouts->findByStrId($session->get('checkout'));

        if ($input = $this->request->input()) {

            //$checkout->getOrder()->fill($input)->save();

            return $this->redirect->to('checkout/complete');
        }

        return $this->view->make('anomaly.module.checkouts::billing', compact('checkout'));
    }

    public function complete(CheckoutRepositoryInterface $checkouts, Store $session)
    {
        $checkout = $checkouts->findByStrId($session->get('checkout'));

        return $this->view->make('anomaly.module.checkouts::complete', compact('checkout'));
    }
}
