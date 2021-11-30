<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'date_time',
        'load_id'
    ];

    protected $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes['date_time'] = Carbon::now();

        parent::__construct($attributes);
    }

    public function cargo()
    {
        return $this->belongsTo(Load::class);
    }
}
