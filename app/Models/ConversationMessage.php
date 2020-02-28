<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConversationMessage extends Model
{
    public $fillable=[
        'created_at',
        'user_id',
        'conversation_id',
        'content',
        'parent_id',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }

}
