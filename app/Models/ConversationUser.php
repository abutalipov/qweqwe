<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConversationUser extends Model
{
    use SoftDeletes;
    public $fillable=[
        'user_id',
        'conversation_id',
    ];
    public function conversation() {
        return $this->belongsTo(Conversation::class,'conversation_id')->latest();
    }
    public function user() {
        return $this->belongsTo(User::class,'user_id')->latest();
    }
}
