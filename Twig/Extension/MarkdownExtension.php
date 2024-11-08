<?php

namespace Nelmio\ApiDocBundle\Twig\Extension;

use Michelf\MarkdownExtra;
use Symfony\Bundle\TwigBundle\DependencyInjection\TwigExtension;
use Twig\TwigFilter;

class MarkdownExtension extends TwigExtension
{
    protected $markdownParser;

    public function __construct()
    {
        $this->markdownParser = new MarkdownExtra();
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new TwigFilter('extra_markdown', array($this, 'markdown'), array('is_safe' => array('html'))),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nelmio_api_doc';
    }

    public function markdown($text)
    {
        return $this->markdownParser->transform($text);
    }
}
