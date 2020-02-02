<?php

namespace LaravelObfuscate;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;
use Jenssegers\Optimus\Optimus;

trait Obfuscatable
{
    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        $value = App::resolved(Optimus::class)->decode($value);

        $model = $this->where($this->getRouteKeyName(), $value)->first();

        if (! is_null($model)) {
            return $model;
        }

        throw new ModelNotFoundException();
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        $value = $this->getAttribute($this->getRouteKeyName());

        return App::resolved(Optimus::class)->encode($value);
    }
}
