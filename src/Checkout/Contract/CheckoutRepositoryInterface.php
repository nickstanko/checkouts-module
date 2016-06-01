<?php namespace Anomaly\CheckoutsModule\Checkout\Contract;

use Anomaly\CartsModule\Cart\Contract\CartInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface CheckoutRepositoryInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckoutsModule\Checkout\Contract
 */
interface CheckoutRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a checkout by session ID.
     *
     * @param               $session
     * @param CartInterface $cart
     * @return CheckoutInterface|null
     */
    public function findBySessionAndCart($session, CartInterface $cart);
}
