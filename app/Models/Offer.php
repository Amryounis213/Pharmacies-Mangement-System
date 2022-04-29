<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    public function Medicine()
    {
        return $this->belongsToMany(Medicine::class , 'medicine_offer' , 'offer_id' , 'medicine_id');
    }








    public function toArray()
    {

        return [
            'id'=>$this->id ,
            'name'=> $this->name ,
            'image'=> $this->image ,
            'offer_expired'=> now()->diffInDays($this->offer_expired)  ,
            'medicines'=> $this->Medicine,
        ];
    }
}
