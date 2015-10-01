<?php

use Phpillip\Application as BaseApplication;

/**
 * Your Phpillip application
 */
class Application extends BaseApplication
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $values = array())
    {
        parent::__construct($values);

        $this->register(new Provider\PropertyHandlerServiceProvider());

        $this
            ->get('/', 'Controller\\DocController::index')
            ->contents('doc')
            ->bind('homepage');

        $this
            ->get('_menu', 'Controller\\DocController::menu')
            ->hide()
            ->contents('doc')
            ->template('menu.html.twig')
            ->bind('menu');

        $this
            ->get('_submenu/{category}', 'Controller\\DocController::submenu')
            ->hide()
            ->contents('doc')
            ->template('doc/menu.html.twig')
            ->bind('submenu');

        $this
            ->get('/{doc}', 'content.controller:show')
            ->content('doc')
            ->bind('doc');
    }
}
