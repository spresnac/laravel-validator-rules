<?php

namespace spresnac\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Concerns\ValidatesAttributes;

class MimeType implements Rule
{
    use ValidatesAttributes;

    /** @var array */
    private $extensions;

    /** @var array */
    private $mimeTypes;

    public function __construct($extensions, $mimeTypes)
    {
        $this->extensions = explode(',', $extensions);
        $this->mimeTypes = explode(',', $mimeTypes);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->validateMimes($attribute, $value, $this->extensions)) {
            return true;
        }

        return $this->validateMimetypes($attribute, $value, $this->mimeTypes);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The file :attribute is not of an allowed type.';
    }
}
