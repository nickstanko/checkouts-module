<?php namespace Anomaly\CheckoutsModule\Checkout\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface CheckoutRepositoryInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckoutsModule\Checkout\Contract
 */
interface CheckoutRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a checkout by it's string ID.
     *
     * @param $id
     * @return CheckoutInterface|null
     */
    public function findByStrId($id);
}
