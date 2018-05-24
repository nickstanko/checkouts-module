<?php namespace Anomaly\CheckoutsModule\Checkout;

use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutInterface;
use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutRepositoryInterface;
use Anomaly\CartsModule\Cart\CartModel;
use Anomaly\StoreModule\Contract\OrderInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

/**
 * Class CheckoutManager
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CheckoutManager
{

    /**
     * The checkout repository.
     *
     * @var CheckoutRepositoryInterface
     */
    protected $checkouts;

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The checkout persistence.
     *
     * @var CheckoutPersistence
     */
    protected $persistence;

    /**
     * The auth guard.
     *
     * @var Guard
     */
    protected $auth;


    /**
     * Create a new CheckoutInstance instance.
     *
     * @param CheckoutRepositoryInterface $checkouts
     * @param CheckoutPersistence $persistence
     * @param Request $request
     * @param Guard $auth
     */
    public function __construct(
        CheckoutRepositoryInterface $checkouts,
        CheckoutPersistence $persistence,
        Request $request,
        Guard $auth
    ) {
        $this->auth        = $auth;
        $this->request     = $request;
        $this->checkouts   = $checkouts;
        $this->persistence = $persistence;
    }

    /**
     * Return a checkout instance.
     *
     * @param CartInterface $cart
     * @return CheckoutInterface
     */
    public function checkout(CartModel $cart)
    {

        /* @var CheckoutInterface $checkout */
        if (!$checkout = $this->checkouts->findByStrId($this->persistence->id())) {
            $checkout = $this->checkouts->create(
                [
                    'cart'       => $cart,
                    'user'       => $this->auth->user(),
                    'ip_address' => $this->request->ip(),
                ]
            );
        }

        $this->persistence->persist($checkout->getStrId());

        return $checkout;
    }

    /**
     * Return the checkout cart.
     *
     * @return CartInterface
     * @throws \Exception
     */
    public function cart()
    {
        /* @var CheckoutInterface $checkout */
        if (!$checkout = $this->checkouts->findByStrId($this->persistence->id())) {
            throw new \Exception("No checkout found.");
        }

        return $checkout->getCart();
    }

    /**
     * Release a checkout.
     */
    public function destroy()
    {

        /* @var CheckoutInterface|EloquentModel $checkout */
        if (!$checkout = $this->checkouts->findByStrId($this->persistence->id())) {
            $this->checkouts->delete($checkout);
        }

        $this->persistence->forget();
    }
}
