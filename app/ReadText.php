<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadText extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'read_for_user', 'updated_at', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
