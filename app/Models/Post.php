<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

// use protected $dates in order to be able to use ->format in the view.
    protected $dates = [
        'timestamps',
    ];
    // allows data to be filled
    protected $fillable = [
        'title',
        'text',
    ];
// this belongs to an user.
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
