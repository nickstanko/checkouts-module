<?php namespace Anomaly\CheckoutsModule\Checkout\Contract;

use Anomaly\CartsModule\Cart\Contract\CartInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface CheckoutInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckoutsModule\Checkout\Contract
 */
interface CheckoutInterface extends EntryInterface
{

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId();

    /**
     * Get the related cart.
     *
     * @return CartInterface|null
     */
    public function getCart();

}
