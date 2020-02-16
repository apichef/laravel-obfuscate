<?php

namespace ApiChef\Obfuscate\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed encode(int|array $value)
 * @method static mixed decode(string|array $value)
 *
 * @see \ApiChef\Obfuscate\Obfuscate
 */
class Obfuscate extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'obfuscate';
    }
}
