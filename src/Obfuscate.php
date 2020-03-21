<?php

namespace ApiChef\Obfuscate;

use Jenssegers\Optimus\Optimus;

class Obfuscate
{
    /** @var Optimus */
    private $optimus;

    public function __construct(Optimus $optimus)
    {
        $this->optimus = $optimus;
    }

    public function encode($value)
    {
        if (is_array($value)) {
            return collect($value)->map(function ($key) {
                return $this->optimus->encode($key);
            })->all();
        }

        return $this->optimus->encode($value);
    }

    public function decode($value)
    {
        if (is_array($value)) {
            return collect($value)->map(function ($key) {
                return $this->optimus->decode($key);
            })->all();
        }

        return $this->optimus->decode($value);
    }
}
