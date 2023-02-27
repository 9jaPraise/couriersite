<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;
    //A parcel belongsTo a User
    public function user(){
        return $this->belongsTo(user::class);
    }

    //A category belongsTo a user
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //A parcel belongsTo a branch
    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    //A parcel hasMany parcelAvitivitylogs
    public function parcelavitivitylogs(){
        return $this->hasMany(parcelAvitivitylogs::class);
    }
}
