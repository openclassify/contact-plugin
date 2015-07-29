<?php namespace Anomaly\ContactPlugin\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ContactFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ContactPlugin\Form
 */
class ContactFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'name' => [
            'label'    => 'Name',
            'type'     => 'anomaly.field_type.text',
            'required' => true
        ]
    ];

    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = [
        'submit'
    ];

    /**
     * The form buttons.
     *
     * @var array
     */
    protected $buttons = [];

}
