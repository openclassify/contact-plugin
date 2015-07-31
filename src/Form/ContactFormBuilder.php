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
        'name'    => [
            'label'    => 'Name',
            'type'     => 'anomaly.field_type.text',
            'required' => true
        ],
        'email'   => [
            'label'    => 'Email',
            'type'     => 'anomaly.field_type.email',
            'required' => true
        ],
        'message' => [
            'label'    => 'Message',
            'type'     => 'anomaly.field_type.textarea',
            'required' => true
        ]
    ];

    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = [
        'submit' => [
            'redirect' => false
        ]
    ];

    /**
     * The form buttons.
     *
     * @var array
     */
    protected $buttons = [];

}
