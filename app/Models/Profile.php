<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function profileImage(){
        return  '/storage/'. (($this->image)? $this->image : 'profile/no-image.png');
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
