<?php namespace Anomaly\CheckoutsModule\Checkout;

use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class CheckoutObserver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckoutsModule\Checkout
 */
class CheckoutObserver extends EntryObserver
{

    /**
     * Fired just before saving the entry.
     *
     * @param EntryInterface|CheckoutInterface $entry
     */
    public function creating(EntryInterface $entry)
    {
        if (!$entry->getStrId()) {
            $entry->setAttribute('str_id', str_random());
        }

        parent::creating($entry);
    }
}
