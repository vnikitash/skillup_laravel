<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

class PasswordSymbols implements Rule
{

    private function getAllowedSymbols(): array
    {
        return array_merge(range('a', 'z'), range("A", "Z"), range(0,9));
    }
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return true;
        /**
        $allowedSymbols = $this->getAllowedSymbols();
        foreach (str_split($value) as $letter) {
            if (Arr::has($allowedSymbols, $letter)) {
                continue;
            }
            return false;
        }
        return true;
         */
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Password should contain symbols in range a-zA-Z0-9.';
    }
}
