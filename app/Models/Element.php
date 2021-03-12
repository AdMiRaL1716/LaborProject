<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $table = 'elements';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'symbol',
    ];
}
