<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'response_family',
        'response_child',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}
