<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parcelActivitylog extends Model
{
    use HasFactory;
    //A parcelActivitylog belongsTo category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function parcel(){
        return $this->belongsTo(Parcel::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
