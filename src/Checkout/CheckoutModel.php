<?php namespace Anomaly\CheckoutsModule\Checkout;

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
     * The checkout steps.
     *
     * @var array
     */
    protected $steps = [
        'address',
        'shipping',
        'billing',
        'complete',
    ];

    /**
     * Get the steps.
     *
     * @return array
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * Return the first step.
     *
     * @return string
     */
    public function firstStep()
    {
        return $this->getSteps()[0];
    }

    /**
     * Return the next step.
     *
     * @param $step
     * @return string
     */
    public function nextStep($step)
    {
        return $this->steps[array_search($step, $this->steps) + 1];
    }

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
