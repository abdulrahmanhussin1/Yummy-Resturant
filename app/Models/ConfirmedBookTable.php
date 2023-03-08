<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfirmedBookTable extends Model
{
    use SoftDeletes;
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'time',
        'people',
        'message',
        'book_tables_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
