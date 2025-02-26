<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gene extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'genes';
    protected $fillable = [
        'name',
    ]
    ;
}
