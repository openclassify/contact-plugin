<?php namespace Anomaly\ContactPlugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class ContactPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ContactPlugin
 */
class ContactPlugin extends Plugin
{

    /**
     * The plugin functions.
     *
     * @var ContactPluginFunctions
     */
    protected $functions;

    /**
     * Create a new ContactPlugin instance.
     *
     * @param ContactPluginFunctions $functions
     */
    public function __construct(ContactPluginFunctions $functions)
    {
        $this->functions = $functions;
    }

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('contact_form', [$this->functions, 'form'], ['is_safe' => ['html']])
        ];
    }
}
