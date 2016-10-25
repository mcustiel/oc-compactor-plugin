<?php

namespace Mcustiel\Compactor\Classes\Services\Implementation;

use Mcustiel\Compactor\Classes\Services\HtmlCompactorInterface;
use PHPWee\Minify;

class PhpWeeHtmlCompactor implements HtmlCompactorInterface
{
    /**
     * {@inheritdoc}
     *
     * @see \Mcustiel\Compactor\Classes\Services\HtmlCompactorInterface::compactHtml()
     */
    public function compactHtml($html)
    {
        return str_replace("\n", '', Minify::html($html, true, false));
    }
}
