<?php namespace Anomaly\ContactPlugin\Form;

/**
 * Class ContactFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ContactPlugin\Form
 */
class ContactFormHandler
{

    /**
     * Handle the command.
     *
     * @param ContactFormBuilder $builder
     */
    public function handle(ContactFormBuilder $builder)
    {
        dd($builder->getFormValues());
    }
}
