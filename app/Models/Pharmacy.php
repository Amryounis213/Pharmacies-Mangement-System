<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'mobile'  ,'status'];

    public function Medicines()
    {
        return $this->belongsToMany(Medicine::class , 'pharmacy_medicine' , 'pharmacy_id' ,'medicine_id' );
    }


    public function Pharmacist()
    {
        return $this->hasMany(Pharmacist::class );
    }
    

}
