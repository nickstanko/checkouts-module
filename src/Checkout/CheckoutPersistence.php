<?php namespace Anomaly\CheckoutsModule\Checkout;

use Illuminate\Contracts\Session\Session;

/**
 * Class CheckoutPersistence
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CheckoutPersistence
{

    /**
     * The key prefix.
     *
     * @var string
     */
    public static $key = 'checkout';

    /**
     * The session interface.
     *
     * @var Session
     */
    protected $session;

    /**
     * Create a new CheckoutPersistence instance.
     *
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Persist an instance ID.
     *
     * @param $id
     */
    public function persist($id)
    {
        $this->session->put($this::$key, $id);
    }

    /**
     * Get an instance ID from persistence.
     *
     * @return string
     */
    public function id()
    {
        return $this->session->get($this::$key);
    }

    /**
     * Forget an instance ID.
     */
    public function forget()
    {
        $this->session->forget($this::$key);
    }
}
