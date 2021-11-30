<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'weight'
    ];

    public function point()
    {
        return $this->hasOne(Point::class);
    }
}
