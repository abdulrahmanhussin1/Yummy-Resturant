<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseYummy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title1',
        'desc1',
        'title2',
        'desc2',
        'title3',
        'desc3',
        'title4',
        'desc4',
        'user_id'
    ];
        /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
