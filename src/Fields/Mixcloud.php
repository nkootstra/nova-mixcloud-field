<?php

namespace Nkootstra\NovaMixcloudField\Fields;

use Illuminate\Support\Facades\Log;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;
use Nkootstra\NovaMixcloudField\Rules\MixcloudUrl;

class Mixcloud extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-mixcloud-field';

    /**
     * The text alignment for the field's text in tables.
     *
     * @var string
     */
    public $textAlign = 'center';

    public function __construct(string $name, ?string $attribute = null, ?mixed $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        // set default rules
        $this->rules = [
            'nullable',
            'url',
            new MixcloudUrl,
        ];
    }


    /**
     * Resolve the field's value.
     *
     * @param  mixed  $resource
     * @param  string|null  $attribute
     * @return void
     */
    public function resolve($resource, $attribute = null)
    {
        // add additional meta data
        $basePath = str_finish(parse_url($resource->{$attribute},PHP_URL_PATH),'/');

        $meta = cache()->remember(sha1($basePath), now()->addMonth(1), function() use($basePath) {

            $picture = null;

            try {
                $response = file_get_contents('https://api.mixcloud.com/'.$basePath);
                $json = json_decode($response);
                $picture = $json->pictures->medium_mobile;
            } catch(\Exception $e) {}

            return [
                'basePath'  => $basePath,
                'picture'   => $picture
            ];
        });

        $this->withMeta($meta);

        return parent::resolve($resource, $attribute);
    }
}