<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name',
        'desc',
        'price',
        'image',
        'menu_categories_id',
        'user_id'
    ];

    protected $table ='menu_items';

    public function menu_categories()
    {
        return $this->belongsTo(MenuCategory::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
