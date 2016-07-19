<?php namespace Anomaly\CheckoutsModule\Checkout\Contract;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     * Get the steps.
     *
     * @return array
     */
    public function getSteps();

    /**
     * Return the first step.
     *
     * @return string
     */
    public function firstStep();

    /**
     * Return the next step.
     *
     * @param $step
     * @return string
     */
    public function nextStep($step);

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId();

    /**
     * Get the related order.
     *
     * @return OrderInterface
     */
    public function getOrder();

    /**
     * Get the related order ID.
     *
     * @return int
     */
    public function getOrderId();

    /**
     * Return the cart relation.
     *
     * @return BelongsTo
     */
    public function cart();

    /**
     * Return the order relation.
     *
     * @return BelongsTo
     */
    public function order();

    /**
     * Return the user relation.
     *
     * @return BelongsTo
     */
    public function user();
}
