<?php

namespace Nkootstra\NovaMixcloudField\Rules;

use Illuminate\Contracts\Validation\Rule;

class MixcloudUrl implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // get domain
        $domain = parse_url($value, PHP_URL_HOST);
        $value = str_after($domain,'www.');

        return strtolower($value) === 'mixcloud.com';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid Mixcloud url.'; // todo: trans(...)
    }
}