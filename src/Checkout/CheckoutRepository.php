<?php namespace Anomaly\CheckoutsModule\Checkout;

use Anomaly\CartsModule\Cart\Contract\CartInterface;
use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutInterface;
use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class CheckoutRepository
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckoutsModule\Checkout
 */
class CheckoutRepository extends EntryRepository implements CheckoutRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var CheckoutModel
     */
    protected $model;

    /**
     * Create a new CheckoutRepository instance.
     *
     * @param CheckoutModel $model
     */
    public function __construct(CheckoutModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a checkout by session ID.
     *
     * @param               $session
     * @param CartInterface $cart
     * @return CheckoutInterface|null
     */
    public function findBySessionAndCart($session, CartInterface $cart)
    {
        return $this->model
            ->where('session', $session)
            ->where('cart_id', $cart->getId())
            ->first();
    }
}
