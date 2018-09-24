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
        preg_match('%^(?:https?://)?(?:www\.)?(?:mixcloud.com)(/.*)?$%x',$value,$match);
        return $match[0] ?? null;
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