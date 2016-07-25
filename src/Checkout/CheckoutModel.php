<?php namespace Anomaly\CheckoutsModule\Checkout;

use Anomaly\CartsModule\Cart\Contract\CartInterface;
use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutInterface;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\Streams\Platform\Model\Checkouts\CheckoutsCheckoutsEntryModel;

/**
 * Class CheckoutModel
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckoutsModule\Checkout
 */
class CheckoutModel extends CheckoutsCheckoutsEntryModel implements CheckoutInterface
{

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId()
    {
        return $this->str_id;
    }

    /**
     * Get the related cart.
     *
     * @return CartInterface|null
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Get the related order.
     *
     * @return OrderInterface
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Get the related order ID.
     *
     * @return int
     */
    public function getOrderId()
    {
        return $this->order_id;
    }
}
