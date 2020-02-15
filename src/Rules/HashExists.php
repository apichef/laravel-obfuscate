<?php

namespace ApiChef\Obfuscate\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Jenssegers\Optimus\Optimus;

class HashExists implements Rule
{
    /** @var Optimus $optimus */
    private $optimus;

    /** @var string */
    private $table;

    /** @var string */
    private $column;

    public function __construct(string $table, string $column)
    {
        $this->optimus = App::make(Optimus::class);
        $this->table = $table;
        $this->column = $column;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (! is_int($value)) {
            return false;
        }

        return DB::table($this->table)
            ->where($this->column, $this->optimus->decode($value))
            ->count() !== 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.exists');
    }
}
