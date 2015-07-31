<?php namespace Anomaly\ContactPlugin\Form\Command;

use Anomaly\SettingsModule\Setting\SettingRepository;
use Anomaly\Streams\Platform\Support\Parser;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Mail\Message;

/**
 * Class BuildMessage
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ContactPlugin\Form\Command
 */
class BuildMessage implements SelfHandling
{

    /**
     * The message object.
     *
     * @var Message
     */
    protected $message;

    /**
     * The form builder.
     *
     * @var FormBuilder
     */
    protected $builder;

    /**
     * Create a new BuildMessage instance.
     *
     * @param Message $message
     * @param FormBuilder $builder
     */
    public function __construct(Message $message, FormBuilder $builder)
    {
        $this->message = $message;
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param SettingRepository $settings
     */
    public function handle(SettingRepository $settings, Parser $parser)
    {
        call_user_func_array(
            [$this->message, 'to'],
            (array)$this->builder->getOption(
                'to',
                $settings->get('streams::contact_email', env('CONTACT_EMAIL', env('ADMIN_EMAIL')))
            )
        );

        if ($cc = (array)$this->builder->getOption('cc', null)) {
            call_user_func_array([$this->message, 'cc'], $cc);
        }

        if ($bcc = (array)$this->builder->getOption('bcc', null)) {
            call_user_func_array([$this->message, 'bcc'], $bcc);
        }

        call_user_func_array(
            [$this->message, 'from'],
            (array)$this->builder->getOption('from', $settings->get('streams::server_email', 'noreply@localhost.com'))
        );

        call_user_func_array(
            [$this->message, 'subject'],
            (array)$parser->parse(
                $this->builder->getOption('subject', 'Contact Request'),
                $this->builder->getFormValues()->all()
            )
        );
    }
}
