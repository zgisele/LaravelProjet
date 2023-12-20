<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        
        'status',
        'user_id',
        'formation_id'
    ];
    public function user(){
        return ($this->belongsTo(User::class,'user_id'));
    }

    public function formation(){
        return ($this->belongsTo(Formation::class,'formation_id'));
    }
}
