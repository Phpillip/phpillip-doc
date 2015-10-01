<?php

namespace Controller;

use Phpillip\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Doc controller
 */
class DocController
{
    /**
     * List documentation pages
     *
     * @param Application $app
     * @param array $docs
     *
     * @return array
     */
    public function index(Application $app, array $docs)
    {
        return $app['content_repository']->getContent('readme', 'README');
    }

    /**
     * Menu
     *
     * @param Application $app
     * @param array $docs
     *
     * @return array
     */
    public function menu(Application $app, array $docs)
    {
        $categories = [];

        foreach ($docs as $doc) {
            $category = $doc['category'];

            if (!isset($categories[$category])) {
                $categories[$category] = [];
            }

            $categories[$category][] = $doc;
        }

        return ['categories' => $categories];
    }

    /**
     * Sub menu
     *
     * @param Application $app
     * @param array $docs
     * @param string $category
     *
     * @return array
     */
    public function submenu(Application $app, array $docs, $category)
    {
        return [
            'docs' => array_filter(
                $docs,
                function (array $doc) use ($category) {
                    return $doc['category'] == $category;
                }
            )
        ];
    }
}
