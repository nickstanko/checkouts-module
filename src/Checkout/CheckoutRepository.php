<?php namespace Anomaly\CheckoutsModule\Checkout;

use Anomaly\CheckoutsModule\Checkout\Contract\CheckoutRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class CheckoutRepository extends EntryRepository implements CheckoutRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var CheckoutModel
     */
    protected $model;

    /**
     * Create a new CheckoutRepository instance.
     *
     * @param CheckoutModel $model
     */
    public function __construct(CheckoutModel $model)
    {
        $this->model = $model;
    }
}
