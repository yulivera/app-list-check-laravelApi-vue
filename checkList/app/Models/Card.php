<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = ['title'];
    //uno a mucho: una card mucha chexbox
    public function check(){
        return $this->hasMany(Check::class);
    } 
}
