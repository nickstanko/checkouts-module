<?php namespace Anomaly\CheckoutsModule\Checkout;

use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutInterface;
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
     * Get the agent.
     *
     * @return Agent
     */
    public function getAgent()
    {
        return new Agent($this->agent);
    }
}
