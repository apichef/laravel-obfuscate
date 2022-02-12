<?php

namespace ApiChef\Obfuscate\Dummy;

use ApiChef\Obfuscate\Obfuscatable;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Obfuscatable;

    public $timestamps = false;

    protected static function newFactory()
    {
        return PostFactory::new();
    }
}
