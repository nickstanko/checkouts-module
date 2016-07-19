<?php namespace Anomaly\CheckoutsModule\Checkout\Extension\Contract;

/**
 * Interface CheckoutExtensionInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckoutsModule\Checkout\Extension\Contract
 */
interface CheckoutExtensionInterface
{

    /**
     * Get the steps.
     *
     * @return array
     */
    public function getSteps();
}
