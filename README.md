# Compactor plugin
OctoberCMS plugin that provides HTML code minification.

## Configuration
Default configuration for the plugin is:

* config.php:
```php
return [
    'compactation' => [
        'enabled' => false,
        'compactor' => '\\Mcustiel\\Compactor\\Classes\\Services\\Implementation\\PhpWeeHtmlCompactor',
    ],
];
```

To activate page minification, you need to overwrite the config as explained in [october's documentation](https://octobercms.com/docs/plugin/settings#file-configuration) and set 'enabled' to true. 

If you want to add your own html minificator, you can specify it in the config. Your minificator must implement `\Mcustiel\Compactor\Classes\Services\HtmlCompactorInterface`:

```php
interface HtmlCompactorInterface
{
    /**
     * @param string $html
     * @return string
     */
    public function compactHtml($html);
}
```
