<?php namespace Anomaly\CheckoutsModule\Checkout\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
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
     * Get the agent.
     *
     * @return Agent
     */
    public function getAgent();
}
