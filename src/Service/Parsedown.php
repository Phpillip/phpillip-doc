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

        if (preg_match('#^(doc|\.{2})/(.+)/(.+).md(\#.+)?#i', $data['element']['attributes']['href'], $matches)) {
            $directory = $matches[2];
            $file      = $matches[3];
            $anchor    = isset($matches[4]) ? $matches[4] : null;
            $data['element']['attributes']['href'] = sprintf('/%s-%s%s', $directory, $file, $anchor);
        }

        return $data;
    }
}
