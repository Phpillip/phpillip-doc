<?php

namespace Service;

use Phpillip\Service\Parsedown as BaseParsedown;
use Phpillip\Service\Pygments;

/**
 * Parsedown
 */
class Parsedown extends BaseParsedown
{
    /**
     * Constructor
     *
     * @param Pygments|null $pygments
     */
    public function __construct(Pygments $pygments = null)
    {
        parent::__construct($pygments);
    }

    /**
     * {@inheritdoc}
     */
    protected function inlineLink($Excerpt)
    {
        $data = parent::inlineLink($Excerpt);

        if (preg_match('#^(doc|\.{2})/(.+)/(.+).md#i', $data['element']['attributes']['href'], $matches)) {
            $data['element']['attributes']['href'] = sprintf('/%s-%s', $matches[2], $matches[3]);
        }

        return $data;
    }
}
