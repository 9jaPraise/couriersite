<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //A category hasMany parcels
    public function parcels(){
        return $this->hasMany(Parcel::class);
    }

    //A Category hasMany parcelActivitylogs
    public function parcelactivitylogs(){
        return $this->hasMany(parcelActivitylog::class);
    }
}
