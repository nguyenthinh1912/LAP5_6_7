<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use mysql_xdevapi\Table;

class Movie extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='movies';
    protected $fillable =[
        'title',
        'poster',
        'intro',
        'release_date',
        'gene_id'
    ];
}
