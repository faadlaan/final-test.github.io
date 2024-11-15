<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'data';
    protected $fillable = [ 
        'name',
        'email',
        'phone',
        'levels_id',
    ];


    public function levels()
    {
        return $this->belongsTo(Level::class, );
    }
}
