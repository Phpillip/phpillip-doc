<?php

namespace PropertyHandler;

use Phpillip\Behavior\PropertyHandlerInterface;

/**
 * Set a "category" property based on file name
 */
class CategoryPropertyHandler implements PropertyHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function getProperty()
    {
        return 'category';
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
        if (preg_match('#(\w+)-\w+#i', $context['file']->getFilename(), $matches)) {
            return $matches[1];
        }

        return null;
    }
}
