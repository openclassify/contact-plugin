<?php namespace Anomaly\ContactPlugin\Form;

use Anomaly\Streams\Platform\Message\MessageBag;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

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
    public function handle(ContactFormBuilder $builder, MessageBag $messages, Mailer $mailer)
    {
        if (!$builder->hasFormErrors() && $mailer->send(
                'anomaly.plugin.contact::email/contact',
                ['form' => $builder->getFormPresenter()],
                function (Message $message) {

                    $message->to('ryan@pyrocms.com');
                    $message->from('noreply@pyrocms.com');
                    $message->subject('Testing');
                }
            )
        ) {
            $messages->success('Sent!');
        } else {
            $messages->error('Error');
        }


        $builder->resetForm();
    }
}
