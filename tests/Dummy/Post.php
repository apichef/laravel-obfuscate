<?php

namespace ApiChef\Obfuscate\Dummy;

use Illuminate\Database\Eloquent\Model;
use ApiChef\Obfuscate\Obfuscatable;

class Post extends Model
{
    use Obfuscatable;

    public $timestamps = false;
}
