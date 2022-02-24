<?php

namespace spresnac\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class UrlValid implements Rule
{
    public function passes($attribute, $value): bool
    {
        if (!Str::of($value)->trim()->startsWith(['http://', 'https://', 'ftp://', 'sftp://'])) {
            return false;
        }
        $response = Http::head($value);
        return $response->ok();
    }

    public function message()
    {
        return trans('validation.urlvalid');
    }
}
