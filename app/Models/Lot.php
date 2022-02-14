<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'area', 'price'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
