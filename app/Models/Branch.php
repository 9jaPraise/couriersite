<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    //A Branch hasMany Parcels
    public function parcels(){
        return $this->hasMany(Parcel::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }
}
