<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;

    public const CREATED_AT = 'date';

    protected $fillable = [
        'name',
        'date',
        'load_id'
    ];

    protected $casts = [
        'date'=>'date:d.m.y'
    ];

    public function cargo()
    {
        return $this->belongsTo(Load::class);
    }
}
