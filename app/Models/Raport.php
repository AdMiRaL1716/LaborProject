<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    protected $table = 'raports';
    public $timestamps = true;

    protected $fillable = [
        'sample_name',
        'test_start_date',
        'test_end_date',
        'id_user',
        'id_customer',
    ];
}
