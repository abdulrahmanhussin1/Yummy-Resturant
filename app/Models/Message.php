<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
