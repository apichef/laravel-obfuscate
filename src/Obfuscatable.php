<?php

namespace ApiChef\Obfuscate;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;
use Jenssegers\Optimus\Optimus;

trait Obfuscatable
{
    public function resolveRouteBinding($value, $field = null)
    {
        $value = App::make(Optimus::class)->decode($value);
        $model = $this->where($field ?? $this->getRouteKeyName(), $value)->first();

        if (! is_null($model)) {
            return $model;
        }

        throw new ModelNotFoundException();
    }

    public function getRouteKey()
    {
        $value = $this->getAttribute($this->getRouteKeyName());

        return App::make(Optimus::class)->encode($value);
    }

    public function scopeForHash($query, $hash)
    {
        return $query->where('id', App::make(Optimus::class)->decode($hash));
    }
}
