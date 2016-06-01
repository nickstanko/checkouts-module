<?php namespace Anomaly\CheckoutsModule\Checkout;

use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutInterface;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\Streams\Platform\Model\Checkouts\CheckoutsCheckoutsEntryModel;
use Jenssegers\Agent\Agent;

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
     * Get the agent.
     *
     * @return Agent
     */
    public function getAgent()
    {
        return new Agent($this->agent);
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
}
