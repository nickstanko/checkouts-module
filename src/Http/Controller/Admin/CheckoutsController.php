<?php namespace Anomaly\CheckoutsModule\Http\Controller\Admin;

use Anomaly\CheckoutsModule\Checkout\Form\CheckoutFormBuilder;
use Anomaly\CheckoutsModule\Checkout\Table\CheckoutTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class CheckoutsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckoutsModule\Http\Controller\Admin
 */
class CheckoutsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param CheckoutTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(CheckoutTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param CheckoutFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(CheckoutFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param CheckoutFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(CheckoutFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
