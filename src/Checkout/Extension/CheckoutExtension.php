<?php namespace Anomaly\CheckoutsModule\Checkout\Extension;

use Anomaly\CheckoutsModule\Checkout\Extension\Contract\CheckoutExtensionInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class CheckoutExtension
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckoutsModule\Checkout\Extension
 */
class CheckoutExtension extends Extension implements CheckoutExtensionInterface
{

    /**
     * The checkout steps.
     *
     * @var array
     */
    protected $steps = [];

    /**
     * Get the steps.
     *
     * @return array
     */
    public function getSteps()
    {
        return $this->steps;
    }
}
