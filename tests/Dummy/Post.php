<?php

namespace ApiChef\Obfuscate\Dummy;

use ApiChef\Obfuscate\Obfuscatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Obfuscatable;

    public $timestamps = false;
}
