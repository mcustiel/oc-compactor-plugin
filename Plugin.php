<?php

namespace Mcustiel\Compactor;

use App;
use Event;
use Config;
use System\Classes\PluginBase;

/**
 * compactPages Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * {@inheritdoc}
     *
     * @see \System\Classes\PluginBase::boot()
     */
    public function boot()
    {
        if (Config::get('mcustiel.compactor::compactation.enabled')) {
            Event::listen('cms.page.postprocess', function ($controller, $url, $page, $dataHolder) {
                $compactor = App::make(
                    Config::get('mcustiel.compactor::compactation.compactor')
                );
                $dataHolder->content = $compactor->compactHtml($dataHolder->content);
            });
        }
    }

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Compactor',
            'description' => 'Provides HTML compactation/minifaction',
            'author'      => 'mcustiel',
            'icon'        => 'icon-cogs',
        ];
    }
}
