<?php

namespace PropertyHandler;

use Phpillip\Behavior\PropertyHandlerInterface;

/**
 * Set a "title" property based on file name
 */
class TitlePropertyHandler implements PropertyHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function getProperty()
    {
        return 'title';
    }

    /**
     * {@inheritdoc}
     */
    public function isSupported(array $data)
    {
        return !isset($data[$this->getProperty()]);
    }

    /**
     * {@inheritdoc}
     */
    public function handle($value, array $context)
    {
        if (preg_match('#^<h1[^>]*>(.+)</h1>#i', $context['data']['content'], $matches)) {
            return $matches[1];
        }

        return null;
    }
}
