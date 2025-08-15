<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    protected $fillable = [
        'complete',
        'name',
    ];

    protected $casts = [
        'complete' => 'boolean',
    ];
}
