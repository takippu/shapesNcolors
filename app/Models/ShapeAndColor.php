<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShapeAndColor extends Model
{
    use HasFactory;

    protected $table = 'shape_color';

    protected $fillable = [
        'user_id',
        'shape',
        'color',

    ];
    //set the relation between data and user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
