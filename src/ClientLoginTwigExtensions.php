<?php

namespace ClientLogin;

/**
 * Twig functions
 */
class ClientLoginTwigExtensions extends \Twig_Extension
{
    /**
     * @var UserInterface class object
     */
    private $userinterface;

    /**
     * @var Twig environment
     */
    private $twig = null;

    public function __construct(\Bolt\Application $app)
    {
        $this->userinterface = new UserInterface($app);
    }

    /**
     * Return the name of the extension
     *
     * @return string
     */
    public function getName()
    {
        return 'clientlogin';
    }

    /**
     * Initialise the runtime environment.
     *
     * @param \Twig_Environment $environment
     */
    public function initRuntime(\Twig_Environment $environment)
    {
        $this->twig = $environment;
    }

    /**
     * The functions we add to Twig
     *
     * @return array Function names and their local callbacks
     */
    public function getFunctions()
    {
        return array(
            'clientlogin'  =>  new \Twig_Function_Method($this, 'getClientLogin'),
            'clientlogout' =>  new \Twig_Function_Method($this, 'getClientLogout')
        );
    }

    public function getClientLogin($redirect = false)
    {
        return $this->userinterface->doDisplayLogin($redirect);
    }

    public function getClientLogout($redirect = false, $label = "Logout")
    {
        return $this->userinterface->doDisplayLogout($redirect, $label);
    }
}
