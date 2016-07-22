<?php namespace Anomaly\CheckoutsModule\Http\Controller;

use Anomaly\CartsModule\Cart\CartMigrator;
use Anomaly\CartsModule\Cart\Command\GetCart;
use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutInterface;
use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutRepositoryInterface;
use Anomaly\OrdersModule\Order\Contract\OrderRepositoryInterface;
use Anomaly\OrdersModule\Order\OrderModel;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Contracts\Auth\Guard;
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
     * @param CheckoutRepositoryInterface $checkouts
     * @param OrderRepositoryInterface    $orders
     * @param CartMigrator                $migrator
     * @param Store                       $session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function start(CheckoutRepositoryInterface $checkouts, OrderRepositoryInterface $orders, CartMigrator $migrator, Store $session)
    {
        $cart = $this->dispatch(new GetCart());

        if (!$checkout = $checkouts->findByStrId($session->get('checkout'))) {

            /* @var CheckoutInterface $checkout */
            $checkout = $checkouts->create(
                [
                    'ip_address' => $this->request->ip(),
                    'cart'       => $cart,
                    'order'      => $orders->create([
                        'status' => 'pending'
                    ])
                ]
            );

            $session->set('checkout', $checkout->getStrId());

            $migrator->migrate($checkout);
        }

        return $this->redirect->to('checkout/address');
    }

    public function address()
    {

    }
}
