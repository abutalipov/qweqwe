<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Conversation extends Model
{


    public function users() {
        return $this->belongsToMany(User::class,'conversation_users');
    }
    public function ConversationUser() {
        return $this->hasMany(ConversationUser::class);
    }
    public function messages() {
        return $this->hasMany(ConversationMessage::class,'conversation_id')->latest();
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->name = (string) Str::uuid();
        });
    }

}
