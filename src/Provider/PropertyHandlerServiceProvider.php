<?php

namespace Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use PropertyHandler\CategoryPropertyHandler;
use PropertyHandler\TitlePropertyHandler;

/**
 * Property Handler Service Provider
 */
class PropertyHandlerServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Application $app)
    {
        $app['content_repository']
            ->addPropertyHandler(new CategoryPropertyHandler())
            ->addPropertyHandler(new TitlePropertyHandler());
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }
}
