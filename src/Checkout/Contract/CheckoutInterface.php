<?php namespace Anomaly\CheckoutsModule\Checkout\Contract;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Agent\Facades\Agent;

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
     * Get the agent.
     *
     * @return Agent
     */
    public function getAgent();

    /**
     * Get the related order.
     *
     * @return OrderInterface
     */
    public function getOrder();

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
     * Return the customer relation.
     *
     * @return BelongsTo
     */
    public function customer();
}
